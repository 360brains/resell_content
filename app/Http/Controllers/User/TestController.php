<?php

namespace App\Http\Controllers\User;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function writingTest(){
        $test = Test::where('level', 0)->random(1)->;
        return view('user.writing-test');
    }
    public function videoTest(){
        return view('user.video-test');
    }
}
