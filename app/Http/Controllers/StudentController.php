<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\SchoolClass;
use App\Models\Subject;

class StudentController extends Controller
{
    public function index() {
        // $countries = collect(config('countries.countries'))->prepend("Select your country", "");
        $schoolClasses = SchoolClass::all();
        $countries = collect(config('countries_assoc.countries'));
        $countries_number_length = collect(config('countries_number_length.countries'));
        $countries_prefix = collect(config('countries_prefix.countries'));
        return view('hire-tutor', compact('countries','schoolClasses','countries_prefix','countries_number_length'));
    }
    public function hiring() {
        return view('hired-tutor');
    }
    public function qrcode() {
        return view('qr-code');
    }
    public function showStudentsList() {
        
        $students = Student::all();
        return view('student-list', compact('students'));
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
    public function studentsPDF() {
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
    

    public function create(Request $request) {
        $rules = [
            'email' => 'required|string|email|max:255|unique:student,email',
            'class_start_time' => 'required|date_format:H:i',
            'class_end_time' => 'required|date_format:H:i',
            'password' => 'required|min:8',
            'c_password' => 'required|min:8|same:password',
        ];
    
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }
        $student = new Student();
        $student->subjects = $request->input('subjects');
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
        
        // $student->whatsapp_number = $request->input('whatsapp_number');
        $student->country = $request->input('country');
        $student->city = $request->input('city');
        $student->subject = $request->input('subject');
        $student->c_email = $request->input('c_email');
        $student->password = $request->input('password');
        $student->c_password = $request->input('c_password');

        // Save the student instance to the database
        $student->save();

        $user = new User();
        $user->name = $student->name;
        $user->email = $student->email;
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $toStudent = $student->email;
        $subjectStudent = "Welcome to Edexcel Your Learning Journey Starts Now!";
        $messageStudent = "Dear " . $student->name . "\r\n" .
            "Welcome to Edexcel! 🎉 We’re excited to support you on your educational journey with top-notch resources and interactive learning.\r\n" .
            "Explore our courses, connect with expert educators, and engage with fellow learners. If you need any assistance, contact us at info@edexceledu.com or +971566428066.\r\n" .
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



        $this->sendEmail($toAdmin, $subjectAdmin, $messageAdmin);
        
        

        // Optionally, you can redirect the user or return a response
        return redirect()->route('newhome')->with('success', 'Student created successfully.');
    }
    private function sendEmail($to, $subject, $body)
        {
            $mail = new PHPMailer(true);

            try {
                // Server settings
                // $mail->SMTPDebug = 2;
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

    public function edit($id) {

        $countries = collect(config('countries.countries'))->prepend("Select your country", "");
        $student = Student::findOrFail($id);

        // Convert stored time format to HH:MM format
        $student->class_start_time = Carbon::createFromFormat('h:i A', $student->class_start_time)->format('H:i');
        $student->class_end_time = Carbon::createFromFormat('h:i A', $student->class_end_time)->format('H:i');

        return view('edit-student', compact(['student', 'countries']));
    }

    public function update(Request $request, $id) {
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

    public function destroy($id) {
        $student = Student::find($id);
        $student->delete();
        return back()->with('message', 'Student deleted successfully');
    }
}
