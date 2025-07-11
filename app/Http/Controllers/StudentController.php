<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tutor;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use App\Models\Inquiry;
use App\Models\EdexcelComplaint;
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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Notifications\TutorRequestNotification;

class StudentController extends Controller
{
    public function LoginPage() {
        return view('login-2');
    }
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
        $students = Student::all(); // This is a collection
        $countries = config('countries_assoc.countries'); // Full country list

        return view('student-list', compact('students', 'countries'));
    }
    public function inquirydestroy($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();

        return redirect()->back()->with('success', 'Inquiry deleted successfully.');
    }

    public function destroystudentBulk(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:student,id', // Adjust table name if needed
        ]);

        $studentIds = $request->ids;

        foreach ($studentIds as $id) {
            $student = Student::find($id);

            if ($student) {
                // Delete the related user if it exists
                if ($student->user_id) {
                    User::destroy($student->user_id);
                }

                // Delete the student
                $student->delete();
            }
        }

        return response()->json(['success' => 'Students and associated users deleted successfully.']);
    }


    public function destroyinquiryBulk(Request $request)
    {
        $ids = $request->input('ids'); // expecting an array of IDs

        if (!$ids || !is_array($ids)) {
            return response()->json(['message' => 'No IDs provided'], 400);
        }

        EdexcelComplaint::whereIn('id', $ids)->delete();

        return response()->json(['message' => 'Selected inquiries deleted successfully']);
    }
    public function cities(Request $request)
    {
        $countryCode = $request->query('country');
        $cities = config('cities.cities')[$countryCode] ?? [];
        return response()->json($cities);
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
        $countries = config('countries_assoc.countries');
        return view('student-list', compact('students', 'countries'));
    }

    public function inquiriesList()
    {

        $inquires = EdexcelComplaint::all();
        return view('inquiry-list', compact('inquires'));
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
        return view('student-list', compact('data'));
    }
    public function create(Request $request)
    { 

        $rules = [
            'email' => 'required|string|email|max:255|unique:student,email',
            'password' => 'required|min:8',
            'phone' => 'nullable|string|max:20', // checks c_password too
            'availability_status' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'subject' => 'nullable|array',
            'subject.*' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];


        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
   // ✅ Check if user already exists by email
    $existingUser = User::where('email', $request->input('email'))->first();

   if ($existingUser) {
    Auth::login($existingUser);
    return redirect()->route('newhome')->with('alert', 'User already exists.');
}



        $student = new Student();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $user = new User();
        $user->name = $student->name;
        $user->email = $student->email;
        $user->password = Hash::make($request->input('password'));
        $user->role = 'user';
        $user->save();
        $student->password = Hash::make($request->input('password'));
        $student->user_id = $user->id;
        $student->session_id = session()->getId();
        $student->save();

    //      $tutor = Tutor::findOrFail($id);

    //     $toTutor = $tutor->email;
    //     $subjectTutor = "Welcome to Edexcel Your Learning Journey Starts Now!";
    //     $messageTutor ="Dear " . $tutor->name . ",\r\n\r\n" .
    // "We are thrilled to welcome you to Edexcel! 🎉 As a valued tutor, your role is essential in shaping our students’ learning journey.\r\n\r\n" .
    // "To get started, please log in to your account, complete your profile, and explore the available teaching tools and resources.\r\n" .
    // "If you have any questions or require support, feel free to reach out to us at info@edexceledu.com — we're always here to help.\r\n\r\n" .
    // "We look forward to working with you and empowering students together.\r\n\r\n" .
    // "Best regards,\r\n" .
    // "The Edexcel Team";

        // $this->sendEmail($toTutor, $subjectTutor, $messageTutor);


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
            return redirect()->route('newhome')
                ->with('success', 'Student created successfully and logged in.');
        }

        // Redirect to the "hire us" page
        return redirect()->route('newhome')->with(compact('user'));

        // Optionally, you can redirect the user or return a response
        // return redirect()->route('newhome')->with('success', 'Student created successfully.');
    }


    // public function create(Request $request)
    // {

    //     $rules = [
    //         'email' => 'required|string|email|max:255|unique:student,email',
    //         'password' => 'required|min:8',
    //         'phone' => 'nullable|string|max:20', // checks c_password too
    //         'availability_status' => 'nullable|string|max:255',
    //         'country' => 'nullable|string|max:100',
    //         'city' => 'nullable|string|max:100',
    //         'subject' => 'required|array',
    //         'subject.*' => 'required|string|max:255',
    //         'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //     ];


    //     $validator = Validator::make($request->all(), $rules);

    //     // Check if validation fails
    //     if ($validator->fails()) {
    //         return redirect()->back()
    //             ->withErrors($validator)
    //             ->withInput();
    //     }
    //     $student = new Student();
    //     $student->availability_status = $request->input('subjects');
    //     $student->name = $request->input('name');
    //     $student->email = $request->input('email');
    //     $student->phone = $request->input('phone');
    //     $user = new User();
    //     $user->name = $student->name;
    //     $user->email = $student->email;
    //     $user->password = Hash::make($request->input('password'));
    //     $user->role = 'user';
    //     $user->save();
    //     $student->gender = $request->input('gender');
    //     $student->country = $request->input('country');
    //     $student->city = $request->input('city');
    //     $student->subject = implode(',', $request->input('subject'));
    //     $student->grade = $request->input('grade');
    //     $student->password = Hash::make($request->input('password'));
    //     $student->description = $request->input('description');
    //     $student->user_id = $user->id;
    //     $imagePath = $request->file('image')->store('students/images', 'public');
    //     $student->profileImage = $imagePath;
    //     $student->session_id = session()->getId();
    //     $student->save();



    //     $toStudent = $student->email;
    //     $subjectStudent = "Welcome to Edexcel Your Learning Journey Starts Now!";
    //     $messageStudent = "Dear " . $student->name . "\r\n" .
    //         "Welcome to Edexcel! 🎉 We’re excited to support you on your educational journey with top-notch resources and interactive learning.\r\n" .
    //         "Explore our courses, connect with expert educators, and engage with fellow learners. If you need any assistance, contact us at info@edexceledu.com.\r\n" .
    //         "We’re here to help you succeed!\r\n\r\n" .
    //         "Best regards,\r\n" .
    //         "The Edexcel Team";

    //     $this->sendEmail($toStudent, $subjectStudent, $messageStudent);

    //     $toAdmin = 'info@edexceledu.com';
    //     $subjectAdmin = "Edexcel Notification";
    //     $messageAdmin = "Subject: New Student Enrollment Notification

    //     Dear Babar,

    //     I hope this email finds you well.

    //     I am pleased to inform you that a new student, {$student->name}, has successfully enrolled through our website. Below are the details of the new enrollment:

    //     - *Full Name:* {$student->name}
    //     - *Email Address:* {$student->email}
    //     - *Contact Number:* {$student->phone}
    //     - *Program/Course Enrolled:* {$student->subjects}

    //     Please ensure that {$student->name} is added to our records and receives all necessary welcome materials and instructions. If any further information is needed, feel free to contact me.

    //     Thank you for your prompt attention to this new enrollment.

    //     Best regards,
    //     The Edexcel Team";



    //     $this->sendEmail($student->email, $subjectAdmin, $messageAdmin);


    //     if ($user->role === 'user') {
    //         Auth::login($user);
    //         return redirect()->route('student_dashboard', ['id' => $student->id])
    //             ->with('success', 'Tutor created successfully and logged in.');
    //     }

    //     // Redirect to the "hire us" page
    //     return redirect()->route('newhome')->with(compact('user'));

    //     // Optionally, you can redirect the user or return a response
    //     // return redirect()->route('newhome')->with('success', 'Student created successfully.');
    // }  
    public function edit($id)
    {
        $schoolClasses = SchoolClass::all();
        $student = Student::findOrFail($id);
        $qualification = SchoolClass::where('id', $student->qualification)->value('name') ?? 'Not specified';
        $student->teaching = unserialize($student->teaching);
        $storedLanguageCode = $student->language;

        $languages = collect(json_decode($storedLanguageCode, true)) // Decode JSON
            ->pluck('language') // Extract language codes
            ->toArray(); // Convert to array

        // Map each language code to its full name from the config file
        $languageNames = array_map(function ($code) {
            return config("languages.languages.$code", 'Unknown');
        }, $languages);

        //country

        $storedCountryCode = $student->country; // Get country code
        $country = config("countries_assoc.countries.$storedCountryCode", 'Unknown'); // Convert to full name

        $student->curriculum = unserialize($student->curriculum);
        $countriesPhone = collect(config('phonecountries.countries'));
        $countries_number_length = collect(config('countries_number_length.countries'));
        $countries_prefix = collect(config('countries_prefix.countries'));
        $countries = collect(config('countries_assoc.countries'));
        return view('edit-student', compact(['student', 'country', 'countriesPhone', 'countries', 'countries_number_length', 'countries_prefix', 'languageNames', 'schoolClasses', 'qualification']));
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out

        $request->session()->invalidate(); // Invalidate session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('newhome'); // Redirect to home or login page
    }
    public function send(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|integer|exists:tutors,teacher_id',
        ]);
    
        // Get the tutor using teacher_id (not primary key)
        $tutor = \App\Models\Tutor::where('teacher_id', $request->teacher_id)->first();
    
        if (!$tutor) {
            return response()->json(['error' => 'Tutor not found.'], 404);
        }
    
        $user = Auth::user();
    
        // Social Icons
        $facebookImg = "<img src='https://edexceledu.com/icons/facebook.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";
        $instagramImg = "<img src='https://edexceledu.com/icons/instagram.jpeg' alt='Instagram' width='20' height='20' style='vertical-align:middle'>";
        $linkedinImg  = "<img src='https://edexceledu.com/icons/linkedin.jpeg' alt='LinkedIn' width='20' height='20' style='vertical-align:middle'>";
        $youtubeImg   = "<img src='https://edexceledu.com/icons/youtube.jpeg' alt='YouTube' width='20' height='20' style='vertical-align:middle'>";
    
        $subjectTutor = "New Tutoring Request from {$user->name}";
    
        // Reusable HTML message body
        $message = function ($recipientName, $recipientType) use ($user, $tutor, $facebookImg, $instagramImg, $linkedinImg, $youtubeImg) {
            $otherPerson = $recipientType === 'tutor' ? $user : $tutor;
            return "
                <div style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
                    <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                        <tr>
                            <td align='center'>
                                <table style='max-width: 600px; width: 100%; border: 1px solid #ddd; border-radius: 8px; background-color: #fff;' cellpadding='0' cellspacing='0'>
                                    <tr>
                                        <td style='background-color: #f4f4f4; padding: 15px; text-align: center; font-size: 20px; font-weight: bold; color: #4CAF50; border-top-left-radius: 8px; border-top-right-radius: 8px;'>
                                            New Tutoring Request
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 20px; text-align: left;'>
                                            <p style='font-size: 16px; margin: 0;'>Dear {$recipientName},</p>
                                            <p style='font-size: 16px; margin: 10px 0;'>You have submitted/received a tutoring request with <strong style='color:#43b979'>{$otherPerson->name}</strong>.</p>
                                            <p style='font-size: 16px; margin: 10px 0;'>Email: <strong>{$otherPerson->email}</strong></p>
                                            <p style='font-size: 16px;'>Please log in to your dashboard to continue the communication.</p>
                                            <p style='font-size: 16px; font-weight: bold; color:#43b979;'>The Edexcel Academy Team</p>
                                        </td>
                                    </tr>
                                    <tr style='margin-bottom:10px;display:flex;'>
                                        <td align='left' style='color:#43b979; font-size:12px; margin-left:5px; width:50%;'>
                                            &copy; 2025 Edexcel Academy. All rights reserved.
                                        </td>
                                        <td align='right' style='display:flex;margin-left:29%;'>
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
        };
    
        // Send to Tutor
        $this->sendEmail($tutor->email, $subjectTutor, $message($tutor->f_name, 'tutor'));
    
        // Send to User (confirmation)
        $subjectUser = "Your Tutoring Request to {$tutor->name} was sent";
        $this->sendEmail($user->email, $subjectUser, $message($user->name, 'user'));
    
        return response()->json(['success' => true, 'message' => 'Demo request sent to both tutor and student.']);
    }
    
    public function sendTutorRequest(Request $request, $id)
    {
        $student = auth()->user();
        $tutor = Tutor::find($id);

        if (!$tutor) {
            return back()->with('error', 'Tutor not found.');
        }
        $facebookImg = "<img src='https://edexceledu.com/icons/facebook.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";
        $instagramImg = "<img src='https://edexceledu.com/icons/instagram.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";
        $linkedinImg  = "<img src='https://edexceledu.com/icons/linkedin.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";
        $youtubeImg   = "<img src='https://edexceledu.com/icons/youtube.jpeg' alt='Facebook' width='20' height='20' style='vertical-align:middle'>";       // Send email to the student
        $subjectTutor = "New Tutoring Request from {$student->name}";

        // Prepare the HTML message like your inquiry email style
        $messageTutor = "
    <div style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
    <table width='100%' cellpadding='0' cellspacing='0' border='0'>
        <tr>
            <td align='center'>
                <table style='max-width: 600px; width: 100%; border: 1px solid #ddd; border-radius: 8px; background-color: #fff;' cellpadding='0' cellspacing='0'>

                    <!-- Header -->
                    <tr>
                        <td style='background-color: #f4f4f4; padding: 15px; text-align: center; font-size: 20px; font-weight: bold; color: #4CAF50; border-top-left-radius: 8px; border-top-right-radius: 8px;'>
                            New Tutoring Request
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                        <td style='padding: 20px; text-align: left;'>
                            <p style='font-size: 16px; margin: 0;'>Dear $tutor->f_name,</p>
                            <p style='font-size: 16px; margin: 10px 0;'>
                                You have received a new tutoring request from <strong style='color:#43b979'>$student->name</strong>.
                            </p>
                            <p style='font-size: 16px; margin: 10px 0;'>
                                Please find the student's contact details below:
                            </p>
                            <ul style='font-size: 16px; margin: 10px 0 20px 20px; padding-left: 0;'>
                                <li><strong>Email:</strong>  $student->email</li>
                            </ul>
                            <p style='font-size: 16px; margin: 10px 0;'>
                                Kindly log in to your dashboard to review the request and respond accordingly.
                            </p>
                            <p style='font-size: 16px; margin: 10px 0;'>Thank you for being a valued member of Edexcel Academy.</p>
                            <p style='font-size: 16px; font-weight: bold; margin: 0;color:#43b979;'>The Edexcel Academy Team</p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr style='margin-bottom:10px;display:flex;'>
                        <td align='left' style='color:#43b979; font-size:12px; margin-left:5px; width:50%;'>
                            &copy; 2025 Edexcel Academy. All rights reserved.
                        </td>
                        <td align='right' style='display:flex;margin-left:29%;'>
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

        // Send the email using your existing PHPMailer wrapper
        $this->sendEmail($tutor->email, $subjectTutor, $messageTutor);

        // Notify tutor in database (optional)
        $tutor->notify(new TutorRequestNotification($student));

        return back()->with('success', 'Tutoring request sent to tutor successfully!');
    }

    public function student_dashboard(Request $request, $id)
    {
        $user = Auth::user();

        return redirect()->route('newhome')->with('success', 'authorized successfully.');
    }
    // public function student_dashboard(Request $request, $id)
    // {
    //     $user = Auth::user();

    //     if ($user && $user->role === 'user') {
    //         $student = Student::find($id);

    //         if (!$student) {
    //             return redirect()->route('basicsignup')->with('error', 'Student not found.');
    //         }
    //         $query = Tutor::where('status', 'active');
    //         $sliderTutors = Tutor::where('status', 'active')->take(6)->get();
    //         $perPage = 5; // Define the number of tutors per page
    //         $blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();

    //         // Paginate the results
    //         $tutors = $query->paginate($perPage);

    //         $totalTutorsCount = Tutor::count();
    //         $storedCountry = trim($student->country);
    //         $student->country = config("countries_assoc.countries.$storedCountry", 'Unknown');
    //         $teacher = Tutor::all();

    //         $tutorSubjects = [];

    //         foreach ($teacher as $tutor) {
    //             $json = $tutor->edu_teaching; // stored as JSON array

    //             if ($json) {
    //                 $subjects = json_decode($json, true); // now array like ['Accounting', 'Aerospace Engineering']

    //                 if (is_array($subjects)) {
    //                     // Clean each subject: trim + lowercase
    //                     $cleaned = array_map(fn($s) => strtolower(trim($s)), $subjects);
    //                     $tutorSubjects[$tutor->id] = $cleaned;
    //                 } else {
    //                     $tutorSubjects[$tutor->id] = [];
    //                 }
    //             } else {
    //                 $tutorSubjects[$tutor->id] = [];
    //             }
    //         }


    //         $matchedTutors = $teacher->filter(function ($tutor) use ($student, $tutorSubjects) {
    //             $studentSubjects = array_map(
    //                 fn($s) => strtolower(trim($s)),
    //                 explode(',', $student->subject)
    //             );

    //             // Use already processed and cleaned subjects from earlier
    //             $tutorSubjectsList = $tutorSubjects[$tutor->id] ?? [];

    //             $tutorAvailability = strtolower(trim($tutor->availability_status));
    //             $studentAvailability = strtolower(trim($student->availability_status));

    //             $hasCommonSubjects = !empty(array_intersect($studentSubjects, $tutorSubjectsList));

    //             return $hasCommonSubjects && $tutorAvailability === $studentAvailability;
    //         });



    //         $matchedTutors->each(function ($tutor) {
    //             $storedCountryCode = trim($tutor->country);
    //             $tutor->country_name = config("countries_assoc.countries.$storedCountryCode", 'Unknown');

    //             $language = json_decode($tutor->language, true);
    //             $tutor->language = is_array($language) ? $language : [];

    //             // This will dump the teaching property for each tutor

    //             $specialization = json_decode($tutor->specialization, true);
    //             $tutor->specialization = is_array($specialization) && !empty($specialization)
    //                 ? $specialization : ['Not Specified'];

    //             if ($tutor->dob) {
    //                 $dob = Carbon::parse($tutor->dob);
    //                 $tutor->dob = $dob->format('d-m-Y');
    //                 $tutor->age = $dob->age;
    //             } else {
    //                 $tutor->age = null;
    //             }
    //         });
    //         $currentPage = LengthAwarePaginator::resolveCurrentPage();
    //         $matchedTutorsPerPage = 5;

    //         $paginatedMatchedTutors = new LengthAwarePaginator(
    //             $matchedTutors->slice(($currentPage - 1) * $matchedTutorsPerPage, $matchedTutorsPerPage)->values(),
    //             $matchedTutors->count(),
    //             $matchedTutorsPerPage,
    //             $currentPage,
    //             ['path' => request()->url(), 'query' => request()->query()]
    //         );

    //         $subjectsTeach = collect(config('subjects.subjects'));
    //         $countries = collect(config('countries_assoc.countries'));
    //         $countriesPhone = collect(config('phonecountries.countries'));
    //         $countries_number_length = collect(config('countries_number_length.countries'));
    //         $countries_prefix = collect(config('countries_prefix.countries'));
    //         return view('hired-tutor', [
    //             'student' => $student,
    //             'matchedTutors' => $matchedTutors,
    //             'paginatedMatchedTutors' => $paginatedMatchedTutors,
    //             'blogs' => $blogs,
    //             'sliderTutors' => $sliderTutors,
    //             'tutors' => $tutors,
    //             'subjectsTeach' => $subjectsTeach,
    //             'totalTutorsCount' => $totalTutorsCount,
    //             'perPage' => $perPage,
    //             'countries' => $countries,
    //             'countriesPhone' => $countriesPhone,
    //             'countries_number_length' => $countries_number_length,
    //             'countries_prefix' => $countries_prefix
    //         ])->with('success', 'Welcome to your dashboard.');
    //     }

    //     return redirect()->route('newhome')->with('error', 'Unauthorized access.');
    // }

    public function fetchData(Request $request)
    {     // Debugging block: Check numeric extraction from price


        // Initialize the query builder
        $query = Tutor::query();

        // Define the number of tutors per page
        $perPage = 5;



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
            'email' => "required|string|email|max:255|unique:student,email,$id",
            'phone' => 'nullable|string|max:20',
            'availability_status' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'subject' => 'required|array',
            'subject.*' => 'required|string|max:255',
            'profileImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $student = Student::findOrFail($id);

        // Update student fields
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->gender = $request->input('gender');
        $student->country = $request->input('country');
        $student->city = $request->input('city');
        $student->grade = $request->input('grade');
        $student->description = $request->input('description');
        $student->subject = implode(',', $request->input('subject'));
        $student->availability_status = $request->input('availability_status');


        if ($request->hasFile('profileImage')) {
            // Delete old image if exists
            if ($student->profileImage && \Storage::disk('public')->exists($student->profileImage)) {
                \Storage::disk('public')->delete($student->profileImage);
            }

            // Store new image
            $image = $request->file('profileImage');
            $imagePath = $image->store('students/images', 'public');
            $student->profileImage = $imagePath;
        }


        $student->save();

        return redirect()->route('students.list')->with('success', 'Student updated successfully.');
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
