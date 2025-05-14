<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Student;
use Carbon\Carbon;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Tutor; // Add the Tutor model namespace
use Illuminate\Support\Facades\Auth;
class TutorController extends Controller
{
    //
    public function index(Request $request)
    {

        $query = Tutor::where('status', 'active');
        $sliderTutors = Tutor::where('status', 'active')->take(6)->get();
        $perPage = 5; // Define the number of tutors per page
        $blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();

        // Paginate the results
        $tutors = $query->paginate($perPage);
        // $tutor = Tutor::get();
        // Fetch the total count of tutors (for all countries)
        $totalTutorsCount = Tutor::count();


        // Initialize country array
        $tutors->each(function ($tutor) {
            $storedCountryCode = trim($tutor->country); // Remove any unwanted spaces/newline
            // Get country code
            $tutor->country_name = config("countries_assoc.countries.$storedCountryCode", 'Unknown'); // Convert to full name
            // Debug Language Decoding
            $language = json_decode($tutor->language, true);

            if (!is_array($language)) {
                \Log::error("Language decoding failed for Tutor ID: {$tutor->id}, Raw Data: " . $tutor->language);
                $tutor->language = []; // Fallback to empty array
            } else {
                $tutor->language = $language;
            }
            // Deserialize subjects safely

            $tutor->specialization = json_decode($tutor->specialization, true);

            // Ensure it's an array
            if (!is_array($tutor->specialization) || empty($tutor->specialization)) {
                $tutor->specialization = ['Not Specified'];
            }

            // Process Profile Image (Check if exists)

            // $tutor->profileImage = trim(preg_replace('/\s+/', '', $tutor->profileImage)); // Remove spaces & new lines

            // if (!empty($tutor->profileImage) && file_exists(public_path('storage/' . $tutor->profileImage))) {
            //     $tutor->profileImages = asset('storage/' . $tutor->profileImage);
            // } else {
            //     $tutor->profileImage = asset('default-profile.png');
            // }


            // Calculate age if DOB exists
            if ($tutor->dob) {
                $dob = Carbon::parse($tutor->dob);
                $tutor->dob = $dob->format('d-m-Y'); // Convert DOB to "DD-MM-YYYY"
                $tutor->age = $dob->age;
            } else {
                $tutor->age = null; // Default value
            }
        });
        $subjectsTeach = collect(config('subjects.subjects'));
        $countries = collect(config('countries_assoc.countries'));
        $countriesPhone = collect(config('phonecountries.countries'));
        $countries_number_length = collect(config('countries_number_length.countries'));
        $countries_prefix = collect(config('countries_prefix.countries'));
        return view('newhome', [
            'blogs' => $blogs,
            'sliderTutors' => $sliderTutors,
            'tutors' => $tutors,
            'subjectsTeach' => $subjectsTeach,
            'totalTutorsCount' => $totalTutorsCount,
            'perPage' => $perPage,
            'countries' => $countries,
            'countriesPhone' => $countriesPhone,
            'countries_number_length' => $countries_number_length,
            'countries_prefix' => $countries_prefix
        ]);
    }
    public function tutorDetail()
    {
        return view('teacher-detail');
    }

