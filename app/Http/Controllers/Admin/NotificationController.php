<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index()
    {
        return view('admin.notifications');
    }
    public function markRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back()->with("success", "Completed Successfully.");
    }

}
