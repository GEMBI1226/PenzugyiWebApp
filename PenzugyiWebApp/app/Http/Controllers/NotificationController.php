<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        $notifications = session()->get('notifications', []);
        
        if (isset($notifications[$id])) {
            unset($notifications[$id]);
            session()->put('notifications', $notifications);
        }

        return back();
    }
}
