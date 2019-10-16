<?php

namespace App\Http\Controllers\Pages;

use App\Models\Category;
use App\Models\Level;
use App\Models\Project;
use App\Models\Task;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function home(){
        //$data['NumProjects'] = Project::orderBy('category_id', 'desc')->take(8)->get();
        //$data['categories'] = Category::orderBy('name', 'desc')->take(8)->get();

        $data['categories'] = Category::with('projects')->get();
        $data['projects']   = Project::paginate(3);
        $data['tasks']      = Task::paginate(5);
        $data['types']      = Type::get();
        $data['levels']     = Level::get();

        return view('pages.welcome', $data);
    }
    public function projects(Request $request){

        $level              = $request->level;
        $category           = $request->category;
        $type               = $request->type;
        $data['projects']   = Project::whereNotNull('id');

        if (!is_null($level)){
            $data['projects']   = $data['projects']->where('level_id', $level);
        }
        if (!is_null($category)){
            $data['projects']   = $data['projects']->where('category_id', $category);
        }
        if (!is_null($type)){
            $data['projects']   = $data['projects']->where('type_id', $type);
        }

        $data['projects']   = $data['projects']->paginate(5);

        return view('pages.projects', $data);
    }
    public function projectDetails($id){
        $data['project'] = Project::find($id);
        //$project = $data['project'];
        //foreach ($project->trainings as $training) {
        //    echo $training->name;
        //}
        $data['relatedProjects'] = Project::where('type_id', $data['project']->type->id)->where('level_id', $data['project']->level->id)->take(3)->get();
        return view('pages.project-details', $data);
    }

    public function tasks(){

        $data['tasks']   = Task::paginate(10);

        return view('pages.tasks', $data);
    }

    public function taskDetails($id){
        $data['task'] = Task::find($id);
        $data['relatedTasks'] = task::
            where('type_id', $data['task']->type->id)->
            where('level_id', $data['task']->level->id)->
            where('id','!=',$data['task']->id)->take(3)->get();

        return view('pages.task-details', $data);
    }

    public function projectsByCategories($id){
        $data['projects']   = Project::where('category_id', $id)->paginate(10);
        return view('pages.projects', $data);
    }

    public function pricing(){

        $data['levels']   = Level::get();
        return view('pages.pricing', $data);
    }
}
