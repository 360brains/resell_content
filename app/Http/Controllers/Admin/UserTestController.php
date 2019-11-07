<?php

namespace App\Http\Controllers\Admin;

use App\Models\User_test;
use App\Notifications\TaskResult;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserTestController extends Controller
{
    public function userTests(){
        $data['tests'] = User_test::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.user-test.tests', $data);
    }
    public function showTest($id){
        $data['test'] = User_test::where('id', $id)->first();
        return view('admin.user-test.show', $data);
    }


    public function evaluate(Request $request, $id){
        $test = User_test::where('id', $id)->first();
        $user = User::where('id', $test->user->id)->first();
        if ($request->action == 'approved'){

            $testData = [
              'status' => 'passed',
            ];

            if ($test->test->types->name == 'Content Writing'){
                $user->writing_level = 'Intro';
                $user->writing_points = $user->writing_points + 10;

                $user->save();
            }
            elseif ($test->test->types->name == 'Video Making'){
                $user->video_level  = 'Intro';
                $user->video_points = $user->video_points + 10;
                $user->save();
            }

            $response = $test->update($testData);
//            $response = $user->tests()->updateExistingPivot($test->id, $testData);

            $details = [
                'taskName'      => $test->name,
                'date'          => now(),
                'message'       => 'Congratulations! Your test is approved.',
                'tooltip'       => 'Now you can take tasks of your level',
                'link'          => "<a href=".route("pages.projects")." class=\'d-inline\'>Projects</a>",
            ];
            $user->notify(new TaskResult($details));
        }

        elseif ($request->action == 'rejected'){
            $testData = [
                'status' => 'failed',
            ];

            $response = $test->update($testData);
//            $response = $user->tests()->updateExistingPivot($test->id, $testData);

            $details = [
                'taskName'      => $test->name,
                'date'          => now(),
                'message'       => 'Your test is rejected. Try again.',
                'tooltip'       => 'Go to dashboard to take the test again.',
                'link'          => "<a href=".route("user.dashboard")." class=\'d-inline\'>Dashboard</a>",
            ];
            $user->notify(new TaskResult($details));

        }

        $response = $test->update($testData);

        if ($response){
            return redirect()->back()->withInput($request->all())->with("success", "Completed successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }
}
