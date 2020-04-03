<?php

namespace App\Http\Controllers\Apis;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function tasks()
    {
        $tasks          = Task::where('user_id', Auth()->user()->id)->orderBy('created_at', 'desc')->with('project')->paginate(10);
//        $currentTask    = Task::where('user_id', Auth()->user()->id)->where('status', ['started', 'extended'])->first();

        if ($tasks->count() < 0){
            return response()->json(['message' => 'No current or previous tasks found. Please go to our website to get tasks.'], 200);
        }
        else{
            return response()->json(['tasks' => $tasks], 200);
        }
    }
}