    public function destroyBulk(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:tutors,id', // Assuming 'tutors' is your table name
        ]);

        // Delete the selected tutors
        Tutor::destroy($request->ids);

        return response()->json(['success' => 'Tutors deleted successfully.']);
    }

    public function changeLanguage(Request $request)
    {
        // dd($request);
        $language = $request->language;

        if (in_array($language, ['en', 'ar'])) {
            Session::put('locale', $language); // Store the selected language in session
            App::setLocale($language); // Set the application locale
        }

        return redirect()->back();
    }
    public function fetchData(Request $request)
    {
        // Initialize the query builder
        $query = Tutor::query();

        // Define the number of tutors per page
        $perPage = 5;

        // //subject 
        // if ($request->has('teaching') && !empty($request->teaching)) {
        //     $subject = $request->teaching; // Get the selected subject (string)

        //     // Fetch all records and unserialize the "teaching" column for comparison
        //     $query->where(function ($query) use ($subject) {
        //         $query->whereRaw("teaching LIKE ?", ['%' . serialize($subject) . '%'])
        //               ->orWhereRaw("teaching LIKE ?", ['%' . $subject . '%']); // Handle plain text cases
        //     });
        // }        

        if ($request->has('price') && $request->price !== 'all') {
            $priceValue = trim($request->price);

            // Extract numeric value from stored price (e.g., "$ 100" -> "100")
            $query->whereRaw("CAST(REGEXP_REPLACE(price, '[^0-9]', '') AS UNSIGNED) IS NOT NULL");

            if (preg_match('/^(\d+)-(\d+)$/', $priceValue, $matches)) {
                // Case: Price Range (e.g., "200-500")
                $minPrice = (int) $matches[1];
                $maxPrice = (int) $matches[2];

                Log::info("Filtering tutors between $minPrice and $maxPrice");

                $query->whereRaw("CAST(REGEXP_REPLACE(price, '[^0-9]', '') AS UNSIGNED) BETWEEN ? AND ?", [$minPrice, $maxPrice]);

            } elseif (preg_match('/(\d+)\+/', $priceValue, $matches)) {
                // Case: "5000+" (minimum price)
                $minPrice = (int) $matches[1];

                Log::info("Filtering tutors with price >= $minPrice");

                $query->whereRaw("CAST(REGEXP_REPLACE(price, '[^0-9]', '') AS UNSIGNED) >= ?", [$minPrice]);

            } else {
                // Case: Exact Price (e.g., "100")
                if (is_numeric($priceValue)) {
                    $exactPrice = (int) $priceValue;

                    Log::info("Filtering tutors with exact price = $exactPrice");

                    $query->whereRaw("CAST(REGEXP_REPLACE(price, '[^0-9]', '') AS UNSIGNED) = ?", [$exactPrice]);
                }
            }
        }


        //gender
        if ($request->has('gender') && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }
        //country
        if ($request->has('country') && $request->country !== 'all') {
            $query->where('country', $request->country);
        }

        // Filter tutors by search query for subject
        if ($request->has('specialization') && !empty($request->specialization)) {
            $specialization = $request->specialization;

            if (is_array($specialization)) {
                $query->where(function ($q) use ($specialization) {
                    foreach ($specialization as $spec) {
                        $q->orWhereJsonContains('specialization', $spec);
                    }
                });
            } else {
                $query->whereJsonContains('specialization', $specialization);
            }
        }

        // Paginate the filtered tutors
        $tutors = $query->paginate($perPage);

        // Check if there are no tutors
        if ($tutors->isEmpty()) {
            return response()->json([
                'message' => 'No tutors found.',
                'totalTutorsCount' => 0,
                'perPage' => $perPage,
                'pagination' => [
                    'total' => 0,
                    'count' => 0,
                    'perPage' => $perPage,
                    'currentPage' => 1,
                    'lastPage' => 1,
                ],
            ]);
        }

        // Calculate age for each tutor and convert to array format
        $tutorsArray = $tutors->map(function ($tutor) {

            $tutor->specialization = json_decode($tutor->specialization, true);

            // If it's an array, convert it into a comma-separated string
            if (is_array($tutor->specialization)) {
                $tutor->specialization = implode(', ', array_map('trim', $tutor->specialization));
            } else {
                $tutor->specialization = trim($tutor->specialization ?? 'Not Specified');
            }

            $tutor->country_name = config("countries_assoc.countries.{$tutor->country}", 'Unknown');
            // Convert 'teaching' field to a readable string safely
            // $subjects = @unserialize($tutor->teaching);
            // if ($subjects === false) {
            //     $subjects = is_array(json_decode($tutor->teaching, true)) ? json_decode($tutor->teaching, true) : [];
            // }
            // $tutor->subjectString = !empty($subjects) ? implode(', ', $subjects) : 'No Subjects Available';
            // Debug Language Decoding
            $languageData = json_decode($tutor->language, true);
            if (!is_array($languageData)) {
                \Log::error("Language decoding failed for Tutor ID: {$tutor->id}, Raw Data: " . $tutor->language);
                $languageData = []; // Fallback to empty array
            }
            $tutor->languages = $languageData;
            // Calculate age and format DOB correctly
            if ($tutor->dob) {
                $dob = Carbon::parse($tutor->dob);
                $tutor->dob = $dob->format('d-m-Y'); // Convert DOB to "DD-MM-YYYY"
                $tutor->age = $dob->age; // Correct way to get age
            } else {
                $tutor->dob = 'Unknown';
                $tutor->age = 'Unknown';
            }

            return $tutor->toArray(); // Convert each tutor to an array
        })->toArray();

        // Fetch the total count of tutors after applying filters
        $totalTutorsCount = (clone $query)->count();

        // Manually serialize the paginated data
        $serializedData = [
            'tutors' => $tutorsArray, // Tutors as array
            'totalTutorsCount' => $totalTutorsCount,
            'perPage' => $perPage,
            'pagination' => [
                'total' => $tutors->total(),
                'count' => $tutors->count(),
                'perPage' => $tutors->perPage(),
                'currentPage' => $tutors->currentPage(),
                'lastPage' => $tutors->lastPage(),
            ],
        ];

        // Return the serialized data as JSON response
        return response()->json($serializedData);
    }


    public function updateTutorStatus(Request $request)
    {
        // Validate the request
        $request->validate([
            'id' => 'required|exists:tutors,id',
            'status' => 'required|in:active,inactive',
        ]);

        // Find the tutor by ID
        $tutor = Tutor::find($request->id);

        // Update the status
        $tutor->status = $request->status;
        $tutor->save();

        // If the tutor is inactive, destroy their session WITHOUT logging out the current admin
        if ($tutor->status === 'inactive') {
            // Get the session ID of the tutor
            $tutorSessionId = $tutor->session_id;

            // Invalidate the session if it exists
            if ($tutorSessionId) {
                // This destroys the tutor's session
                Session::getHandler()->destroy($tutorSessionId);

                // Optionally, clear the stored session ID
                $tutor->session_id = null;
                $tutor->save();
            }

            // Return a success message without logging out the admin
            return redirect()->route('all.tutors')->with('success', 'Tutor updated successfully.');

        }

        return redirect()->route('all.tutors')->with('success', 'Tutor updated successfully.');
    }

    public function store(Request $request)
    {
        // Your store method logic here
    }
    public function create(Request $request)
    {
        $rules = [
            'f_name' => 'required|string|max:255',
            'intro' => 'nullable|string|max:255',
            'l_name' => 'required|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'profileImage' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'required|string|email|max:255|unique:tutors,email',
            'experience' => 'required|string|max:255',
            'dob' => 'required|string|max:255',
            'document' => 'required|mimes:pdf,xlsx,docx|max:2048',
            'videoFile' => 'required|mimes:mp4,webm,ogg|max:51200',
            'specialization' => 'required|array', // Ensure it's an array
            'specialization.*' => 'string',
            'language_proficient' => 'required|array',
            'language_proficient.*' => 'string|max:255',
            'language_level' => 'required|array',
            'language_level.*' => 'string|max:255',
            'language_tech' => 'nullable|string|max:255',
            'edu_teaching' => 'nullable|array',
            'edu_teaching.*' => 'string|max:255',
            'currency_price' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $hashedPassword = Hash::make($request->input('password'));
        // Check if user already exists
        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            // Create the User first
            $user = new User();
            $user->name = $request->input('f_name') . ' ' . $request->input('l_name');
            $user->email = $request->input('email');
            $user->password = $hashedPassword;
            $user->role = 'tutor';
            $user->save();
        }
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            // Save the file to 'public/documents' with a unique name
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('documents'), $fileName); // Move the file to public/documents
        }

        if ($request->hasFile('videoFile')) {
            $videoPath = $request->file('videoFile')->store('videos', 'public');


        }

        $language = [];
        if ($request->has('language_proficient') && $request->has('language_level')) {
            foreach ($request->input('language_proficient') as $index => $lang) {
                if (!empty($lang) && isset($request->input('language_level')[$index])) {
                    $language[] = [
                        'language' => $lang,
                        'level' => $request->input('language_level')[$index],
                    ];
                }
            }
        }
        $studentExists = Student::where('id', 2)->exists();
        // Now create the Tutor and associate with the User
        $tutor = new Tutor();
        $tutor->teacher_id = mt_rand(1000, 9999);
        $tutor->f_name = $request->input('f_name');
        $tutor->description = $request->input('description');
        $tutor->l_name = $request->input('l_name');
        $tutor->country = $request->input('country');
        $tutor->year = $request->input('year');
        $tutor->email = $request->input('email');
        $tutor->document = 'documents/' . $fileName;
        $tutor->dob = $request->input('dob');
        $tutor->price = $request->input('currency_price');
        $tutor->qualification = $request->input('qualification');
        $tutor->gender = $request->input('gender');
        $tutor->location = $request->input('location');
        $tutor->experience = $request->input('experience');
        $tutor->language_tech = $request->input('language_tech');
        $tutor->curriculum = serialize($request->input('courses'));
        $tutor->teaching = serialize($request->input('teaching'));
        $tutor->phone = $request->input('phone');
        $user->password = Hash::make($request->input('password'));
        $tutor->video = 'storage/' . $videoPath; // Save video path in database
        $tutor->specialization = json_encode($request->input('specialization'));
        $tutor->password = $hashedPassword;
        $tutor->language = json_encode($language);
        $tutor->edu_teaching = json_encode($request->input('edu_teaching'));
        $tutor->availability_status = $request->input('availability_status');
        $tutor->student_id = $studentExists ? 2 : null;
        $tutor->status = 'active';
        $tutor->session_id = session()->getId();
        // Upload profile image
        $imagePath = $request->file('profileImage')->store('uploads', 'public');
        $tutor->profileImage = $imagePath;

        // Assign the user_id to the tutor
        $tutor->user_id = $user->id;

        // Save the Tutor instance
        $tutor->save();

        // Send notification emails with HTML content
        $toStudent = $tutor->email;
        $subjectStudent = "Welcome to Edexcel Academy - Verify Your Email!";
        $bodyStudent = "
                        <div style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
    <table width='100%' cellpadding='0' cellspacing='0' border='0'>
        <tr>
            <td align='center'>
                <table style='max-width: 600px; width: 100%; border: 1px solid #ddd; border-radius: 8px; background-color: #fff;' cellpadding='0' cellspacing='0'>
                    <!-- Header -->
                    <tr>
                        <td style='background-color: #f4f4f4; padding: 15px; text-align: center; font-size: 20px; font-weight: bold; color: #4CAF50; border-top-left-radius: 8px; border-top-right-radius: 8px;'>
                            Welcome to Edexcel Academy
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                     <td style='padding: 20px; text-align: left;'>
                             
                            <p style='font-size: 16px; margin: 0;'>Dear {$tutor->f_name} {$tutor->l_name},</p>
                            <p style='font-size: 16px; margin: 10px 0;'>
                                Welcome to Edexcel Academy! 🎉 We’re excited to support you on your educational journey with top-notch resources and interactive learning.
                            </p>
                            

                            <p style='font-size: 16px; margin: 10px 0;'>
                                If you need any assistance, contact us at <a href='mailto:info@edexceledu.com' style='color: #4CAF50; text-decoration: none;'>info@edexceledu.com</a> or +971566428066.
                            </p>

                            <p style='font-size: 16px; margin: 10px 0;'>Best regards,</p>
                            <p style='font-size: 16px; font-weight: bold; margin: 0;'>The Edexcel Team</p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style='background-color: #f4f4f4; color:#4CAF50; padding: 15px; text-align: center; font-size: 14px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;'>
                            &copy; 2025 Edexcel Academy. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
