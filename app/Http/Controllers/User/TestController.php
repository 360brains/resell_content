<?php

namespace App\Http\Controllers\User;

use App\Models\Level;
use App\Models\Test;
use App\Models\User_test;
use App\Notifications\TaskResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function videoTest(){
        $levels     = Level::where('name', 'Zero')->first();

        foreach (auth()->user()->tests as $UserTest){
            if ($UserTest->pivot->status == 'started' && $UserTest->levels->name == 'Zero' &&  $UserTest->types->name == 'Video Making'){
                $data['test'] = $UserTest;
                return view('user.video-test', $data);
            }
        }

        $test       = Test::where('level_id', $levels->id)->where('type_id', 2)->get()->random(1)->first();

        $data['test'] = $test;

        $user_test = new User_test();
        $user_test->user_id = auth()->user()->id;
        $user_test->test_id = $test->id;
        $user_test->status  = 'started';
        $response           = $user_test->save();

        $details = [
            'taskName'      => $test->name,
            'date'          => now(),
            'message'       => 'You have been assigned a video making test.'
        ];
        auth()->user()->notify(new TaskResult($details));

        return view('user.video-test', $data);
    }

    public function writingTest(){
        $levels     = Level::where('name', 'Zero')->first();

        foreach (auth()->user()->tests as $UserTest){
            if ($UserTest->pivot->status == 'started' && $UserTest->levels->name == 'Zero' && $UserTest->types->name == 'Content Writing'){
                $data['test'] = $UserTest;
                return view('user.writing-test', $data);
            }
        }

        $test       = Test::where('level_id', $levels->id)->where('type_id', 1)->get()->random(1)->first();

        $user_test          = new User_test();
        $user_test->user_id = auth()->user()->id;
        $user_test->test_id = $test->id;
        $user_test->status  = 'started';
        $response           = $user_test->save();

//kljh
        $data['test'] = User_test::where('id', $user_test->id)->first();

        $details = [
            'taskName'      => $test->name,
            'date'          => now(),
            'message'       => 'You have been assigned a writing test.'
        ];
        auth()->user()->notify(new TaskResult($details));

        return view('user.writing-test', $data);
    }

    public function saveProgress(Request $request, $id){
        $test = User_test::where('id', $id)->first();

        if ($request->action == 'save'){
            $data = [
                'body' => $request->body,
            ];

//            $response = auth()->user()->tests()->updateExistingPivot($id, $data);
            $response = $test->update($data);


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

//            $response = auth()->user()->tests()->updateExistingPivot($id, $data);
            $response = $test->update($data);


            $details = [
                'taskName'      => Test::where('id', $id)->first(),
                'date'          => now(),
                'message'       => 'You might have to wait for 2 days for approval.'
            ];
            auth()->user()->notify(new TaskResult($details));

            if ($response){
                return redirect()->route('user.dashboard')->with("success", "Completed successfully.");
            }else{
                return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
            }
        }
        if ($request->action == 'video'){

            if ($request->hasFile("video") && $request->file('video')->isValid()) {
                $filename           = $request->file('video')->getClientOriginalName();
                $filename           = time()."-".$filename;
                $destinationPath    = public_path('/videos');
                $videoName          = "videos/".$filename;
                $request->file('video')->move($destinationPath, $filename);

                $data = [
                    'video'      => $videoName,
                    'status'    => 'completed',
                ];
//                $response = auth()->user()->tests()->updateExistingPivot($id, $data);
                $response = $test->update($data);


                $details = [
                    'taskName'      => Test::where('id', $id)->select('name')->first(),
                    'date'          => now(),
                    'message'       => 'You might have to wait for 2 days for approval.'
                ];
                auth()->user()->notify(new TaskResult($details));

                if ($response){
                    return redirect()->route('user.dashboard')->with("success", "Completed successfully.");
                }else{
                    return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
                }
            }

        }
    }

}
