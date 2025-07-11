<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Student;
use Carbon\Carbon;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
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
        $perPage = 6;
        $blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $sliderTutors = Tutor::where('status', 'active')->take(6)->get();
        $totalTutorsCount = Tutor::count();

        $subjectSearch = null;
        $inputSearch = trim($request->input('subjectsearch'));

        if ($inputSearch !== '') {
            $subjectSearch = $inputSearch;

            if (auth()->check() && auth()->user()->role === 'user') {
                DB::table('student')
                    ->where('user_id', auth()->id())
                    ->update([
                        'searchQuery' => $subjectSearch,
                        'updated_at' => now(),
                    ]);
            }
        } elseif (auth()->check() && auth()->user()->role === 'user') {
            $student = DB::table('student')->where('user_id', auth()->id())->first();

            if ($student && $student->searchQuery) {
                $subjectSearch = $student->searchQuery;
                Log::info("📌 Loaded previous subject search: " . $subjectSearch);
            }
        }

        // Fetch all active tutors
        $allTutors = Tutor::where('status', 'active')->get();
        $allTutorsCount = Tutor::where('status', 'active')->count();
        // Partition tutors based on subject match
        if ($subjectSearch) {
            [$matchedTutors, $otherTutors] = $allTutors->partition(function ($tutor) use ($subjectSearch) {
                return str_contains(strtolower($tutor->subject), strtolower($subjectSearch)) ||
                    str_contains(strtolower($tutor->edu_teaching), strtolower($subjectSearch));
            });

            $sortedTutors = $matchedTutors->concat($otherTutors);
        } else {
            $sortedTutors = $allTutors;
        }

        // Manual pagination
        $page = request()->get('page', 1);
        $paginatedTutors = new \Illuminate\Pagination\LengthAwarePaginator(
            $sortedTutors->forPage($page, $perPage),
            $sortedTutors->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        // Enrich tutor data
        $paginatedTutors->each(function ($tutor) {
            $storedCountryCode = trim($tutor->country);
            $tutor->country_name = config("countries_assoc.countries.$storedCountryCode", 'Unknown');

            $tutor->language = json_decode($tutor->language, true) ?? [];
            $tutor->specialization = json_decode($tutor->specialization, true) ?? ['Not Specified'];

            if ($tutor->dob) {
                $dob = \Carbon\Carbon::parse($tutor->dob);
                $tutor->dob = $dob->format('d-m-Y');
                $tutor->age = $dob->age;
            } else {
                $tutor->age = null;
            }
        });

        // Load configs
        $subjectsTeach = collect(config('subjects.subjects'));
        $countries = collect(config('countries_assoc.countries'));
        $countriesPhone = collect(config('phonecountries.countries'));
        $countries_number_length = collect(config('countries_number_length.countries'));
        $countries_prefix = collect(config('countries_prefix.countries'));

        return view('newhome', [
            'blogs' => $blogs,
            'sliderTutors' => $sliderTutors,
            'tutors' => $paginatedTutors,
            'subjectsTeach' => $subjectsTeach,
            'totalTutorsCount' => $totalTutorsCount,
            'perPage' => $perPage,
            'countries' => $countries,
            'countriesPhone' => $countriesPhone,
            'countries_number_length' => $countries_number_length,
            'countries_prefix' => $countries_prefix,
            'allTutorsCount'=>$allTutorsCount
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
            'ids.*' => 'exists:tutors,id',
        ]);

        $tutorIds = $request->ids;

        // Loop through each tutor and delete associated user
        foreach ($tutorIds as $id) {
            $tutor = Tutor::find($id);

            if ($tutor) {
                // Delete the related user if exists
                if ($tutor->user_id) {
                    User::destroy($tutor->user_id);
                }

                // Delete the tutor
                $tutor->delete();
            }
        }

        return response()->json(['success' => 'Tutors and associated users deleted successfully.']);
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
        $query = Tutor::query();
        $perPage = 6;

        $this->applyPriceFilter($request, $query);
        $this->applyGenderFilter($request, $query);
        $this->applyCountryFilter($request, $query);
        $this->applySpecializationFilter($request, $query);
        $this->applySubjectSearch($request, $query);

        $tutors = $query->paginate($perPage);

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

        $tutorsArray = $tutors->map(function ($tutor) {
            $tutor->specialization = is_array($decoded = json_decode($tutor->specialization, true))
                ? implode(', ', array_map('trim', $decoded))
                : trim($tutor->specialization ?? 'Not Specified');

            $tutor->country_name = config("countries_assoc.countries.{$tutor->country}", 'Unknown');

            $languageData = json_decode($tutor->language, true);
            $tutor->languages = is_array($languageData) ? $languageData : [];

            if ($tutor->dob) {
                $dob = Carbon::parse($tutor->dob);
                $tutor->dob = $dob->format('d-m-Y');
                $tutor->age = $dob->age;
            } else {
                $tutor->dob = 'Unknown';
                $tutor->age = 'Unknown';
            }

            return $tutor->toArray();
        })->toArray();

        return response()->json([
            'tutors' => $tutorsArray,
            'totalTutorsCount' => (clone $query)->count(),
            'perPage' => $perPage,
            'pagination' => [
                'total' => $tutors->total(),
                'count' => $tutors->count(),
                'perPage' => $tutors->perPage(),
                'currentPage' => $tutors->currentPage(),
                'lastPage' => $tutors->lastPage(),
            ],
        ]);
    }

    private function applyPriceFilter(Request $request, $query)
    {
        if (!$request->has('price') || $request->price === 'all') return;

        $priceValue = trim($request->price);
        $query->whereRaw("CAST(REGEXP_REPLACE(price, '[^0-9]', '') AS UNSIGNED) IS NOT NULL");

        if (preg_match('/^(\d+)-(\d+)$/', $priceValue, $matches)) {
            $query->whereRaw("CAST(REGEXP_REPLACE(price, '[^0-9]', '') AS UNSIGNED) BETWEEN ? AND ?", [(int) $matches[1], (int) $matches[2]]);
        } elseif (preg_match('/(\d+)\+/', $priceValue, $matches)) {
            $query->whereRaw("CAST(REGEXP_REPLACE(price, '[^0-9]', '') AS UNSIGNED) >= ?", [(int) $matches[1]]);
        } elseif (is_numeric($priceValue)) {
            $query->whereRaw("CAST(REGEXP_REPLACE(price, '[^0-9]', '') AS UNSIGNED) = ?", [(int) $priceValue]);
        }
    }

    private function applyGenderFilter(Request $request, $query)
    {
        if ($request->has('gender') && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }
    }

    private function applyCountryFilter(Request $request, $query)
    {
        if ($request->has('country') && $request->country !== 'all') {
            $query->where('country', $request->country);
        }
    }

    private function applySpecializationFilter(Request $request, $query)
    {
        if ($request->has('specialization') && !empty($request->specialization)) {
            $specialization = $request->specialization;

            $query->where(function ($q) use ($specialization) {
                if (is_array($specialization)) {
                    foreach ($specialization as $spec) {
                        $q->orWhereJsonContains('specialization', $spec);
                    }
                } else {
                    $q->whereJsonContains('specialization', $specialization);
                }
            });
        }
    }

    private function applySubjectSearch(Request $request, $query)
    {
        $subjectSearch = trim($request->input('subjectsearch'));

        if ($subjectSearch !== '') {
            if (auth()->check() && auth()->user()->role === 'user') {
                DB::table('student')->where('user_id', auth()->id())->update([
                    'searchQuery' => $subjectSearch,
                    'updated_at' => now(),
                ]);
            }
        } elseif (auth()->check() && auth()->user()->role === 'user') {
            $student = DB::table('student')->where('user_id', auth()->id())->first();
            if ($student && $student->searchQuery) {
                $subjectSearch = strtolower($student->searchQuery);
            }
        }

        if (!empty($subjectSearch)) {
            $query->where(function ($q) use ($subjectSearch) {
                $q->whereRaw("LOWER(specialization) LIKE ?", ['%' . strtolower($subjectSearch) . '%']);
            });
        }
    }

    public function fetchStudentData(Request $request)
    {
        $query = Student::query();
        $perPage = 6;

        // Apply gender filter if set and not "all"
        if ($request->filled('gender') && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        // Apply country filter if set and not "all"
        if ($request->filled('country') && $request->country !== 'all') {
            $query->where('country', $request->country);
        }

        $students = $query->paginate($perPage);

        if ($students->isEmpty()) {
            return response()->json([
                'students' => [],
                'totalStudentsCount' => 0,
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

        // Transform students
        $studentsArray = $students->map(function ($student) {
            $student->country_name = config("countries_assoc.countries.{$student->country}", 'Unknown');
            return $student->toArray();
        })->toArray();

        return response()->json([
            'students' => $studentsArray,
            'totalStudentsCount' => $students->total(),
            'perPage' => $perPage,
            'pagination' => [
                'total' => $students->total(),
                'count' => $students->count(),
                'perPage' => $students->perPage(),
                'currentPage' => $students->currentPage(),
                'lastPage' => $students->lastPage(),
            ],
        ]);
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
    private function getSvgImageTag($name, $width = 16, $height = 16)
    {
        $path = public_path("icons/{$name}.svg");

        if (!file_exists($path)) {
            return '';
        }

        $svg = file_get_contents($path);
        $base64 = base64_encode($svg);

        return "<img src='data:image/svg+xml;base64,{$base64}' width='{$width}' height='{$height}' alt='{$name}' style='vertical-align:middle;' />";
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
        // $tutor->teaching = serialize($request->input('teaching'));
        $tutor->teaching = json_encode($request->input('teaching'));
        $tutor->phone = $request->input('phone');
        $tutor->video = 'storage/' . $videoPath; // Save video path in database
        $tutor->specialization = json_encode($request->input('specialization'));
        $tutor->password = $hashedPassword;
        $tutor->language = json_encode($language);
        $tutor->edu_teaching = json_encode($request->input('edu_teaching'));
        $tutor->availability_status = $request->input('availability_status');
        $tutor->student_id = $studentExists ? 2 : null;
        $tutor->status = 'inactive';
        $tutor->session_id = session()->getId();
        // Upload profile image
        $imagePath = $request->file('profileImage')->store('uploads', 'public');
        $tutor->profileImage = $imagePath;
        $facebookImg = "<img src='https://edexceledu.com/icons/facebook.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";
        $instagramImg = "<img src='https://edexceledu.com/icons/instagram.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";
        $linkedinImg  = "<img src='https://edexceledu.com/icons/linkedin.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";
        $youtubeImg   = "<img src='https://edexceledu.com/icons/youtube.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";


        // If no user, create new one
        if (!$user) {

            $user = new User();
            $user->name = $request->input('f_name') . ' ' . $request->input('l_name');
            $user->email = $request->input('email');
            $user->password = $hashedPassword;
            $user->role = 'tutor';
            $user->save();
        }

        // Always assign user_id to tutor (whether user existed before or created now)
        $tutor->user_id = $user->id;
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
                                                       Your application will be reviewed by an admin and activated upon approval If you need any assistance, contact us at <a href='mailto:info@edexceledu.com' style='color: #4CAF50; text-decoration: none;'>info@edexceledu.com</a>.
                                                    </p>

                                                    <p style='font-size: 16px; margin: 10px 0;'>Best regards,</p>
                                                    <p style='font-size: 16px; font-weight: bold; margin: 0;color:#43b979;'>The Edexcel Team</p>
                                                </td>
                                            </tr>

                                            <!-- Footer -->
                                            <tr style='margin-bottom:10px;display:flex;'>
                                                                    <td align='left' style='color:#43b979; font-size:11px;margin-left:5px;width:50%;'>&copy; 2025 Edexcel Academy. All rights reserved.</td>
                                                                    <td align='right' style='display:flex;margin-left:25%'>
                                                                        <a href='https://www.facebook.com/EdexcelAcademyOfficial/' target='_blank' style='margin-right:5px;'>{$facebookImg}</a>
                                                                        <a href='https://www.instagram.com/edexcel.official?igsh=bmNvcXpkOTUzN2J1&utm_source=qr' target='_blank' style='margin-right:5px;'>{$instagramImg}</a>
                                                                        <a href='https://www.linkedin.com/company/edexcel-academy/' target='_blank' style='margin-right:5px;'>{$linkedinImg}</a>
                                                                        <a href='https://youtube.com/@edexcelonline01?si=EuQwX0tL3zk4J-2p' target='_blank'>{$youtubeImg}</a>
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
        $student = Student::all();

        $storedCountry = trim($tutor->country);
        $tutor->country_name = config("countries_assoc.countries.$storedCountry", 'Unknown');

        $tutor->language = json_decode($tutor->language, true) ?? [];
        $tutor->specialization = json_decode($tutor->specialization, true) ?? ['Not Specified'];
        $tutor->teaching = json_decode($tutor->teaching, true) ?? ['Not Specified'];

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
                'student' => $student,
                'tutor' => $tutor,
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
    public function updateStatus(Request $request, $id)
    {
        $tutor = Tutor::findOrFail($id);
        $oldStatus = $tutor->status;
        $newStatus = $request->input('status');

        if ($oldStatus !== $newStatus) {
            $tutor->status = $newStatus;
            $tutor->save();
            $facebookImg = "<img src='https://edexceledu.com/icons/facebook.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";
            $instagramImg = "<img src='https://edexceledu.com/icons/instagram.jpeg' alt='Instagram' width='20' height='20' style='vertical-align:middle'>";
            $linkedinImg  = "<img src='https://edexceledu.com/icons/linkedin.jpeg' alt='LinkedIn' width='20' height='20' style='vertical-align:middle'>";
            $youtubeImg   = "<img src='https://edexceledu.com/icons/youtube.jpeg' alt='Youtube' width='20' height='20' style='vertical-align:middle'>";
            $subjectStudent = "Your Tutor Profile Status Has Been Updated";

            $bodyStudent = "
            <div style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
                <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                    <tr>
                        <td align='center'>
                            <table style='max-width: 600px; width: 100%; border: 1px solid #ddd; border-radius: 8px; background-color: #fff;' cellpadding='0' cellspacing='0'>
                                <!-- Header -->
                                <tr>
                                    <td style='background-color: #f4f4f4; padding: 15px; text-align: center; font-size: 20px; font-weight: bold; color: #4CAF50; border-top-left-radius: 8px; border-top-right-radius: 8px;'>
                                        Status Updated
                                    </td>
                                </tr>
                                
                                <!-- Body -->
                                <tr>
                                    <td style='padding: 20px; text-align: left;'>
                                        <p style='font-size: 16px; margin: 0;'>Dear {$tutor->f_name} {$tutor->l_name},</p>
            
                                        <p style='font-size: 16px; margin: 10px 0;'>
                                            We wanted to inform you that the status of your tutor profile on <strong>Edexcel Academy</strong> has been updated by our administration team.
                                        </p>
            
                                        <p style='font-size: 16px; margin: 10px 0;'>
                                            <strong>New Status:</strong> <span style='color: #4CAF50;'>" . ucfirst($tutor->status) . "</span>
                                        </p>
            
                                        <p style='font-size: 16px; margin: 10px 0;'>
                                            If you have any questions or concerns regarding this change, feel free to reach out to us at 
                                            <a href='mailto:info@edexceledu.com' style='color: #4CAF50; text-decoration: none;'>info@edexceledu.com</a>.
                                        </p>
            
                                        <p style='font-size: 16px; margin: 10px 0;'>Thank you for being part of Edexcel Academy.</p>
                                        <p style='font-size: 16px; font-weight: bold; margin: 0; color:#43b979;'>The Edexcel Team</p>
                                    </td>
                                </tr>
            
                                <!-- Footer -->
                                <tr style='margin-bottom:10px;display:flex;'>
                                    <td align='left' style='color:#43b979; font-size:11px;margin-left:5px;width:50%;'>
                                        &copy; 2025 Edexcel Academy. All rights reserved.
                                    </td>
                                    <td align='right' style='display:flex;margin-left:25%'>
                                        <a href='https://www.facebook.com/EdexcelAcademyOfficial/' target='_blank' style='margin-right:5px;'>{$facebookImg}</a>
                                        <a href='https://www.instagram.com/edexcel.official' target='_blank' style='margin-right:5px;'>{$instagramImg}</a>
                                        <a href='https://www.linkedin.com/company/edexcel-academy/' target='_blank' style='margin-right:5px;'>{$linkedinImg}</a>
                                        <a href='https://youtube.com/@edexcelonline01' target='_blank'>{$youtubeImg}</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>";
        }
        $this->sendEmail($tutor->email, $subjectStudent, $bodyStudent);
        return redirect()->back()->with('success', 'Tutor status updated successfully.');
    }
    public function allTutors(Request $request)
    {
        $tutors = Tutor::all();
        $countries = collect(config('countries_assoc.countries'));
        $query = Tutor::query();

        if ($request->has('countryTeacher') && $request->countryTeacher !== null) {
            $query->where('country', $request->countryTeacher); // Adjust if your column name is different
        }

        $tutor = $query->get();
        return view('teacher-list', compact('tutors', 'tutor', 'countries'));
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
    private function safeUnserialize($data)
    {
        if (!is_string($data)) return [];

        $unserialized = @unserialize($data);
        return $unserialized !== false || $data === 'b:0;' ? $unserialized : [];
    }
    public function show($id)
    {
        $tutor = Tutor::findOrFail($id);
        $qualification = SchoolClass::where('id', $tutor->qualification)->value('name') ?? 'Not specified';

        $tutor->teaching = $this->safeUnserialize($tutor->teaching);
        $tutor->curriculum = $this->safeUnserialize($tutor->curriculum);

        $storedLanguageCode = $tutor->language;

        $languages = collect(json_decode($storedLanguageCode, true))
            ->pluck('language')
            ->toArray();

        $languageNames = array_map(function ($code) {
            return config("languages.languages.$code", 'Unknown');
        }, $languages);

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

    // Use safe unserialize
    $tutor->teaching = $this->safeUnserialize($tutor->teaching);
    $tutor->curriculum = $this->safeUnserialize($tutor->curriculum);

    // Language decoding
    $storedLanguageCode = $tutor->language;
    $languages = collect(json_decode($storedLanguageCode, true))
        ->pluck('language')
        ->toArray();

    $languageNames = array_map(function ($code) {
        return config("languages.languages.$code", 'Unknown');
    }, $languages);

    // Country full name
    $storedCountryCode = $tutor->country;
    $country = config("countries_assoc.countries.$storedCountryCode", 'Unknown');

    // Country configs
    $countriesPhone = collect(config('phonecountries.countries'));
    $countries_number_length = collect(config('countries_number_length.countries'));
    $countries_prefix = collect(config('countries_prefix.countries'));
    $countries = collect(config('countries_assoc.countries'));

    return view('edit-teacher', compact([
        'tutor', 'country', 'countriesPhone', 'countries',
        'countries_number_length', 'countries_prefix',
        'languageNames', 'schoolClasses', 'qualification'
    ]));
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
            'edu_teaching' => 'nullable|array',
            'edu_teaching.*' => 'string|max:255',
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
        $tutor->edu_teaching = json_encode($request->input('edu_teaching'));
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
