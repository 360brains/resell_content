<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['projects']   = Project::where('active', 1)->where('special', 0)->where('available', '>', 0)->whereNotNull('id');
        $data['categories'] = Category::where('active', 1)->get();
        return view('pages.welcome' , $data);
    }
}
