<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tutor; // Add the Tutor model namespace

class TutorController extends Controller
{
    //
    public function index()
    {
        // Your index method logic here
    }

    public function store(Request $request)
    {
        // Your store method logic here
    }
    public function create(Request $request){
//        dd($request);
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);
        $tutor = new Tutor();
        $tutor->name = $request->input('name');
        $tutor->email = $request->input('email');
        $tutor->age = $request->input('age');
        $tutor->qualification = $request->input('qualification');
        $tutor->gender = $request->input('gender');
        $tutor->location = $request->input('location');
        $tutor->experience = $request->input('experience');
        $tutor->teaching = $request->input('teaching');
        $tutor->phone = $request->input('phone');
        $tutor->whatsapp = $request->input('whatsapp');
        // Set other attributes as needed

        // Save the Tutor instance to the database
        $tutor->save();

        // Optionally, you can redirect the user or return a response
        return redirect()->route('home')->with('success', 'Tutor created successfully.');
    }
}
