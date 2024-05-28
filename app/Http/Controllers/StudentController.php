<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class StudentController extends Controller
{
    public function index() {
        $countries = collect(config('countries.countries'))->prepend("Select your country", "");
        return view('hire-tutor', compact('countries'));
    }
    public function showStudentsList() {
        
        $students = Student::all();
        return view('student-list', compact('students'));
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
        $student->class_start_time = $request->input('class_start_time');
        $student->class_end_time = $request->input('class_end_time');
        $student->whatsapp_number = $request->input('whatsapp_number');
        $student->country = $request->input('country');
        $student->city= $request->input('city');
        $student->subject = $request->input('subject');
        $student->c_email = $request->input('c_email');
        $student->password = $request->input('password');
        $student->c_password = $request->input('c_password');

        // Save the student instance to the database
        $student->save();

        $student = new User();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->password = Hash::make($request->input('password'));
        $student->save();

        $toStudent = $student->email;
        $subjectStudent = "Welcome to Edexcel – Your Learning Journey Starts Now!";
        $messageStudent = "Subject: New Student Enrollment Notification

        Dear (Babar),
        
        I hope this email finds you well.
        
        I am pleased to inform you that a new student, ($student->name), has successfully enrolled through our website. Below are the details of the new enrollment:
        
        - *Full Name:* $student->name
        - *Email Address:*  $student->email 
        - *Contact Number:* $student->phone
        - *Program/Course Enrolled:* $student->subjects
        
        Please ensure that (Student's First Name) is added to our records and receives all necessary welcome materials and instructions. If any further information is needed, feel free to contact me.
        
        Thank you for your prompt attention to this new enrollment.
        
        Best regards,
        The Edexcel Team";

        $this->sendEmail($toStudent, $subjectStudent, $messageStudent);

        $toAdmin = 'ceo@edexceledu.com';
        $subjectAdmin = "Edexcel Notification";
        $messageAdmin = "A new student added with name " . $student->name . "\r\n";

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
