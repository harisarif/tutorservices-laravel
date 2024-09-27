<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
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
}
