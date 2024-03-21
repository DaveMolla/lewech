<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserNotificationController extends Controller
{
    public function index()
    {
        // Retrieve notifications for the authenticated user
        $notifications = Auth::user()->notifications;

        // Here you'll return the view with the notifications
        return view('notifications.index', compact('notifications'));
    }
}
