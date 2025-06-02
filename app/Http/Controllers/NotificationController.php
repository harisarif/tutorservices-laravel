<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    
public function index()
{
    // You can filter notifications as needed
    $notifications =auth()->user()->notifications; // or unreadNotifications / readNotifications

    return view('notifications-list', compact('notifications'));
}
    public function markNotificationAsRead(Request $request)
{
    $notification = auth()->user()->notifications()->where('id', $request->notification_id)->first();
    if ($notification) {
        if ($request->read) {
            $notification->markAsRead();
        } else {
            $notification->markAsUnread();
        }
        return response()->json(['status' => 'success']);
    }
    return response()->json(['status' => 'error'], 400);
}


public function show($id)
{
    $notification = auth()->user()->notifications()->findOrFail($id);
    $notification->markAsRead();
    return view('notifications-detail', compact('notification'));
}

public function destroy($id)
{
    auth()->user()->notifications()->findOrFail($id)->delete();
    return response()->json(['success' => true]);
}

public function destroyBulk(Request $request)
{
    $ids = $request->ids;
    auth()->user()->notifications()->whereIn('id', $ids)->delete();
    return response()->json(['success' => true]);
}



}
