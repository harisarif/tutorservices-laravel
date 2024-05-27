<?php

namespace App\Http\Controllers;
use App\Models\Country;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use PHPMailer\PHPMailer\PHPMailer;
use App\Models\Tutor; // Add the Tutor model namespace

class TutorController extends Controller
{
    //
    public function index(Request $request)
        {

            $query = Tutor::query();           

            $perPage = 10; // Define the number of tutors per page

            // Paginate the results
            $tutors = $query->paginate($perPage);

            // Fetch the total count of tutors (for all countries)
            $totalTutorsCount = Tutor::count();

            return view('newhome', [
                'tutors' => $tutors,
                'totalTutorsCount' => $totalTutorsCount,
                'perPage' => $perPage,
            ]);
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

// Return the serialized data as JSON response
return response()->json($serializedData);

}


    public function store(Request $request)
    {
        // Your store method logic here
    }
    public function create(Request $request){
        // dd($request);
        // Validate form data
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'profileImage' => 'required|image|mimes:jpeg,png,jpg|max:2048', // max:2048 is for maximum 2MB file size, adjust as needed
        ]);
        // dd($request);
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
        $tutor->whatsapp = $request->input('whatsapp');

        // Upload profile image
        $imagePath = $request->file('profileImage')->store('uploads', 'public');
        $tutor->profileImage = $imagePath;

        // Save the Tutor instance to the database
        $tutor->save();
        $toStudent = $tutor->email;
        $subjectStudent = "Welcome to Edexcel – Your Learning Journey Starts Now!";
        $messageStudent = "Dear " . $tutor->full_name = $tutor->f_name . ' ' . $tutor->l_name . "\r\n" .
        "Welcome to Edexcel! 🎉 We’re excited to support you on your educational journey with top-notch resources and interactive learning.\r\n" .
        "Explore our courses, connect with expert educators, and engage with fellow learners. If you need any assistance, contact us at ceo@edexceledu.com or +971566428066.\r\n" .
        "We’re here to help you succeed!\r\n\r\n" .
        "Best regards,\r\n" .
        "The Edexcel Team";

        $this->sendEmail($toStudent, $subjectStudent, $messageStudent);

        $toAdmin = 'ceo@edexceledu.com';
        $subjectAdmin = "Edexcel Notification";
        $messageAdmin = "A new teacher added with name " . $tutor->full_name = $tutor->f_name . ' ' . $tutor->l_name . "\r\n";

    $this->sendEmail($toAdmin, $subjectAdmin, $messageAdmin);
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
                $mail->SMTPDebug = 2; // Enable verbose debug output
                $mail->isSMTP();
                $mail->Host = 'smtp.hostinger.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ceo@edexceledu.com';
                $mail->Password = 'Babar123!@#';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('ceo@edexceledu.com', 'Edexcel'); // Use direct values here
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
}