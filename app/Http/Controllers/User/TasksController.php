<?php

namespace App\Http\Controllers\User;

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
}
