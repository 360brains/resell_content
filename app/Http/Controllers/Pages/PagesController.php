<?php

namespace App\Http\Controllers\Pages;

use App\Models\Category;
use App\Models\Level;
use App\Models\Project;
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
        $data['projects']   = Project::paginate(6);
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
        return view('pages.project-details', $data);
    }
}
