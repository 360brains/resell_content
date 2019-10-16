<?php

namespace App\Http\Controllers\User;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function index(){
        $data['tasks']    = Task::where('user_id', Auth()->user()->id)->with('statuses')->paginate(10);
        return view('user.tasks', $data);
    }

    public function taskTake($id){
        // find project the user wants
        $project = Project::find($id);
        $userLevel['name'] = 0;
        $training = 1;

        // check if the user level type matches project level type
        foreach (auth()->user()->levels as $level){
            if ($level->type->name == $project->level->type->name && $level->name >= $userLevel->name ){
                $userLevel = $level;
            }
        }
        if ($project->status == 'active' && $project->level->name == $userLevel->name){
            // check if the user trainings matches project required trainings
            foreach ($project->trainings as $projectTraining){
                foreach (auth()->user()->trainings as $userTraining){
                    if ($projectTraining->training_id == $userTraining->training_id){
                        $training = 1;
                        break;
                    }
                    else{
                        $training = 0;
                    }
                }
            }
        }
        $request->validate([
            'name'          => 'required',
            'type'          => 'required',
            'description'   => 'required',
            'level'         => 'required',
        ]);

        $data = [
            'name'         => $request->name,
            'quantity'     => $request->quantity,
            'type_id'      => $request->type,
            'deadline'     => $request->deadline,
            'category_id'  => $request->category,
            'level_id'     => $request->level,
            'description'  => $request->description,
            'active'       => $request->active,
        ];

        $response = Task::create($data);

        if ($response){
            return redirect()->route('admin.tasks.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
        return view('user.tasks');
    }
}
