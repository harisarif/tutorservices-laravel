<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tutors = Tutor::all();
        $countries = collect(config('countries_assoc.countries'));
        return view('home',compact('tutors','countries'));
    }
    
    public function hiring() {
        return view('hired-tutor');
    }
    public function studenthiring() {
        return view('student-hiring');
    }
}
