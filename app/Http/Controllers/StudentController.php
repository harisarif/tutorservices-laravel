<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        return view('hire-tutor');
    }

    public function create(Request $request) {
        $student = new Student();
        $student->subjects = $request->input('subjects');
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->class_start_time = $request->input('class_start_time');
        $student->class_end_time = $request->input('class_end_time');
        $student->whatsapp_number = $request->input('whatsapp_number');
        $student->subject = $request->input('subject');
        $student->c_email = $request->input('c_email');
        $student->password = $request->input('password');
        $student->c_password = $request->input('c_password');

        // Save the student instance to the database
        $student->save();

        // Optionally, you can redirect the user or return a response
        return redirect()->route('home')->with('success', 'Student created successfully.');
    }
}
