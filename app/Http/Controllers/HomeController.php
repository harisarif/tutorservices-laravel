<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
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
        $students = Tutor::all();
        $countries = collect(config('countries_assoc.countries'));
        return view('home',compact('tutors','countries','students'));
    }
    public function inquiry() {
        $inquires = DB::table('inquiries')->get();
        return view('inquiry-list',compact('inquires'));
    }
    
    public function hiring() {
        return view('hired-tutor');
    }
    public function studenthiring() {
        return view('student-hiring');
    }
}
