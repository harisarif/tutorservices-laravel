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
            'redirect_uri' => env('ZOOM_REDIRECT_URI'),
        ]);

        return redirect("https://zoom.us/oauth/authorize?$query");
    }

    public function handleZoomCallback(Request $request)
    {
        $response = Http::asForm()->post('https://zoom.us/oauth/token', [
            'grant_type' => 'authorization_code',
            'code' => $request->code,
            'redirect_uri' => env('ZOOM_REDIRECT_URI'),
        ], [
            'Authorization' => 'Basic ' . base64_encode(env('ZOOM_CLIENT_ID') . ':' . env('ZOOM_CLIENT_SECRET')),
        ]);

        $data = $response->json();

        // Save access token to session or database
        Session::put('zoom_access_token', $data['access_token']);

        return redirect()->route('zoom.create.meeting');
    }

    public function createMeeting()
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

        return $response->json(); // You can return a view instead
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

            return back()->with('success', 'Meeting created and emails sent.');
        }
}
