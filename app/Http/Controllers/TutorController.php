<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Country;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Tutor; // Add the Tutor model namespace

class TutorController extends Controller
{
    //
    public function index(Request $request)
        {

            $query = Tutor::query();           

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

            return view('newhome', [
                'tutors' => $tutors,
                'totalTutorsCount' => $totalTutorsCount,
                'perPage' => $perPage,
                'countries' => $countries,
            ]);
        }
        public function tutorDetail (){
            return view('teacher-detail');
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
$perPage = 10;

// Apply filters
// Filter tutors by selected country if a specific country is selected
if ($request->has('location') && $request->location !== "all") {
    $query->where('location', $request->location);
}

// Filter tutors by search query for city
if ($request->has('citysearch') && $request->citysearch !== "") {
    $query->where('city', 'LIKE', '%' . $request->citysearch . '%');
}

// Filter tutors by search query for subject
if ($request->has('subjectsearch') && $request->filled('subjectsearch')) {
    $subject = $request->subjectsearch;

    // Filter tutors who teach the specified subject
    $query->where('teaching', 'LIKE', '%"'.$subject.'"%');
}
// Paginate the filtered tutors
$tutors = $query->paginate($perPage);

// Calculate age for each tutor
foreach ($tutors as $tutor) {
    if ($tutor->dob) {
        $tutor->age = Carbon::parse($tutor->dob)->age;
    } else {
        $tutor->age = null; // or any default value
    }
}

// Fetch the total count of tutors after applying filters
$totalTutorsCount = $query->count();

// Manually serialize the paginated data
$serializedData = [
    'tutors' => $tutors->items(), // Get the items from the paginator
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
// dd($request);
// Return the serialized data as JSON response
return response()->json($serializedData);

}


    public function store(Request $request)
    {
        // Your store method logic here
    }
    public function create(Request $request)
{
    // Validate form data
    $rules = [
        'f_name' => 'required|string|max:255',
        'l_name' => 'required|string|max:255',
        'qualification' => 'required|string|max:255',
        'profileImage' => 'required|image|mimes:jpeg,png,jpg|max:2048', // max:2048 is for maximum 2MB file size, adjust as needed
        'email' => 'required|string|email|max:255|unique:tutors,email',
        'experience' => 'required|string|max:255',
    ];

    $validator = Validator::make($request->all(), $rules);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()
                         ->withErrors($validator)
                         ->withInput();
    }

    $tutor = new Tutor();
    $tutor->f_name = $request->input('f_name');
    $tutor->l_name = $request->input('l_name');
    $tutor->city = $request->input('city');
    $tutor->email = $request->input('email');
    $tutor->dob = $request->input('dob');
    $tutor->qualification = $request->input('qualification');
    $tutor->gender = $request->input('gender');
    $tutor->location = $request->input('location');
    $tutor->experience = $request->input('experience');
    $tutor->curriculum = serialize($request->input('curriculum'));
    $tutor->availability = $request->input('availability');
    $tutor->teaching = serialize($request->input('teaching'));
    $tutor->phone = $request->input('phone');

    // Upload profile image
    $imagePath = $request->file('profileImage')->store('uploads', 'public');
    $tutor->profileImage = $imagePath;

    // Save the Tutor instance to the database
    $tutor->save();

    // Prepare and send email to the student
    $toStudent = $tutor->email;
    $subjectStudent = "Welcome to Edexcel! Your Learning Journey Starts Now!";
    $messageStudent = "
    <html>
    <head>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
            }
            .email-container {
                background-image: url('https://edexceledu.com/images/logo.png');
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                padding: 20px;
                color: #333;
                height: 100%;
            }
            .content {
                background-color: rgba(255, 255, 255, 0.8); /* Optional for readability */
                padding: 20px;
                border-radius: 10px;
                max-width: 600px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div class='email-container'>
            <div class='content'>
                <p>Dear {$tutor->f_name} {$tutor->l_name},</p>

                <p>Welcome to Edexcel! 🎉 We’re excited to support you on your educational journey with top-notch resources and interactive learning.</p>

                <p>Explore our courses, connect with expert educators, and engage with fellow learners. If you need any assistance, contact us at <a href='mailto:info@edexceledu.com'>info@edexceledu.com</a> or +971566428066.</p>

                <p>We’re here to help you succeed!</p>

                <p>Best regards,<br>
                The Edexcel Team</p>
            </div>
        </div>
    </body>
    </html>
    ";

    Mail::send([], [], function ($message) use ($toStudent, $subjectStudent, $messageStudent) {
        $message->to($toStudent)
                ->subject($subjectStudent)
                ->setBody($messageStudent, 'text/html'); // Set the email body with HTML content
    });

    // Prepare and send email to the admin
    $toAdmin = 'info@edexceledu.com';
    $subjectAdmin = "Edexcel Notification";
    $messageAdmin = "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                color: #333;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <p>Dear Babar,</p>

        <p>I hope this email finds you well.</p>

        <p>I am pleased to inform you that a new teacher, {$tutor->f_name} {$tutor->l_name}, has successfully enrolled through our website. Below are the details of the new enrollment:</p>

        <ul>
            <li><strong>Full Name:</strong> {$tutor->f_name} {$tutor->l_name}</li>
            <li><strong>Email Address:</strong> {$tutor->email}</li>
            <li><strong>Contact Number:</strong> {$tutor->phone}</li>
            <li><strong>Location:</strong> {$tutor->location}</li>
        </ul>

        <p>Please ensure that {$tutor->f_name} {$tutor->l_name} is added to our records and receives all necessary welcome materials and instructions. If any further information is needed, feel free to contact me.</p>

        <p>Thank you for your prompt attention to this new enrollment.</p>

        <p>Best regards,<br>
        The Edexcel Team</p>
    </body>
    </html>
    ";

    Mail::send([], [], function ($message) use ($toAdmin, $subjectAdmin, $messageAdmin) {
        $message->to($toAdmin)
                ->subject($subjectAdmin)
                ->setBody($messageAdmin, 'text/html'); // Set the email body with HTML content
    });

    // Optionally, you can redirect the user or return a response
    return redirect()->route('newhome')->with('success', 'Tutor created successfully.');
}
    public function hiretutor(Request $request)
    {
        return redirect('/hire-tutor');
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
                // Server settings
                // $mail->SMTPDebug = 2; 
                // Enable verbose debug output
                $mail->isSMTP();
                $mail->Host = 'smtp.hostinger.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'info@edexceledu.com';
                $mail->Password = 'Babar123!@#';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('info@edexceledu.com', 'Edexcel'); // Use direct values here
                $mail->addAddress($to);

                // Content
                $mail->isHTML(false); // Set email format to plain text
                $mail->Subject = $subject;
                $mail->Body = $body;

                $mail->send();
                // echo "Email has been sent to $to";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }

    public function signup() {
        $countriesPhone = collect(config('phonecountries.countries'));
        $countries_number_length = collect(config('countries_number_length.countries'));
        $countries_prefix = collect(config('countries_prefix.countries'));
        $countries = collect(config('countries_assoc.countries'));
        return view('tutor-signup', compact(['countriesPhone','countries', 'countries_number_length', 'countries_prefix']));
    }

    public function edit($id) {
        $tutor = Tutor::findOrFail($id);
        $countries = collect(config('phonecountries.countries'));
        return view('edit-teacher', compact(['tutor', 'countries']));
    }

    public function update(Request $request, $id) {
        // Validate form data
        $rules = [
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            // 'profileImage' => 'required|image|mimes:jpeg,png,jpg|max:2048', // max:2048 is for maximum 2MB file size, adjust as needed
            'email' => 'required|string|email|max:255'
        ];
        // dd($request);
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }
        $tutor = Tutor::findOrFail($id);
        $tutor->f_name = $request->input('f_name');
        $tutor->l_name = $request->input('l_name');
        $tutor->city = $request->input('city');
        $tutor->email = $request->input('email');
        $tutor->dob = $request->input('dob');
        $tutor->qualification = $request->input('qualification');
        $tutor->gender = $request->input('gender');
        $tutor->location = $request->input('location');
        $tutor->experience = $request->input('experience');
        $tutor->availability = $request->input('availability');
        $tutor->phone = $request->input('phone');
        $tutor->whatsapp = $request->input('whatsapp');

        $tutor->save();

        return redirect('home')->with('message', 'Teacher updated successfully');
    }

    public function destroy($id) {
        $tutor = Tutor::find($id);
        $tutor->delete();
        return back()->with('message', 'Teacher deleted successfully');
    }
}


