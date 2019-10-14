<?php

namespace App\Http\Controllers\User;

use App\Models\Level;
use App\Models\Transaction;
use App\Models\User_level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $user_id = auth()->user()->id;
        $data['totalEarned']    = Transaction::where('user_id', $user_id)->where('status', 'paid')->sum('amount');
        $data['transactions']   = Transaction::where('user_id', $user_id)->get();
        $data['currentLevel']   = User_level::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->take(1)->get();
        return view('user.dashboard', $data);
    }
}
