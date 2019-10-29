<?php

namespace App\Http\Controllers\User;

use App\Models\Level;
use App\Models\Test;
use App\Models\User_test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function writingTest(){
        foreach (auth()->user()->tests as $UserTest){
            if ($UserTest->pivot->status == 'started' && $UserTest->levels->name == 'Zero'){
                $data['test'] = $UserTest;
                return view('user.writing-test', $data);
            }
        }

        $levels     = Level::where('name', 'Zero')->where('type_id', 1)->first();
        $tests      = Test::where('level_id', $levels->id)->get();
        $count      = count($tests);
        $rand_num   = mt_rand (1,$count);
        $i          = 1;
        $test       = null;
        foreach ($tests as $t){
            if ($i == $rand_num){
                $test = $t;
                break;
            }
        }
        $data['test'] = $test;

        $user_test = new User_test();
        $user_test->user_id = auth()->user()->id;
        $user_test->test_id = $test->id;
        $user_test->status  = 'started';
        $response           = $user_test->save();

//      orderByRaw("RAND()");
        return view('user.writing-test', $data);
    }

    public function videoTest(){
        return view('user.video-test');
    }
}
