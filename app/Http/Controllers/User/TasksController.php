<?php

namespace App\Http\Controllers\User;

use App\Models\Project;
use App\Models\Task;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function index(){
        $data['tasks']    = Task::where('user_id', Auth()->user()->id)->paginate(10);
        return view('user.tasks', $data);
    }

    public function taskTake($id){
        // find project the user wants
        $project = Project::find($id);
        $userLevel['name'] = '0';
        $training = 1;

        $level = auth()->user()->levels()->first();

        if ($project->active == 1){
            // check if the user level type matches project level type
            if ($level->types->name == $project->level->types->name && $level->name >= $project->level->name ){
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
            return redirect()->back()->with("error", "Project is not active");
        }


        if ($training == 1){
            $data = [
                'project_id'   => $project->id,
                'user_id'      => auth()->user()->id,
                'status'       => 'Started',
            ];
            $response = Task::create($data);

        }else{
            return redirect()->back()->with("error", "Your skills do not the project requirements.");
        }


        if ($response){
            return redirect()->route('admin.tasks.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
        return view('user.tasks');
    }
}
