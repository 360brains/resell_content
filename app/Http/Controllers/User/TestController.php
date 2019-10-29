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
        $levels     = Level::where('name', 'Zero')->where('type_id', 1)->first();

        foreach (auth()->user()->tests as $UserTest){
            if ($UserTest->pivot->status == 'started' && $UserTest->levels->name == 'Zero'){
                $data['test'] = $UserTest;
                return view('user.writing-test', $data);
            }
        }

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

    public function saveProgress(Request $request, $id){
        $test = User_test::where('user_id', auth()->user()->id)->where('status', 'started')->where('test_id', $id)->first();

        if ($request->action == 'save'){
            $data = [
                'body' => $request->body,
            ];

            $response = auth()->user()->tests()->updateExistingPivot($id, $data);

            if ($response){
                return redirect()->back()->withInput($request->all())->with("success", "Completed successfully.");
            }else{
                return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
            }
        }
        if ($request->action == 'submit'){
            $data = [
                'body'      => $request->body,
                'status'    => 'completed',
            ];

            $response = auth()->user()->tests()->updateExistingPivot($id, $data);

            if ($response){
                return redirect()->route('user.dashboard')->with("success", "Completed successfully.");
            }else{
                return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
            }
        }
    }

    public function videoTest(){
        return view('user.video-test');
    }
}
