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
        // Retrieve data from the model
        $data = Tutor::all(); // Replace YourModel with your actual model and adjust the retrieval logic as needed
        // dd($data);
        // Pass the data to the view
        return view('home', ['data' => $data]);
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
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // max:2048 is for maximum 2MB file size, adjust as needed
        ]);
        $tutor = new Tutor();
        $tutor->name = $request->input('name');
        $tutor->email = $request->input('email');
        $tutor->age = $request->input('age');
        $tutor->qualification = $request->input('qualification');
        $tutor->gender = $request->input('gender');
        $tutor->location = $request->input('location');
        $tutor->experience = $request->input('experience');
        $tutor->curriculum = $request->input('curriculum');
        $tutor->availability = $request->input('availability');
        $tutor->teaching = $request->input('teaching');
        $tutor->phone = $request->input('phone');
        $tutor->whatsapp = $request->input('whatsapp');

        // Upload profile image
        $imagePath = $request->file('profileImage')->store('uploads', 'public');
        $tutor->profileImage = $imagePath;

        // Save the Tutor instance to the database
        $tutor->save();

        // Optionally, you can redirect the user or return a response
        return redirect()->route('home')->with('success', 'Tutor created successfully.');
    }
}
