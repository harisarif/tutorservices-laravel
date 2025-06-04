<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ZoomMeetingNotification;
use App\Models\Tutor;
use App\Models\Student;
class ZoomController extends Controller
{
    public function redirectToZoom()
    {
        
        $query = http_build_query([
            'response_type' => 'code',
            'client_id' => env('ZOOM_CLIENT_ID'),
            'redirect_uri' => 'https://edexceledu.com/zoom/callback',
        ]);
        return redirect("https://zoom.us/oauth/authorize?$query");
    }

    public function handleZoomCallback(Request $request)
{
    if (!$request->has('code')) {
        return redirect()->route('home')->with('error', 'Authorization code missing.');
    }

    $response = Http::withHeaders([
        'Authorization' => 'Basic ' . base64_encode(env('ZOOM_CLIENT_ID') . ':' . env('ZOOM_CLIENT_SECRET')),
    ])->asForm()->post('https://zoom.us/oauth/token', [
        'grant_type' => 'authorization_code',
        'code' => $request->code,
        'redirect_uri' => env('ZOOM_REDIRECT_URI'), // must match exactly
    ]);

    if ($response->failed()) {
        return response()->json([
            'error' => 'Token request failed',
            'status' => $response->status(),
            'body' => $response->json()
        ], 400);
    }

    $data = $response->json();

    Session::put('zoom_access_token', $data['access_token']);

    return redirect()->route('zoom.create.meeting');
}


public function createMeetingAndSendEmail(Request $request)
{
    $teacher = Tutor::findOrFail($request->teacher_id);
    $student = Student::findOrFail($request->student_id);

    $token = Session::get('zoom_access_token');
    if (!$token) {
        return redirect()->route('zoom.login')
                         ->with('error', 'Zoom access token missing.');
    }

    $response = Http::withToken($token)->post('https://api.zoom.us/v2/users/me/meetings', [
        'topic' => 'Teacher & Student Meeting',
        'type' => 1,
        'settings' => [
            'join_before_host' => true,
            'host_video' => true,
            'participant_video' => true,
        ],
    ]);

    if ($response->failed()) {
        return back()->with('error', 'Failed to create Zoom meeting.');
    }

    $meeting = $response->json(); // THIS variable is now defined

    // Send emails
    Mail::to($teacher->email)->send(new ZoomMeetingNotification($teacher, $meeting));
    Mail::to($student->email)->send(new ZoomMeetingNotification($student, $meeting));

    return back()->with('success', 'Meeting created and emails sent successfully.');
}
    public function createMeeting(Request $request)
    {
        $token = Session::get('zoom_access_token');

        $response = Http::withToken($token)->post('https://api.zoom.us/v2/users/me/meetings', [
            'topic' => 'Teacher & Student Meeting',
            'type' => 1, // Instant meeting
            'settings' => [
                'join_before_host' => true,
                'host_video' => true,
                'participant_video' => true,
            ],
        ]);

        return redirect()->route('zoom.mail.meeting', [
            'teacher_id' => $request->teacher_id,
            'student_id' => $request->student_id,
            'blob'       => base64_encode(json_encode($meeting)),
        ]);
    }
    public function createAndMailMeeting(Request $request)
{
    // 1. Resolve teacher & student
    $teacher = Tutor::findOrFail($request->teacher_id);
    $student = Student::findOrFail($request->student_id);

    // 2. Get—or refresh—Zoom token
    $token = Session::get('zoom_access_token');
    if (!$token) {
        return redirect()->route('zoom.login')
                         ->with('error', 'Please connect Zoom first.');
    }

    // 3. Create meeting
    $zoom = Http::withToken($token)->post(
        'https://api.zoom.us/v2/users/me/meetings',
        [
            'topic'   => 'Teacher & Student Meeting',
            'type'    => 1,          // instant
            'settings'=> [
                'join_before_host' => true,
                'host_video'       => true,
                'participant_video'=> true,
            ],
        ]
    );

    if ($zoom->failed()) {
        \Log::error('Zoom error', ['body' => $zoom->body()]);
        return back()->with('error', 'Zoom meeting could not be created.');
    }

    $meeting = $zoom->json();   // contains join_url, password, etc.

    // 4. Send e-mails (queue if the site is live)
    Mail::to($teacher->email)->queue(new ZoomMeetingNotification($teacher, $meeting));
    Mail::to($student->email)->queue(new ZoomMeetingNotification($student, $meeting));

    // 5. Redirect back with success flash
    return back()->with('success', 'Meeting created and invites sent.');
}

    public function sendMeetingEmail(Request $request)

        {   
           
            
            $teacher = Tutor::findOrFail($request->teacher_id);
            $student = Student::findOrFail($request->student_id);
            // dd($request);
            // 1. Get Zoom Access Token
            $accessToken = Session::get('zoom_access_token'); // or retrieve from DB
            if (!$accessToken) {
                return redirect()->route('zoom.login');
            }

            // 2. Create Meeting
            $response = Http::withToken($accessToken)->post('https://api.zoom.us/v2/users/me/meetings', [
                'topic' => 'Student & Teacher Meeting',
                'type' => 1,
                'settings' => [
                    'join_before_host' => true,
                    'host_video' => true,
                    'participant_video' => true,
                ],
            ]);

            if ($response->failed()) {
                return back()->with('error', 'Failed to create Zoom meeting.');
            }

            $meeting = $response->json();

            // 3. Send Email
            Mail::to($teacher->email)->send(new ZoomMeetingNotification($teacher, $meeting));
            Mail::to($student->email)->send(new ZoomMeetingNotification($student, $meeting));
            return back()->with('success', 'Meeting created and invites sent.');
        }
}
