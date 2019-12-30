<?php

namespace App\Http\Controllers\Pages;

use App\Models\Category;
use App\Models\Level;
use App\Models\Project;
use App\Models\Task;
use App\Models\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function home(){
        $data['categories']     = Category::orderBy('name', 'desc')->take(8)->get();
        $data['totalJobs']      = Project::sum('quantity');
        $data['totalWriters']   = User::count();
        $data['totalWork']      = Task::where('status', 'approved')->count();
        $data['categories'] = Category::with('projects')->get();
        $data['projects']   = Project::where('active', 1)->paginate(3);
        $data['types']      = Type::where('active', 1)->get();
        $data['levels']     = Level::where('active', 1)->get();

        return view('pages.welcome', $data);
    }
    public function projects(Request $request){
        $level              = $request->level;
        $category           = $request->category;
        $type               = $request->type;
        $price              = $request->price;
//        $account            = $request->account;
        $data['projects']   = Project::where('active', 1)->where('special', 0)->where('available', '>', 0)->whereNotNull('id');
        $data['categories'] = Category::where('active', 1)->with('projects')->get();
        $data['types']      = Type::where('active', 1)->get();
        $data['levels']     = Level::where('active', 1)->get();

        if (!is_null($level)){
            $data['projects']   = $data['projects']->where('level_id', $level);
        }
        if (!is_null($category)){
            $data['projects']   = $data['projects']->where('category_id', $category);
        }
        if (!is_null($type)){
            $data['projects']   = $data['projects']->where('type_id', $type);
        }
//        if (!is_null($account)){
//            if ($account == 'Free'){
//                $data['projects']   = $data['projects']->where('premium', 1);
//            }elseif($account == 'Premium'){
//                $data['projects']   = $data['projects']->where('premium', 0);
//            }
//            $data['projects']   = $data['projects']->where('type_id', $type);
//        }
        if (!is_null($price)){
            switch ($price) {
                case '0-100':

                    $data['projects']   = $data['projects']->whereBetween('price', [0, 100]);
                    break;
                case '101-200':

                    $data['projects']   = $data['projects']->whereBetween('price', [101, 200]);
                    break;
                case '201-500':

                    $data['projects']   = $data['projects']->whereBetween('price', [201, 500]);
                    break;
                case '501-1000':

                    $data['projects']   = $data['projects']->whereBetween('price', [501, 1000]);
                    break;
                case '1000-more':

                    $data['projects']   = $data['projects']->where('price', '>', 1000);
                    break;
                default:

                    $data['projects']   = $data['projects']->where('price', '>=', 0);
            }
        }

        $data['projects']   = $data['projects']->orderBy('created_at', 'desc')->paginate(9);

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
    public function inactive(){

        return view('user.inactive');
    }
}
