<?php

namespace App\Http\Controllers\Admin;

use App\Models\User_test;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserTestController extends Controller
{
    public function userTests(){
        $data['tests'] = User_test::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.user-test.tests', $data);
    }
    public function showTest($userId, $testId){
        $data['test'] = User_test::where('user_id', $userId)->where('test_id', $testId)->first();
        return view('admin.user-test.show', $data);
    }


    public function evaluate(Request $request, $userId, $testId){
        $test = User_test::where('user_id', $userId)->where('test_id', $testId)->first();
        $user = User::where('id', $userId)->first();
        if ($request->action == 'approved'){

            $testData = [
              'status' => 'passed',
            ];

            if ($test->test->types->name == 'Content Writing'){
                $user->writing_level = 1;
                $user->save();
            }
            elseif ($test->test->types->name == 'Video Making'){
                $user->video_level = 1;
                $user->save();
            }
            $response = $user->tests()->updateExistingPivot($testId, $testData);
        }

        elseif ($request->action == 'rejected'){
            $testData = [
                'status' => 'failed',
            ];
            $response = $user->tests()->updateExistingPivot($testId, $testData);

        }

        if ($response){
            return redirect()->back()->withInput($request->all())->with("success", "Completed successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }
}