";

        // Send HTML email
        $this->sendEmail($toStudent, $subjectStudent, $bodyStudent); // true indicates HTML format

        // Notify Admin
        $toAdmin = 'info@edexceledu.com';
        $subjectAdmin = "New Teacher Enrollment Notification";
        $bodyAdmin = "
    <p>Dear Babar,</p>
    <p>I am pleased to inform you that a new teacher, <strong>{$tutor->f_name} {$tutor->l_name}</strong>, has successfully enrolled through our website. Below are the details:</p>
    <ul>
        <li><strong>Full Name:</strong> {$tutor->f_name} {$tutor->l_name}</li>
        <li><strong>Email:</strong> {$tutor->email}</li>
        <li><strong>Contact:</strong> {$tutor->phone}</li>
        <li><strong>Location:</strong> {$tutor->location}</li>
    </ul>
    <p>Please ensure that {$tutor->f_name} {$tutor->l_name} is added to our records and receives all necessary welcome materials.</p>
";

        // Send HTML email to admin
        $this->sendEmail($toAdmin, $subjectAdmin, $bodyAdmin, true);

        // Redirect with success message
        // Auto-login only if the user is a tutor
        if ($user->role === 'tutor') {
            Auth::login($user);
            return redirect()->route('teacher_dashboard', ['id' => $tutor->id])
                ->with('success', 'Tutor created successfully and logged in.');
        }
        return redirect()->back()->with('error', 'Failed to redirect.');
    }

    public function hiretutor(Request $request)
    {
        return redirect('/hire-tutor');
    }
    public function checkout($id)
    {
        // Find the tutor by ID
        $tutor = Tutor::find($id);

        if (!$tutor) {
            return redirect()->back()->with('error', 'Tutor not found.');
        }

        // Find the associated user
        $user = User::find($tutor->user_id);

        // Delete the tutor first
        $tutor->delete();

        // Delete the user if found
        if ($user) {
            $user->delete();
        }

        // Redirect with success message
        return redirect()->back()->with('success', 'Tutor and associated user deleted successfully.');
    }
    public function teacher_dashboard(Request $request, $id)
        {
            $tutor = Tutor::find($id);

            if (!$tutor) {
                return redirect()->route('basicsignup')->with('error', 'Tutor not found.');
            }

            // Extra data for UI (like in student_dashboard)
            $query = Tutor::where('status', 'active');
            $sliderTutors = Tutor::where('status', 'active')->take(6)->get();
            $perPage = 5;
            $blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
            $tutors = $query->paginate($perPage);
            $totalstudentCount = Student::count();
            $student=Student::all();
            // Format tutor data
            $storedCountry = trim($tutor->country);
            $tutor->country_name = config("countries_assoc.countries.$storedCountry", 'Unknown');

            $tutor->language = json_decode($tutor->language, true) ?? [];
            $tutor->specialization = json_decode($tutor->specialization, true) ?? ['Not Specified'];

            if ($tutor->dob) {
                $dob = Carbon::parse($tutor->dob);
                $tutor->dob = $dob->format('d-m-Y');
                $tutor->age = $dob->age;
            } else {
                $tutor->age = null;
            }

            // Clean tutor subjects
            $tutorSubjects = json_decode($tutor->edu_teaching, true);
            $tutorSubjects = is_array($tutorSubjects) ? array_map(fn($s) => strtolower(trim($s)), $tutorSubjects) : [];

            $tutorAvailability = strtolower(trim($tutor->availability_status));

            // Filter matching students
            $allStudents = Student::all();

            $matchedStudents = $allStudents->filter(function ($student) use ($tutorSubjects, $tutorAvailability) {
                $studentSubjects = explode(',', $student->subject);
                $studentSubjects = array_map(fn($s) => strtolower(trim($s)), $studentSubjects);
                $studentAvailability = strtolower(trim($student->availability_status));
                return !empty(array_intersect($studentSubjects, $tutorSubjects)) && $studentAvailability === $tutorAvailability;
            });

            // Format matched students
            $matchedStudents->each(function ($student) {
                $storedCountry = trim($student->country);
                $student->country_name = config("countries_assoc.countries.$storedCountry", 'Unknown');
                $student->language = json_decode($student->language, true) ?? [];

                if ($student->dob) {
                    $dob = Carbon::parse($student->dob);
                    $student->dob = $dob->format('d-m-Y');
                    $student->age = $dob->age;
                } else {
                    $student->age = null;
                }
            });

            // Paginate matched students
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $paginatedStudents = new LengthAwarePaginator(
                $matchedStudents->slice(($currentPage - 1) * $perPage, $perPage)->values(),
                $matchedStudents->count(),
                $perPage,
                $currentPage,
                ['path' => request()->url(), 'query' => request()->query()]
            );

            // Config data
            $subjectsTeach = collect(config('subjects.subjects'));
            $countries = collect(config('countries_assoc.countries'));
            $countriesPhone = collect(config('phonecountries.countries'));
            $countries_number_length = collect(config('countries_number_length.countries'));
            $countries_prefix = collect(config('countries_prefix.countries'));

            if ($tutor->user_id && Auth::loginUsingId($tutor->user_id)) {
                return view('teacher_dashboard', [
                    'student' => $student,'tutor' => $tutor,
                    'matchedStudents' => $matchedStudents,
                    'paginatedStudents' => $paginatedStudents,
                    'sliderTutors' => $sliderTutors,
                    'tutors' => $tutors,
                    'blogs' => $blogs,
                    'totalstudentCount' => $totalstudentCount,
                    'subjectsTeach' => $subjectsTeach,
                    'countries' => $countries,
                    'countriesPhone' => $countriesPhone,
                    'countries_number_length' => $countries_number_length,
                    'countries_prefix' => $countries_prefix,
                    'perPage' => $perPage
                ])->with('success', 'Welcome to your dashboard.');
            }

            return redirect()->route('basicsignup')->with('error', 'Authentication failed.');
        }




    public function fetchTeachers(Request $request)
    {
        $students = Tutor::all();
        return response()->json($students);
    }
    private function sendEmail($to, $subject, $body)
    {
        $mail = new PHPMailer(true);
        $pass = env('email_pass');
        $name = env('email_name');
        try {
            $mail->isSMTP(); // Add this line!

            // Load SMTP settings from Laravel .env
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = $name;  // Your email
            $mail->Password = $pass;  // Your password
            $mail->SMTPSecure = 'tls';  // Encryption method
            $mail->Port = 587;  // SMTP port

            // Email settings
            $mail->setFrom($name, 'Edexcel');
            $mail->addAddress($to);

            // Email content
            $mail->isHTML(true); // Plain text email
            $mail->Subject = $subject;
            $mail->Body = $body;

            // Send email
            if ($mail->send()) {
                Log::info("Email successfully sent to: $to");
                return response()->json(['message' => 'Email sent successfully!']);
            }

        } catch (Exception $e) {
            Log::error("Email sending failed: " . $e->getMessage());
            return response()->json(['error' => 'Email sending failed. Please try again.'], 500);
        }
    }

    public function findTutors(Request $request)
    {
        $country_id = $request->get('country_id');

        // Query tutors based on the selected country ID
        $tutors = Tutor::where('location', $country_id)->get();

        // Return just the HTML for table rows
        $html = '';
        foreach ($tutors as $tutor) {
            $html .= '
                            <tr>
                                <td>
                                    <input class="form-check-input tutor-checkbox" type="checkbox" value="' . $tutor->id . '" id="flexCheckChecked-' . $tutor->id . '">
                                    <label class="form-check-label" for="flexCheckChecked-' . $tutor->id . '"></label>
                                </td>
                                <td>' . $tutor->id . '</td>
                                <td>' . $tutor->f_name . ' ' . $tutor->l_name . '</td>
                                <td>' . $tutor->qualification . '</td>
                                <td>' . $tutor->gender . '</td>
                                <td>' . $tutor->location . '</td>
                                <td><a href="' . url($tutor->document) . '" target="_blank">View PDF Document</a></td>
                               
                                <td>' . $tutor->email . '</td>
                                <td>' . $tutor->phone . '</td>
                                <td>
                                    <form action="' . route('update.tutor.status') . '" method="POST" id="statusForm_' . $tutor->id . '">
                                        ' . csrf_field() . '
                                        <input type="hidden" name="id" value="' . $tutor->id . '">
                                        <input type="hidden" name="status" id="statusInput_' . $tutor->id . '" value="' . $tutor->status . '">
                                        <label class="switch mb-0 mt-2">
                                            <input type="checkbox" id="statusToggle_' . $tutor->id . '"
                                                ' . ($tutor->status === 'active' ? 'checked' : '') . '
                                                onchange="updateStatus(' . $tutor->id . ')">
                                            <span class="slider round"></span>
                                        </label>
                                        <button type="submit" style="display:none;"></button>
                                    </form>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropdown-icon" id="dropdownButton">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <ul class="dropdown-action " id="dropdownMenu">
                                            <li>
                                                <a href="' . route('edit-teacher', $tutor->id) . '" class="btn btn-sm text-justify">
                                                    <i class="fa-regular fa-pen-to-square" style="color: #4e73df;"></i>
                                                    <span class="mx-1">Edit</span>
                                                </a>
                                            </li>
                                            <li>
                                                <form action="' . route('teachers.destroy', $tutor->id) . '" method="POST" style="display:inline;">
                                                    ' . csrf_field() . '
                                                    ' . method_field('DELETE') . '
                                                    <button type="submit" class="btn btn-sm d-flex align-items-center" onclick="return confirm(\'Are you sure?\')" style="color: black; margin-left: -11%;">
                                                        <i class="fa-solid fa-trash-can mx-1" style="color: #e74a3b;"></i>
                                                        <span class="mx-1">Delete</span>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>';
        }

        if ($tutors->isEmpty()) {
            $html .= '
                            <tr class="text-center">
                                <td colspan="12">No tutors found for the selected country.</td>
                            </tr>';
        }

        // Return the generated HTML
        return response()->json(['html' => $html]);
    }

    public function allTutors(Request $request)
    {
        $tutors = Tutor::all();
        $countries = collect(config('countries_assoc.countries'));
        return view('teacher-list', compact('tutors', 'countries'));
    }
    public function allBlogs()
    {
        $blogs = Blog::all();
        return view('blogs-list', compact('blogs'));
    }


    public function signup()
    {
        $schoolClasses = SchoolClass::all();
        $countriesPhone = collect(config('phonecountries.countries'));
        $countries_number_length = collect(config('countries_number_length.countries'));
        $countries_prefix = collect(config('countries_prefix.countries'));
        $countries = collect(config('countries_assoc.countries'));
        $languages = collect(config('languages.languages'));
        $courses = collect(config('courses.courses'));
        $symbols = collect(config('symbols.symbols'));  // Will show all contents of config/symbols.php
        $subjectsTeach = collect(config('subjects.subjects')); // Fetch languages from config
        $universities = collect(config('universities.universities'));
        // Retrieve verified email from session (if exists)
        $verifiedEmail = session('verified_email', '');
        return view('tutor-signup', compact(['courses', 'universities', 'symbols', 'countriesPhone', 'countries', 'verifiedEmail', 'schoolClasses', 'countries_number_length', 'countries_prefix', 'languages']));
    }
    public function assignStudent($tutorId, $studentId)
    {
        $tutor = Tutor::findOrFail($tutorId);
        $student = Student::findOrFail($studentId);

        // Attach student to tutor
        $tutor->students()->attach($studentId);

        return response()->json(['message' => 'Student assigned to tutor successfully!']);
    }

    public function show($id)
    {
        $tutor = Tutor::findOrFail($id);
        $qualification = SchoolClass::where('id', $tutor->qualification)->value('name') ?? 'Not specified';
        $tutor->teaching = unserialize($tutor->teaching);
        $storedLanguageCode = $tutor->language;

        $languages = collect(json_decode($storedLanguageCode, true)) // Decode JSON
            ->pluck('language') // Extract language codes
            ->toArray(); // Convert to array

        // Map each language code to its full name from the config file
        $languageNames = array_map(function ($code) {
            return config("languages.languages.$code", 'Unknown');
        }, $languages);

        $tutor->curriculum = unserialize($tutor->curriculum);
        $countries = collect(config('phonecountries.countries'));
        return view('view-teacher', compact(['tutor', 'countries', 'qualification', 'languageNames']));
    }

    public function view($id)
    {
        $tutor = Tutor::findOrFail($id); // Fetch the tutor by ID

        if (!$tutor->document) {
            return redirect()->back()->with('error', 'No document found.');
        }

        return view('document_view', compact('tutor'));

    }

    public function edit($id)
    {
        $schoolClasses = SchoolClass::all();
        $tutor = Tutor::findOrFail($id);
        $qualification = SchoolClass::where('id', $tutor->qualification)->value('name') ?? 'Not specified';
        $tutor->teaching = unserialize($tutor->teaching);
        $storedLanguageCode = $tutor->language;

        $languages = collect(json_decode($storedLanguageCode, true)) // Decode JSON
            ->pluck('language') // Extract language codes
            ->toArray(); // Convert to array

        // Map each language code to its full name from the config file
        $languageNames = array_map(function ($code) {
            return config("languages.languages.$code", 'Unknown');
        }, $languages);

        //country

        $storedCountryCode = $tutor->country; // Get country code
        $country = config("countries_assoc.countries.$storedCountryCode", 'Unknown'); // Convert to full name

        $tutor->curriculum = unserialize($tutor->curriculum);
        $countriesPhone = collect(config('phonecountries.countries'));
        $countries_number_length = collect(config('countries_number_length.countries'));
        $countries_prefix = collect(config('countries_prefix.countries'));
        $countries = collect(config('countries_assoc.countries'));
        return view('edit-teacher', compact(['tutor', 'country', 'countriesPhone', 'countries', 'countries_number_length', 'countries_prefix', 'languageNames', 'schoolClasses', 'qualification']));
    }

    public function updateProfile(Request $request, $id)
    {
        $rules = [
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'intro' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'profileImage' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email' => "required|string|email|max:255|unique:tutors,email,$id",
            'experience' => 'required|string|max:255',
            'dob' => 'required|string|max:255',
            'document' => 'nullable|mimes:pdf,xlsx,docx|max:2048',
            'videoFile' => 'nullable|mimes:mp4,webm,ogg|max:51200',
            'specialization' => 'required|array',
            'specialization.*' => 'string',
            'language_proficient' => 'required|array',
            'language_proficient.*' => 'string|max:255',
            'language_level' => 'required|array',
            'language_level.*' => 'string|max:255',
            'language_tech' => 'nullable|string|max:255',
            'edu_teaching' => 'nullable|string|max:255',
            'currency_price' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Get the mapping of school class names to IDs
        $schoolClass = SchoolClass::where('name', $request->qualification)->first();

        // If the qualification is a name (e.g., "A Level"), convert it to its ID
        $qualificationId = $schoolClass ? $schoolClass->id : $request->qualification;

        $tutor = Tutor::findOrFail($id);
        $user = User::where('id', $tutor->user_id)->firstOrFail();

        // Update User details
        $user->name = $request->input('f_name') . ' ' . $request->input('l_name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();


        // Handle Document Upload (Retain Previous Value if No New File)
        if ($request->hasFile('document')) {
            if (!empty($tutor->document)) {
                $oldFilePath = public_path('uploads/documents/' . $tutor->document);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $documentFile = $request->file('document');
            $documentName = time() . '_' . $documentFile->getClientOriginalName();
            $documentFile->move(public_path('uploads/documents/'), $documentName);
            $tutor->document = 'uploads/documents/' . $documentName;
        }

        // Handle Video Upload (Retain Previous Value if No New File)
        if ($request->hasFile('videoFile')) {
            if (!empty($tutor->video)) {
                $oldVideoPath = public_path($tutor->video);
                if (file_exists($oldVideoPath)) {
                    unlink($oldVideoPath);
                }
            }
            $videoFile = $request->file('videoFile');
            $videoName = time() . '_' . $videoFile->getClientOriginalName();
            $videoFile->move(public_path('uploads/videos/'), $videoName);
            $tutor->video = 'uploads/videos/' . $videoName;
        }

        // Handle Profile Image Upload (Retain Previous Value if No New File)
        if ($request->hasFile('profileImage')) {
            if (!empty($tutor->profileImage)) {
                $oldImagePath = public_path('storage/' . $tutor->profileImage);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $imageFile = $request->file('profileImage');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->storeAs('uploads', $imageName, 'public');
            $tutor->profileImage = 'uploads/' . $imageName;
        }

        $existingLanguages = json_decode($tutor->language, true) ?? []; // Decode existing languages

        $updatedLanguages = [];

        if ($request->filled('language_proficient') && $request->filled('language_level')) {
            foreach ($request->input('language_proficient') as $index => $lang) {
                if (!empty($lang) && isset($request->input('language_level')[$index])) {
                    $updatedLanguages[] = [
                        'language' => $lang,
                        'level' => $request->input('language_level')[$index],
                    ];
                }
            }
        }

        // If no new values are provided, keep the existing languages
        if (empty($updatedLanguages)) {
            $updatedLanguages = $existingLanguages;
        }

        // Save the final result
        $tutor->language = json_encode($updatedLanguages);



        // Update other fields
        $tutor->f_name = $request->input('f_name');
        $tutor->l_name = $request->input('l_name');
        $tutor->email = $request->input('email');
        $tutor->dob = $request->input('dob');
        $tutor->price = $request->input('currency_price');
        $tutor->qualification = $qualificationId;
        $tutor->gender = $request->input('gender');
        $tutor->location = $request->input('location');
        $tutor->experience = $request->input('experience');
        $tutor->language_tech = $request->input('language_tech');
        $tutor->curriculum = serialize($request->input('courses'));
        $tutor->teaching = serialize($request->input('teaching'));
        $tutor->phone = $request->input('phone');
        $tutor->specialization = json_encode($request->input('specialization'));
        $tutor->edu_teaching = $request->input('edu_teaching');
        $tutor->availability_status = $request->input('status') ?? 'online';
        $tutor->status = 'active';

        // Assign the user_id to the tutor
        $tutor->user_id = $user->id;

        // Save the updated tutor
        $tutor->save();


        // Send update email to tuto
        $toTutor = $tutor->email;
        $subjectTutor = "Your Profile Has Been Updated Successfully";
        $messageTutor = "Dear " . $tutor->f_name . ' ' . $tutor->l_name . ",\r\n" .
            "Your profile information has been successfully updated.\r\n" .
            "If you did not make these changes, please contact support immediately.\r\n\r\n" .
            "Best regards,\r\n" .
            "The Edexcel Team";
        $this->sendEmail($toTutor, $subjectTutor, $messageTutor);

        return redirect()->route('all.tutors')->with('success', 'Tutor profile updated successfully.');
    }
    public function frontEdit($id)
    {
        $schoolClasses = SchoolClass::all();
        $tutor = Tutor::findOrFail($id);
        $qualification = SchoolClass::where('id', $tutor->qualification)->value('name') ?? 'Not specified';
        $tutor->teaching = unserialize($tutor->teaching);
        $storedLanguageCode = $tutor->language;

        $languages = collect(json_decode($storedLanguageCode, true)) // Decode JSON
            ->pluck('language') // Extract language codes
            ->toArray(); // Convert to array

        // Map each language code to its full name from the config file
        $languageNames = array_map(function ($code) {
            return config("languages.languages.$code", 'Unknown');
        }, $languages);

        //country

        $storedCountryCode = $tutor->country; // Get country code
        $country = config("countries_assoc.countries.$storedCountryCode", 'Unknown'); // Convert to full name

        $tutor->curriculum = unserialize($tutor->curriculum);
        $countriesPhone = collect(config('phonecountries.countries'));
        $countries_number_length = collect(config('countries_number_length.countries'));
        $countries_prefix = collect(config('countries_prefix.countries'));
        $countries = collect(config('countries_assoc.countries'));
        return view('teacher_update', compact(['tutor', 'country', 'countriesPhone', 'countries', 'countries_number_length', 'countries_prefix', 'languageNames', 'schoolClasses', 'qualification']));
    }
    public function updateTeacherProfile(Request $request, $id)
    {
        $rules = [
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'intro' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'profileImage' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email' => "required|string|email|max:255|unique:tutors,email,$id",
            'experience' => 'required|string|max:255',
            'dob' => 'required|string|max:255',
            'document' => 'nullable|mimes:pdf,xlsx,docx|max:2048',
            'videoFile' => 'nullable|mimes:mp4,webm,ogg|max:51200',
            'specialization' => 'required|array',
            'specialization.*' => 'string',
            'language_proficient' => 'required|array',
            'language_proficient.*' => 'string|max:255',
            'language_level' => 'required|array',
            'language_level.*' => 'string|max:255',
            'language_tech' => 'nullable|string|max:255',
            'edu_teaching' => 'nullable|string|max:255',
            'currency_price' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Get the mapping of school class names to IDs
        $schoolClass = SchoolClass::where('name', $request->qualification)->first();

        // If the qualification is a name (e.g., "A Level"), convert it to its ID
        $qualificationId = $schoolClass ? $schoolClass->id : $request->qualification;

        $tutor = Tutor::findOrFail($id);
        $user = User::where('id', $tutor->user_id)->firstOrFail();

        // Update User details
        $user->name = $request->input('f_name') . ' ' . $request->input('l_name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();


        // Handle Document Upload (Retain Previous Value if No New File)
        if ($request->hasFile('document')) {
            if (!empty($tutor->document)) {
                $oldFilePath = public_path('uploads/documents/' . $tutor->document);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $documentFile = $request->file('document');
            $documentName = time() . '_' . $documentFile->getClientOriginalName();
            $documentFile->move(public_path('uploads/documents/'), $documentName);
            $tutor->document = 'uploads/documents/' . $documentName;
        }

        // Handle Video Upload (Retain Previous Value if No New File)
        if ($request->hasFile('videoFile')) {
            if (!empty($tutor->video)) {
                $oldVideoPath = public_path($tutor->video);
                if (file_exists($oldVideoPath)) {
                    unlink($oldVideoPath);
                }
            }
            $videoFile = $request->file('videoFile');
            $videoName = time() . '_' . $videoFile->getClientOriginalName();
            $videoFile->move(public_path('uploads/videos/'), $videoName);
            $tutor->video = 'uploads/videos/' . $videoName;
        }

        // Handle Profile Image Upload (Retain Previous Value if No New File)
        if ($request->hasFile('profileImage')) {
            if (!empty($tutor->profileImage)) {
                $oldImagePath = public_path('storage/' . $tutor->profileImage);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $imageFile = $request->file('profileImage');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->storeAs('uploads', $imageName, 'public');
            $tutor->profileImage = 'uploads/' . $imageName;
        }

        $existingLanguages = json_decode($tutor->language, true) ?? []; // Decode existing languages

        $updatedLanguages = [];

        if ($request->filled('language_proficient') && $request->filled('language_level')) {
            foreach ($request->input('language_proficient') as $index => $lang) {
                if (!empty($lang) && isset($request->input('language_level')[$index])) {
                    $updatedLanguages[] = [
                        'language' => $lang,
                        'level' => $request->input('language_level')[$index],
                    ];
                }
            }
        }

        // If no new values are provided, keep the existing languages
        if (empty($updatedLanguages)) {
            $updatedLanguages = $existingLanguages;
        }

        // Save the final result
        $tutor->language = json_encode($updatedLanguages);



        // Update other fields
        $tutor->f_name = $request->input('f_name');
        $tutor->l_name = $request->input('l_name');
        $tutor->email = $request->input('email');
        $tutor->dob = $request->input('dob');
        $tutor->price = $request->input('currency_price');
        $tutor->qualification = $qualificationId;
        $tutor->gender = $request->input('gender');
        $tutor->location = $request->input('location');
        $tutor->experience = $request->input('experience');
        $tutor->language_tech = $request->input('language_tech');
        $tutor->curriculum = serialize($request->input('courses'));
        $tutor->teaching = serialize($request->input('teaching'));
        $tutor->phone = $request->input('phone');
        $tutor->specialization = json_encode($request->input('specialization'));
        $tutor->edu_teaching = $request->input('edu_teaching');
        $tutor->availability_status = $request->input('status') ?? 'online';
        $tutor->status = 'active';

        // Assign the user_id to the tutor
        $tutor->user_id = $user->id;

        // Save the updated tutor
        $tutor->save();


        // Send update email to tuto
        $toTutor = $tutor->email;
        $subjectTutor = "Your Profile Has Been Updated Successfully";
        $messageTutor = "Dear " . $tutor->f_name . ' ' . $tutor->l_name . ",\r\n" .
            "Your profile information has been successfully updated.\r\n" .
            "If you did not make these changes, please contact support immediately.\r\n\r\n" .
            "Best regards,\r\n" .
            "The Edexcel Team";
        $this->sendEmail($toTutor, $subjectTutor, $messageTutor);

        return redirect()->route('teacher_dashboard', ['id' => $tutor->id])
            ->with('success', 'Tutor created successfully and logged in.');
    }

    public function destroy($id)
    {
        // Find the tutor by ID
        $tutor = Tutor::find($id);

        // Check if the tutor exists
        if ($tutor) {
            // Store the user ID to delete later
            $userId = $tutor->user_id; // Assuming there is a user_id column in the tutors table

            // Delete the tutor
            $tutor->delete();

            // Delete the associated user
            User::destroy($userId);

            // Redirect back with a success message
            return redirect()->route('all.tutors')->with('success', 'Teacher and associated user deleted successfully');
        }

        // If tutor not found, return with an error message
        return back()->with('error', 'Teacher not found');
    }

    public function logoutTeacher($id)
    {
        // Find the tutor by ID
        $tutor = Tutor::find($id);

        // Check if the tutor exists
        if ($tutor) {
            // Get the associated user
            $user = User::find($tutor->user_id);

            // If the logged-in user is the same as the tutor, log them out
            if (Auth::id() === optional($user)->id) {
                Auth::logout();
                $tutor->status = "active";
                $tutor->save();
                // Invalidate the session
                request()->session()->invalidate();
                request()->session()->regenerateToken();
                return dd($tutor->status);
                // Redirect to login page
                // return redirect()->route('login')->with('success', 'You have been logged out successfully.');
            }
        }

        // Redirect back with an error if tutor not found
        return redirect()->back()->with('error', 'Teacher not found or unauthorized logout attempt.');
    }

}


