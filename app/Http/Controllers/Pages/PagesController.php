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

        $data['relatedProjects'] = Project::where('type_id', $data['project']->type->id)->where('level_id', $data['project']->level->id)->take(3)->get();
        return view('pages.project-details', $data);
    }


    public function pricing(){

        $data['levels']   = Level::get();
        return view('pages.pricing', $data);
    }

    public function tutorials(){

        return view('pages.tutorials');
    }

    public function trainings(){

        return view('pages.trainings');
    }

    public function howItWorks(){

    return view('pages.how-it-works');
}
}
