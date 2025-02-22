<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Carbon\Carbon;
use App\Models\Country;
use Illuminate\Http\Request;
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

        $perPage = 5; // Define the number of tutors per page

        // Paginate the results
        $tutors = $query->paginate($perPage);

        // Fetch the total count of tutors (for all countries)
        $totalTutorsCount = Tutor::count();

        // Calculate age for each tutor
        foreach ($tutors as $tutor) {
            if ($tutor->dob) {
                $tutor->age = Carbon::parse($tutor->dob)->age;
            } else {
                $tutor->age = null; // or any default value
            }
        }
        $countries = collect(config('countries_assoc.countries'));
        $countriesPhone = collect(config('phonecountries.countries'));
        $countries_number_length = collect(config('countries_number_length.countries'));
        $countries_prefix = collect(config('countries_prefix.countries'));
        return view('newhome', [
            'tutors' => $tutors,
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

        // Apply filters
        // Filter tutors by selected country if a specific country is selected
        if ($request->has('location') && $request->location !== "all") {
            $query->where('location', $request->location);
        }
        if ($request->has('gender') && $request->gender !== "all") {
            $query->where('gender', $request->gender);
        }
        // Filter tutors by search query for city
        if ($request->has('citysearch') && $request->citysearch !== "") {
            $query->where('city', 'LIKE', '%' . $request->citysearch . '%');
        }

        // Filter tutors by search query for subject
        if ($request->has('subjectsearch') && $request->filled('subjectsearch')) {
            $subject = $request->subjectsearch;

            // Filter tutors who teach the specified subject
            $query->where('teaching', 'LIKE', '%"' . $subject . '"%');
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
            if ($tutor->dob) {
                $tutor->age = Carbon::parse($tutor->dob)->age;
            } else {
                $tutor->age = null; // or any default value
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
            'document' => 'required|mimes:pdf|max:2048',
            'videoFile' => 'required|mimes:mp4,webm,ogg|max:51200',
            'specilization' => 'nullable|string|max:255',
            'language_proficient' => 'required|array',
            'language_proficient.*' => 'string|max:255',
            'language_level' => 'required|array',
            'language_level.*' => 'string|max:255',
            'language_tech' => 'nullable|string|max:255',
            'edu_teaching' => 'nullable|string|max:255',
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
        $tutor->specialization = $request->input('specialization');
        $tutor->password = $hashedPassword;
        $tutor->language = json_encode($language);
        $tutor->edu_teaching = $request->input('edu_teaching');
        $tutor->status = $request->input('status') ?? 'online';
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
        $subjectStudent = "Welcome to Edexcel - Verify Your Email!";
        $bodyStudent = "
                        <div style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
    <table width='100%' cellpadding='0' cellspacing='0' border='0'>
        <tr>
            <td align='center'>
                <table style='max-width: 600px; width: 100%; border: 1px solid #ddd; border-radius: 8px; background-color: #fff;' cellpadding='0' cellspacing='0'>
                    <!-- Header -->
                    <tr>
                        <td style='background-color: #f4f4f4; padding: 15px; text-align: center; font-size: 20px; font-weight: bold; color: #4CAF50; border-top-left-radius: 8px; border-top-right-radius: 8px;'>
                            Welcome to Edexcel
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                     <td style='padding: 20px; text-align: left;'>
                             <div style='text-align: center; padding-bottom: 10px;'>
                                <img src='" . asset('images/edexcel.jpeg') . "' alt='Edexcel Logo' height='50' width='150' style='display: block; margin: 0 auto;'>
                            </div>
                            <p style='font-size: 16px; margin: 0;'>Dear {$tutor->f_name} {$tutor->l_name},</p>
                            <p style='font-size: 16px; margin: 10px 0;'>
                                Welcome to Edexcel! 🎉 We’re excited to support you on your educational journey with top-notch resources and interactive learning.
                            </p>
                             <p style='font-size: 16px; margin: 10px 0;'>
                               To checkout by clicking the button below:
                            </p>
                            <!-- Button (wrapped in table for Outlook compatibility) -->
                            <table align='center' cellpadding='0' cellspacing='0' border='0'>
                                <tr>
                                    <td align='center' style='border-radius: 5px;' bgcolor='#e74a3b'>
                                        <a href='" . url('checkout/' . $tutor->id) . "' target='_blank' style='display: inline-block; font-size: 16px; color: #ffffff; text-decoration: none; padding: 12px 20px; background-color: #4CAF50; border-radius: 5px; font-weight: bold;'
                                        onclick='return confirm(\"Are you sure you want to check out? This will delete the tutor and their associated user.\");'>
                                            Check Out
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style='font-size: 16px; margin: 10px 0;'>
                                If you need any assistance, contact us at <a href='mailto:infoo@edexceledu.com' style='color: #4CAF50; text-decoration: none;'>infoo@edexceledu.com</a> or +971566428066.
                            </p>

                            <p style='font-size: 16px; margin: 10px 0;'>Best regards,</p>
                            <p style='font-size: 16px; font-weight: bold; margin: 0;'>The Edexcel Team</p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style='background-color: #f4f4f4; color:#4CAF50; padding: 15px; text-align: center; font-size: 14px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;'>
                            &copy; 2025 Edexcel. All rights reserved.
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
    }  return redirect()->back()->with('error', 'Failed to redirect.');
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

    // Ensure the user exists before logging in
    if ($tutor->user_id && Auth::loginUsingId($tutor->user_id)) {
        return view('teacher_dashboard', compact('tutor'))->with('success', 'Welcome to your dashboard!');
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

        try {
            // Load SMTP settings from Laravel .env
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST', 'smtp.hostinger.com');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME'); // Your SMTP username (email)
            $mail->Password = env('MAIL_PASSWORD'); // Your SMTP password
            $mail->SMTPSecure = env('MAIL_ENCRYPTION', 'tls'); // TLS or SSL
            $mail->Port = env('MAIL_PORT', 587); // Default: 587 for TLS, 465 for SSL

            // Set sender info
            $mail->setFrom(env('MAIL_FROM_ADDRESS', 'no-reply@yourdomain.com'), env('MAIL_FROM_NAME', 'Edexcel'));
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
        $subjectsTeach = collect(config('subjects.subjects')); // Fetch languages from config
        $universities = collect(config('universities.universities'));
        // Retrieve verified email from session (if exists)
        $verifiedEmail = session('verified_email', '');
        return view('tutor-signup', compact(['courses','universities', 'countriesPhone', 'countries', 'verifiedEmail', 'schoolClasses', 'countries_number_length', 'countries_prefix', 'languages']));
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
        $tutor->curriculum = unserialize($tutor->curriculum);
        $countries = collect(config('phonecountries.countries'));
        return view('edit-teacher', compact(['tutor', 'countries', 'languageNames', 'schoolClasses', 'qualification']));
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
            'document' => 'nullable|mimes:pdf|max:2048',
            'videoFile' => 'nullable|mimes:mp4,webm,ogg|max:51200',
            'specialization' => 'nullable|string|max:255',
            'language_proficient' => 'required|array',
            'language_proficient.*' => 'string|max:255',
            'language_level' => 'required|array',
            'language_level.*' => 'string|max:255',
            'language_tech' => 'nullable|string|max:255',
            'edu_teaching' => 'nullable|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the tutor by ID
        $tutor = Tutor::findOrFail($id);
        $user = User::where('id', $tutor->user_id)->firstOrFail();

        // Update User details
        $user->name = $request->input('f_name') . ' ' . $request->input('l_name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        // Handle file uploads
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('documents'), $fileName);
            $tutor->document = 'documents/' . $fileName;
        }

        if ($request->hasFile('videoFile')) {
            $videoPath = $request->file('videoFile')->store('videos', 'public');
            $tutor->video = 'storage/' . $videoPath;
        }

        if ($request->hasFile('profileImage')) {
            $imagePath = $request->file('profileImage')->store('uploads', 'public');
            $tutor->profileImage = $imagePath;
        }

        // Handle language proficiency array
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

        // Update tutor details
        $tutor->f_name = $request->input('f_name');
        $tutor->l_name = $request->input('l_name');
        $tutor->description = $request->input('description');
        $tutor->country = $request->input('country');
        $tutor->year = $request->input('year');
        $tutor->email = $request->input('email');
        $tutor->dob = $request->input('dob');
        $tutor->qualification = $request->input('qualification');
        $tutor->gender = $request->input('gender');
        $tutor->location = $request->input('location');
        $tutor->experience = $request->input('experience');
        $tutor->language_tech = $request->input('language_tech');
        $tutor->curriculum = serialize($request->input('courses'));
        $tutor->teaching = serialize($request->input('teaching'));
        $tutor->phone = $request->input('phone');
        $tutor->specialization = $request->input('specialization');
        $tutor->password = $user->password;
        $tutor->language = json_encode($language);
        $tutor->edu_teaching = $request->input('edu_teaching');
        $tutor->status = $request->input('status') ?? 'online';
        $tutor->session_id = session()->getId();
        $tutor->save();

        // Send update email to tutor
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
    
                // Invalidate the session
                request()->session()->invalidate();
                request()->session()->regenerateToken();
    
                // Redirect to login page
                return redirect()->route('login')->with('success', 'You have been logged out successfully.');
            }
        }
    
        // Redirect back with an error if tutor not found
        return redirect()->back()->with('error', 'Teacher not found or unauthorized logout attempt.');
    }
    
}


