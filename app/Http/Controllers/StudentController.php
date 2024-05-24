<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Collection;
class StudentController extends Controller
{
    public function index() {
        $countries = collect(config('countries.countries'))->prepend("Select your country", "");
        return view('hire-tutor', compact('countries'));
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
        $msg = "First line of text\nSecond line of text";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);
        
        // send email
        mail("harif3496@gmail.com","My subject",$msg);
        $student = new User();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->password = $request->input('password');
        $student->save();

        // Optionally, you can redirect the user or return a response
        return redirect()->route('home')->with('success', 'Student created successfully.');
    }
}
