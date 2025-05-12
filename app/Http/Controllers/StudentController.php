<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Tutor;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use App\Notifications\InquirySuccessNotification;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentController extends Controller
{
    public function index()
    {
        $subjects = collect(config('subjects.subjects'));
        $schoolClasses = SchoolClass::all();
        $countries = collect(config('countries_assoc.countries'));
        $countriesPhone = collect(config('phonecountries.countries'));
        $countries_number_length = collect(config('countries_number_length.countries'));
        $countries_prefix = collect(config('countries_prefix.countries'));
        return view('hire-tutor', compact('countriesPhone', 'subjects', 'countries', 'schoolClasses', 'countries_prefix', 'countries_number_length'));
    }
    public function allStudents(Request $request)
    {
        $students = Student::all();
        $countries = collect(config('countries_assoc.countries'));
        return view('student-list', compact('students', 'countries'));
    }
    public function destroystudentBulk(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:student,id', // Assuming 'tutors' is your table name
        ]);

        // Delete the selected tutors
        Student::destroy($request->ids);

        return response()->json(['success' => 'Students deleted successfully.']);
    }
    public function destroyinquiryBulk(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:inquiries,id', // Assuming 'tutors' is your table name
        ]);

        // Delete the selected tutors
        Inquiry::destroy($request->ids);

        return response()->json(['success' => 'Inquires deleted successfully.']);
    }
    public function getCities(Request $request)
    {
        $countryCode = $request->query('country');
        $cities = config('cities.cities')[$countryCode] ?? [];
        return response()->json($cities);
        // dd($countryCode, $cities);
    }
    public function hiring()
    {
        return view('hired-tutor');
    }
    public function FAQ()
    {
        return view('faq');
    }
    public function privacyPolicy()
    {
        return view('privacy');
    }
    public function termsCondition()
    {
        return view('terms-condition');
    }
    public function qrcode()
    {
        return view('qr-code');
    }
    public function showStudentsList()
    {

        $students = Student::all();
        return view('student-list', compact('students'));
    }
    public function inquiriesList()
    {

        $inquiries = Inquiry::all();
        return view('inquiry-list', compact('inquiries'));
    }
    public function indexClass()
    {
        $schoolClasses = SchoolClass::all();
        return view('hire-tutor', compact('schoolClasses'));
    }
    public function getSubjects($schoolClassId)
    {
        $subjects = SchoolClass::find($schoolClassId)->subjects;
        return response()->json($subjects);
    }
    public function studentsPDF()
    {
        $data = Student::all();
        // $dompdf = new Dompdf();

        // // Load HTML content into Dompdf
        // $html = view('student-list', ['data' => $data])->render(); // Pass $data as an associative array
        // $dompdf->loadHtml($html);

        // // (Optional) Set paper size and orientation
        // $options = new Options();
        // $options->set('isHtml5ParserEnabled', true);
        // $dompdf->setOptions($options);
        // $dompdf->setPaper('A4', 'portrait');

        // // Render the PDF
        // $dompdf->render();
        // return $dompdf->stream('students.pdf'); // Change the filename if needed
        return view('student-list', compact('data'));
    }


    public function create(Request $request)
    {

        $rules = [
            'email' => 'required|string|email|max:255|unique:student,email',
            'password' => 'required|min:8',
            'phone' => 'nullable|string|max:20',// checks c_password too
            'availability_status' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'subject' => 'required|array',
            'subject.*' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];


        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $student = new Student();
        $student->availability_status = $request->input('subjects');
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $user = new User();
        $user->name = $student->name;
        $user->email = $student->email;
        $user->password = Hash::make($request->input('password'));
        $user->role = 'user';
        $user->save();
        $student->country = $request->input('country');
        $student->city = $request->input('city');
        $student->subject = implode(',', $request->input('subject'));
        $student->grade = $request->input('grade');
        $student->password = Hash::make($request->input('password'));
        $student->description = $request->input('description');
        $student->user_id = $user->id;
        $imagePath = $request->file('image')->store('students/images', 'public');
        $student->profileImage = $imagePath;
        $student->session_id = session()->getId();
        $student->save();



        $toStudent = $student->email;
        $subjectStudent = "Welcome to Edexcel Your Learning Journey Starts Now!";
        $messageStudent = "Dear " . $student->name . "\r\n" .
            "Welcome to Edexcel! 🎉 We’re excited to support you on your educational journey with top-notch resources and interactive learning.\r\n" .
            "Explore our courses, connect with expert educators, and engage with fellow learners. If you need any assistance, contact us at info@edexceledu.com.\r\n" .
            "We’re here to help you succeed!\r\n\r\n" .
            "Best regards,\r\n" .
            "The Edexcel Team";

        $this->sendEmail($toStudent, $subjectStudent, $messageStudent);

        $toAdmin = 'info@edexceledu.com';
        $subjectAdmin = "Edexcel Notification";
        $messageAdmin = "Subject: New Student Enrollment Notification

        Dear Babar,

        I hope this email finds you well.

        I am pleased to inform you that a new student, {$student->name}, has successfully enrolled through our website. Below are the details of the new enrollment:

        - *Full Name:* {$student->name}
        - *Email Address:* {$student->email}
        - *Contact Number:* {$student->phone}
        - *Program/Course Enrolled:* {$student->subjects}

        Please ensure that {$student->name} is added to our records and receives all necessary welcome materials and instructions. If any further information is needed, feel free to contact me.

        Thank you for your prompt attention to this new enrollment.

        Best regards,
        The Edexcel Team";



        $this->sendEmail($student->email, $subjectAdmin, $messageAdmin);


        if ($user->role === 'user') {
            Auth::login($user);
            return redirect()->route('student_dashboard', ['id' => $student->id])
                ->with('success', 'Tutor created successfully and logged in.');
        }

        // Redirect to the "hire us" page
        return redirect()->route('newhome')->with(compact('user'));

        // Optionally, you can redirect the user or return a response
        // return redirect()->route('newhome')->with('success', 'Student created successfully.');
    }
    public function student_dashboard(Request $request, $id)
    {
        $user = Auth::user();

        if ($user && $user->role === 'user') {
            $student = Student::find($id);

            if (!$student) {
                return redirect()->route('basicsignup')->with('error', 'Student not found.');
            }
            $query = Tutor::where('status', 'active');
            $sliderTutors = Tutor::where('status', 'active')->take(6)->get();
            $perPage = 5; // Define the number of tutors per page
            $blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();

            // Paginate the results
            $tutors = $query->paginate($perPage);

            $totalTutorsCount = Tutor::count();
            $storedCountry = trim($student->country);
            $student->country = config("countries_assoc.countries.$storedCountry", 'Unknown');
            $teacher = Tutor::all();

           $tutorSubjects = [];

foreach ($teacher as $tutor) {
    $json = $tutor->edu_teaching; // stored as JSON array

    if ($json) {
        $subjects = json_decode($json, true); // now array like ['Accounting', 'Aerospace Engineering']

        if (is_array($subjects)) {
            // Clean each subject: trim + lowercase
            $cleaned = array_map(fn($s) => strtolower(trim($s)), $subjects);
            $tutorSubjects[$tutor->id] = $cleaned;
        } else {
            $tutorSubjects[$tutor->id] = [];
        }
    } else {
        $tutorSubjects[$tutor->id] = [];
    }
}

               
            $matchedTutors = $teacher->filter(function ($tutor) use ($student, $tutorSubjects) {
                $studentSubjects = array_map(
                    fn($s) => strtolower(trim($s)),
                    explode(',', $student->subject)
                );

                // Use already processed and cleaned subjects from earlier
                $tutorSubjectsList = $tutorSubjects[$tutor->id] ?? [];

                $tutorAvailability = strtolower(trim($tutor->availability_status));
                $studentAvailability = strtolower(trim($student->availability_status));

                $hasCommonSubjects = !empty(array_intersect($studentSubjects, $tutorSubjectsList));

                return $hasCommonSubjects && $tutorAvailability === $studentAvailability;

            });



            $matchedTutors->each(function ($tutor) {
                $storedCountryCode = trim($tutor->country);
                $tutor->country_name = config("countries_assoc.countries.$storedCountryCode", 'Unknown');

                $language = json_decode($tutor->language, true);
                $tutor->language = is_array($language) ? $language : [];

                // This will dump the teaching property for each tutor

                $specialization = json_decode($tutor->specialization, true);
                $tutor->specialization = is_array($specialization) && !empty($specialization)
                    ? $specialization : ['Not Specified'];

                if ($tutor->dob) {
                    $dob = Carbon::parse($tutor->dob);
                    $tutor->dob = $dob->format('d-m-Y');
                    $tutor->age = $dob->age;
                } else {
                    $tutor->age = null;
                }
            });
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $matchedTutorsPerPage = 5;

            $paginatedMatchedTutors = new LengthAwarePaginator(
                $matchedTutors->slice(($currentPage - 1) * $matchedTutorsPerPage, $matchedTutorsPerPage)->values(),
                $matchedTutors->count(),
                $matchedTutorsPerPage,
                $currentPage,
                ['path' => request()->url(), 'query' => request()->query()]
            );

            $subjectsTeach = collect(config('subjects.subjects'));
            $countries = collect(config('countries_assoc.countries'));
            $countriesPhone = collect(config('phonecountries.countries'));
            $countries_number_length = collect(config('countries_number_length.countries'));
            $countries_prefix = collect(config('countries_prefix.countries'));
            return view('hired-tutor', [
                'student' => $student,
                'matchedTutors' => $matchedTutors,
                'paginatedMatchedTutors' => $paginatedMatchedTutors,
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
            ])->with('success', 'Welcome to your dashboard.');
        }

        return redirect()->route('newhome')->with('error', 'Unauthorized access.');
    }


    public function newcreate(Request $request)
    {
        $rules = [
            'email' => 'required|string|email|max:255|unique:student,email',
            'password' => 'required|min:8',
            'c_password' => 'required|min:8|same:password',
        ];
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->input('password'));
        $user->role = 'user';
        $user->save();
        return redirect()->route('newhome')->with('success', 'Student created successfully.');
    }
    public function inquiry(Request $request)
    {
        $rules = [
            'email' => 'required|string|email|max:255|unique:inquiries,email',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $inquiry = new Inquiry();
        $inquiry->description = $request->input('subjects');
        $inquiry->name = $request->input('fname');
        $inquiry->email = $request->input('email');
        $inquiry->phone = $request->input('phone');
        $inquiry->save();

        // Send email to the student
        $toStudent = $inquiry->email;
        $subjectStudent = "Welcome to Edexcel Academy!";
        $messageStudent = "Dear " . $inquiry->name . "\r\n" .
            "Welcome to Edexcel Academy! 🎉 We’re excited to to got your inquiry soon you will notified.\r\n" .
            "Explore our courses, connect with expert educators, and engage with fellow learners. If you need any assistance, contact us at info@edexceledu.com\r\n" .
            "We’re here to help you succeed!\r\n\r\n" .
            "Best regards,\r\n" .
            "The Edexcel Academy Team";

        $this->sendEmail($toStudent, $subjectStudent, $messageStudent);

        // Send email to the admin
        $toAdmin = 'info@edexceledu.com';
        $subjectAdmin = "Edexcel Notification";
        $messageAdmin = "Inquiry Added\n\n" .
            "Dear Admin,\n\n" .
            "A new inquiry has been added:\n\n" .
            "- Name: {$inquiry->name}\n" .
            "- Email: {$inquiry->email}\n" .
            "- Phone: {$inquiry->phone}\n\n" .
            "Best regards,\n" .
            "The Edexcel Academy Team";

        $this->sendEmail($toAdmin, $subjectAdmin, $messageAdmin);

        // Send notification to the admin
        $admin = User::where('email', 'ceo@edexceledu.com')->first(); // Admin user
        $admin->notify(new InquirySuccessNotification($inquiry)); // Notify the admin

        return redirect()->route('newhome')->with('success', 'Inquiry created successfully.');
    }
    function sendEmail($to, $subject, $body)
    {
        $pass = env('email_pass');
        $name = env('email_name');
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = $name;
            $mail->Password = $pass;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $mail->setFrom($name, 'Edexcel'); // Use direct values here
            $mail->addAddress($to);

            // Content
            $mail->isHTML(true); // Set email format to plain text
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
            // echo "Email has been sent to $to";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'email' => 'required|string|email|max:255',
            'class_start_time' => 'required|date_format:H:i',
            'class_end_time' => 'required|date_format:H:i',
        ];

        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $student = Student::findOrFail($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        // $student->class_start_time = $request->input('class_start_time');
        // $student->class_end_time = $request->input('class_end_time');

        // Convert the input time from 24-hour format to 12-hour format with AM/PM
        $classStartTime = date("h:i A", strtotime($request->input('class_start_time')));
        $classEndTime = date("h:i A", strtotime($request->input('class_end_time')));

        // Store the times in 12-hour format with AM/PM
        $student->class_start_time = $classStartTime;
        $student->class_end_time = $classEndTime;

        $student->whatsapp_number = $request->input('whatsapp_number');
        $student->country = $request->input('country');
        $student->city = $request->input('city');
        $student->subject = $request->input('subject');
        $student->c_email = $request->input('email');
        $student->password = $request->input('password');
        $student->c_password = $request->input('password');

        // Save the student instance to the database
        $student->save();

        return redirect('home')->with('message', 'Student updated successfully');
    }

    public function destroy($id)
    {
        // Find the student by ID
        $student = Student::find($id);

        // Check if the student exists
        if ($student) {
            $userId = $student->user_id;

            // Delete the student
            $student->delete();

            User::destroy($userId);

            return redirect()->route('all.students')->with('success', 'Student and associated user deleted successfully.');
        }

        // If student not found, return with an error message
        return redirect()->route('all.students')->with('error', 'Student not found');
    }

}
