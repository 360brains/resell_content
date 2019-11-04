<?php

namespace App\Http\Controllers\User;

use App\Models\Project;
use App\Models\Task;
use App\Notifications\TaskResult;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function index(){
        $data['tasks']    = Task::where('user_id', Auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('user.tasks', $data);
    }

    public function taskTake($id){
        // find project the user wants
        $project = Project::find($id);
        $training = 1;
        $isWorking = 0;

        foreach (auth()->user()->tasks as $task){
            if ($task->status == 'started' OR $task->status == 'extended' OR $task->status == 'reworking'){
                return redirect()->route('user.tasks')->with("error", "You already have a task. Complete it to get more.");
            }
        }

        if ($project->active == 1 && $project->available > 0){
            // check if the user level type matches project level type
            if ( ($project->type->name == 'Content Writing' &&
                 $project->level->name == auth()->user()->writing_level) OR
                 ($project->type->name == 'Video Making' &&
                 $project->level->name == auth()->user()->video_level) ){


                // check if the user trainings matches project required trainings
                foreach ($project->trainings as $projectTraining){
                    foreach (auth()->user()->trainings as $userTraining){
                        if ($projectTraining->name == $userTraining->name){
                            $training = 1;
                            break;
                        }else{
                            $training = 0;
                        }
                    }
                }
            }else{
                return redirect()->back()->with("error", "Your skills do not match project requirements");
            }
        }else{
            return redirect()->back()->with("error", "Project is not available");
        }

        if ($training == 1){

            $data = [
                'project_id'   => $id,
                'user_id'      => auth()->user()->id,
                'status'       => 'Started',
            ];
            if ($project->template_id != null){
                $data['body']       = $project->template->body;
            }
            $status = [
                'name'       => 'Started',
            ];
            $available = [
                'available'       => $project->available - 1,
            ];

            $project->update($available);
            $task       = Task::create($data);
            $response   = $task->statuses()->create($status);

            $details = [
                'taskName'      => $project->name,
                'date'          => now(),
                'message'        => 'Congratulations! You have been assigned a task'
            ];
            $task->user->notify(new TaskResult($details));

        }else{
            return redirect()->back()->with("error", "You do not have the required trainings.");
        }


        if ($response){
            return redirect()->route('user.tasks')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
        return view('user.tasks');
    }

    public function work(){
        return view('user.work');
    }

    public function saveProgress(Request $request, $id){
        $task = Task::find($id);

        if ($request->action == 'submit'){
            $task->body     = $request->body;
            $task->status   = 'delivered';
            $response       = $task->save();

            $data = [
                'name' => 'delivered',
            ];
            $task->statuses()->create($data);
        }

//        elseif ($request->action == 'admin-save'){
//            $task->body     = $request->body;
//            $response       = $task->save();
//
//            if ($response){
//                return redirect()->back()->with("success", "Completed Successfully.");
//            }else{
//                return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
//            }
//        }

        elseif ($request->action == 'video'){

            if ($request->hasFile("video") && $request->file('video')->isValid()) {
                $filename           = $request->file('video')->getClientOriginalName();
                $filename           = time()."-".$filename;
                $destinationPath    = public_path('/videos');
                $task->video       = "videos/".$filename;
                $request->file('video')->move($destinationPath, $filename);
                $task->status   = 'delivered';
                $response       = $task->save();

                $data = [
                    'name' => 'delivered',
                ];
                $task->statuses()->create($data);
            }

        }else{
            $task->body         = $request->body;
            $response           = $task->save();
        }

        if ($response){
            return redirect()->route('user.tasks')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }

    }
}
