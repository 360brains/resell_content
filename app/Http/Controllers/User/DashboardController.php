<?php

namespace App\Http\Controllers\User;

use App\Models\Level;
use App\Models\Task;
use App\Models\Transaction;
use App\Models\User_level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $user_id = auth()->user()->id;
        $data['totalEarned'] = 0;
        $tasks    = Task::where('user_id', $user_id)->where('status', 'approved')->get();
        foreach ($tasks as $task){
        $data['totalEarned'] = $data['totalEarned'] + $task->project->price;
        }
        $data['transactions']   = Transaction::where('user_id', $user_id)->get();
        $data['currentLevel']   = User_level::where('user_id', $user_id)->orderBy('created_at', 'desc')->take(1)->get();
        $myTask                 = Task::where('user_id', $user_id)->whereIn('status', array('started', 'extended', 'reworking'))->first();
        if (!is_null($myTask)){
        $myDate                 = strtotime($myTask->project->deadline);
        $now                    = strtotime(date("y-m-d h:i:s"));
        $diff                   = $myDate - $now;
        $data['currentTask']    = $myTask;
        $data['diff']           = $diff;
        }else{
            $data['currentTask'] = null;
            $data['diff']           = 0;
        }
        return view('user.dashboard', $data);
    }
}
