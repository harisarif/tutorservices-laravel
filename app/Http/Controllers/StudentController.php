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
        $messageStudent = "Dear " . $student->name . "\r\n" .
        "Welcome to Edexcel! 🎉 We’re excited to support you on your educational journey with top-notch resources and interactive learning.\r\n" .
        "Explore our courses, connect with expert educators, and engage with fellow learners. If you need any assistance, contact us at ceo@edexceledu.com or +971566428066.\r\n" .
        "We’re here to help you succeed!\r\n\r\n" .
        "Best regards,\r\n" .
        "The Edexcel Team";

        $this->sendEmail($toStudent, $subjectStudent, $messageStudent);

        $toAdmin = 'ceo@edexceledu.com';
        $subjectAdmin = "Edexcel Notification";
        $messageAdmin = "A new student added with name " . $student->name . "\r\n";

        $this->sendEmail($toAdmin, $subjectAdmin, $messageAdmin);
        
        

        // Optionally, you can redirect the user or return a response
        return redirect()->route('newhome')->with('success', 'Student created successfully.');
    }
    private function sendEmail($to, $subject, $body, $isHtml) {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0; // Disable verbose debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ceo@edexceledu.com';
            $mail->Password = 'Babar123!@#';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('ceo@edexceledu.com', 'Edexcel');
            $mail->addAddress($to);

            // Content
            $mail->isHTML($isHtml); // Set email format based on isHtml parameter
            $mail->Subject = $subject;
            $mail->Body = $body;

            if ($isHtml) {
                // Embed image in the HTML email
                $mail->addEmbeddedImage('https://edexceledu.com/images/logo.png', 'logo');
            }

            $mail->send();
            echo "Email has been sent to $to";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


}
