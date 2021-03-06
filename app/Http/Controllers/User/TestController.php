<?php

namespace App\Http\Controllers\User;

use App\Models\Level;
use App\Models\Test;
use App\Models\User_test;
use App\Notifications\EmailUser;
use App\Notifications\TaskResult;
use Bitfumes\Multiauth\Model\Admin;
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

//        $test       = Test::where('level_id', $levels->id)->where('type_id', 2)->get()->random(1)->first();
        // query above is for tests of different levels.
        $lastTest = null;
        if(count(auth()->user()->lastVideoTest) > 0){
            foreach(auth()->user()->lastVideoTest as $t){
                $lastid     = $t->id;
                $test       = Test::where('id', '!=' , $lastid)->where('type_id', 2)->get()->random(1)->first();
            }
        }else{
            $test       = Test::where('type_id', 2)->get()->random(1)->first();
        }

        $data['test'] = $test;

        $user_test = new User_test();
        $user_test->user_id     = auth()->user()->id;
        $user_test->test_id     = $test->id;
        $user_test->status      = 'started';
        $user_test->deadline    = now()->addHours($test->deadline);
        $response               = $user_test->save();

        $details = [
            'taskName'      => $test->name,
            'date'          => now(),
            'message'       => 'You have been assigned a video making test.',
            'tooltip'       => '',
            'link'          => "",
        ];
        $emailDetails = [
            'message'       => 'You have been assigned a video making test. You will have to complete it to get tasks and start earning.',
            'url'          => route("user.dashboard"),
            'urlText'      => 'Dashboard',
        ];
        auth()->user()->notify(new TaskResult($details));

        if (!is_null(auth()->user()->setting)) {
            if (auth()->user()->setting->task_updates == 0) {
                auth()->user()->notify(new EmailUser($emailDetails));
            }
        }else{
            auth()->user()->notify(new EmailUser($emailDetails));
        }

//        return view('user.video-test', $data);
        return redirect()->route('user.tests.video.test');

    }

    public function writingTest(){
        $levels     = Level::where('name', 'Zero')->first();

        foreach (auth()->user()->tests as $UserTest){
            if ($UserTest->pivot->status == 'started' && $UserTest->levels->name == 'Zero' && $UserTest->types->name == 'Content Writing'){
                $data['test'] = $UserTest;
                return view('user.writing-test', $data);
            }
        }

        $lastTest = null;
        if(count(auth()->user()->lastWritingTest) > 0){
            foreach(auth()->user()->lastWritingTest as $t){
                $lastid     = $t->id;
                $test       = Test::where('id', '!=' , $lastid)->where('type_id', 1)->get()->random(1)->first();
            }
        }else{
            $test           = Test::where('type_id', 1)->get()->random(1)->first();
        }

        // $test       = Test::where('level_id', $levels->id)->where('type_id', 1)->get()->random(1)->first();
        // query above is for tests of different levels.

        $user_test          = new User_test();
        $user_test->user_id = auth()->user()->id;
        $user_test->test_id = $test->id;
        $user_test->status  = 'started';
        $user_test->deadline= now()->addHours($test->deadline);
        $response           = $user_test->save();

        $data['test'] = User_test::where('id', $user_test->id)->first();

        $details = [
            'taskName'      => $test->name,
            'date'          => now(),
            'message'       => 'You have been assigned a writing test.',
            'tooltip'       => '',
            'link'          => "",
        ];
        $emailDetails = [
            'message'       => 'You have been assigned a writing test. You will have to complete it to get tasks and start earning.',
            'url'          => route("user.dashboard"),
            'urlText'      => 'Dashboard',
        ];
        auth()->user()->notify(new TaskResult($details));

        if (!is_null(auth()->user()->setting)) {
            if (auth()->user()->setting->task_updates == 0) {
                auth()->user()->notify(new EmailUser($emailDetails));
            }
        }else{
            auth()->user()->notify(new EmailUser($emailDetails));
        }

        return redirect()->route('user.tests.writing.test');
//        return view('user.writing-test', $data);
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
                'taskName'      => Test::where('id', $id)->select('name')->first(),
                'date'          => now(),
                'message'       => 'You might have to wait for 2 days for approval.',
                'tooltip'       => 'Keep checking for result notification.',
                'link'          => "",
            ];
            $emailDetails = [
                'message'       => 'You might have to wait for 2 days for your writing test approval. Keep checking for result notification.',
                'url'          => route("user.dashboard"),
                'urlText'      => 'Dashboard',
            ];
            auth()->user()->notify(new TaskResult($details));

            if (!is_null(auth()->user()->setting)) {
                if (auth()->user()->setting->task_updates == 0) {
                    auth()->user()->notify(new EmailUser($emailDetails));
                }
            }else{
                auth()->user()->notify(new EmailUser($emailDetails));
            }

            $adminDetails = [
                'taskName'      => Test::where('id', $id)->select('name')->first(),
                'date'          => now(),
                'message'       => "<a href=".route("admin.users.show", $test->user->id)." class='d-inline'>". $test->user->name . "</a><a href=".route("admin.user.test.show", $test->id)." class='d-inline'> delivered a test.</a>",

                'tooltip'       => 'Test',
                'link'          => "<a href=".route("admin.user.test.show", $test->id)." class='d-inline'>View test</a>",
            ];

            $admins = Admin::all();
            foreach ($admins as $admin) {
                $admin->notify(new TaskResult($adminDetails));
            }

            if ($response){
                return redirect()->route('user.dashboard')->with("success", "Completed successfully.");
            }else{
                return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
            }
        }
        if ($request->action == 'video'){

            $request->validate([
                'video'         => 'required|mimes:mp4,3gp,mkv,flv',
            ]);

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
                    'message'       => 'You might have to wait for 2 days for approval.',
                    'tooltip'       => 'You can Take more tasks during the waiting period. ',
                    'link'          => "<a href=".route("pages.projects")." class=\'d-inline\'>Take More</a>",
                ];

                auth()->user()->notify(new TaskResult($details));

                $adminDetails = [
                    'taskName'      => Test::where('id', $id)->select('name')->first(),
                    'date'          => now(),
                    'message'       => "<a href=".route("admin.users.show", $test->user->id)." class='d-inline'>". $test->user->name . "</a><a href=".route("admin.user.test.show", $test->id)." class='d-inline'> delivered a test.</a>",
                    'tooltip'       => 'Test',
                    'link'          => "<a href=".route("admin.user.test.show", $test->id)." class='d-inline'>View task</a>",
                ];
                $admins = Admin::all();
                foreach ($admins as $admin) {
                    $admin->notify(new TaskResult($adminDetails));
                }

                if ($response){
                    return redirect()->route('user.dashboard')->with("success", "Completed successfully.");
                }else{
                    return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
                }
            }

        }
    }

}
