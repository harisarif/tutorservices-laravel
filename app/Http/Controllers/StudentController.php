<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Collection;
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
        $student = Student::find($request->input('student_id'));
        $studentEmail = $request->input('email');
        $adminEmail = 'ceo@edexceledu.com';

        $subject = "Welcome to Edexcel – Your Learning Journey Starts Now!";
        $message = "Dear " . $student->name . "\r\n" .
            "Welcome to Edexcel! 🎉 We’re excited to support you on your educational journey with top-notch resources and interactive learning.\r\n" .
            "Explore our courses, connect with expert educators, and engage with fellow learners. If you need any assistance, contact us at ceo@edexceledu.com or +971566428066.\r\n" .
            "We’re here to help you succeed!\r\n\r\n" .
            "Best regards,\r\n" .
            "The Edexcel Team";

        $adminMessage = "A new student has been added with the name " . $student->name . "\r\n";

        $this->sendEmail($studentEmail, $subject, $message);
        $this->sendEmail($adminEmail, 'Edexcel Notification', $adminMessage);
        // $to = $request->input('email');'ceo@edexceledu.com';
        // $subject = "Welcome to Edexcel – Your Learning Journey Starts Now!";
        // $message = "Dear " . $student->name . "\r\n" .
        // "Welcome to Edexcel! 🎉 We’re excited to support you on your educational journey with top-notch resources and interactive learning.\r\n" .
        // "Explore our courses, connect with expert educators, and engage with fellow learners. If you need any assistance, contact us at ceo@edexceledu.com or +971566428066.\r\n" .
        // "We’re here to help you succeed!\r\n\r\n" .
        // "Best regards,\r\n" .
        // "The Edexcel Team";
        // $headers = "From: Edexcel\r\n";
        // $headers .= "Reply-To: ceo@edexceledu.com\r\n";
        // $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        
        // // Send email
        // if (mail($to, $subject, $message, $headers)) {
        //     echo "Email sent successfully.";
        // } else {
        //     echo "Email sending failed.";
        // }
        // $toadmin = 'ceo@edexceledu.com';
        // $subjectadmin = "Edexcel Notification";
        // $messageadmin = "A new student added with name " . $student->name . "\r\n";
        // $headersadmin = "From: Edexcel\r\n";
        // $headersadmin .= "Reply-To: ceo@edexceledu.com\r\n";
        // $headersadmin .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        
        // // Send email
        // if (mail($toadmin, $subjectadmin, $messageadmin, $headersadmin)) {
        //     echo "Email sent successfully.";
        // } else {
        //     echo "Email sending failed.";
        // }
        $student = new User();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->password = $request->input('password');
        $student->save();

        // Optionally, you can redirect the user or return a response
        return redirect()->route('home')->with('success', 'Student created successfully.');
    }
    private function sendEmail($to, $subject, $body)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Port = env('MAIL_PORT');

            //Recipients
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($to);

            // Content
            $mail->isHTML(false); // Set email format to plain text
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
            echo "Email has been sent to $to";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
