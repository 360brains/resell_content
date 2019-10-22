<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LearnController extends Controller
{
    public function index(){
        return view('user.learn');
    }
    public function learnDetails(){
        return view('user.learn-details');
    }
}
