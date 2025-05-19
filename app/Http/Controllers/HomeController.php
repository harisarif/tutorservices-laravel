<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    $inquires = DB::table('inquiries')->get();
    $students = Tutor::all();
    $countries = collect(config('countries_assoc.countries'));

    // Get the admin user (same as in inquiry method)
    $admin = User::where('email', 'info@edexceledu.com')->first();

    // Fetch notifications for the admin user (example: unread notifications)
    $notifications = $admin
    ? $admin->notifications()->orderBy('created_at', 'desc')->limit(4)->get()
    : collect();


    return view('home', compact('tutors', 'countries', 'students', 'inquires', 'notifications'));
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
