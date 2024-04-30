<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tutor; // Add the Tutor model namespace
use App\Models\Country;
class TutorController extends Controller
{
    //
    public function index(Request $request)
        {

            $query = Tutor::query();

            

            $perPage = 10; // Define the number of tutors per page

            // Paginate the results
            $tutors = $query->paginate($perPage);

            // Fetch the total count of tutors (for all countries)
            $totalTutorsCount = Tutor::count();

            return view('home', [
                'tutors' => $tutors,
                'totalTutorsCount' => $totalTutorsCount,
                'perPage' => $perPage,
            ]);
        }

    public function fetchData(Request $request)
        {
            $query = Tutor::query();

        // Filter tutors by selected country if a country is selected
            if ($request->has('location')) {
                $query->where('location', $request->location);
            }

            $tutors = $query->paginate(10);

            // Fetch the total count of tutors (for all countries)
            $totalTutorsCount = Tutor::count();

            // Define the number of tutors per page
            $perPage = 10;
            // dd($tutors);
            return view('home', [
                'tutors' => $tutors,
                'totalTutorsCount' => $totalTutorsCount,
                'perPage' => $perPage,
            ]);
        }
    public function store(Request $request)
    {
        // Your store method logic here
    }
    public function create(Request $request){
        // dd($request);
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'profileImage' => 'required|image|mimes:jpeg,png,jpg|max:2048', // max:2048 is for maximum 2MB file size, adjust as needed
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
    public function filterByCountry(Request $request)
    {
        $countryId = $request->input('country');

        // Apply filtering logic here
        $query = Tutor::query();

        if ($countryId) {
            $query->where('country_id', $countryId);
        }

        $tutors = $query->get();

        return response()->json($tutors);
    }
}
