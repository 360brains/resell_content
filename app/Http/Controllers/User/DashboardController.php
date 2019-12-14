<?php

namespace App\Http\Controllers\User;

use App\Models\Membership;
use App\Models\Level;
use App\Models\Project;
use App\Models\Task;
use App\Models\Transaction;
use App\Models\UserLevel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $user_id = auth()->user()->id;
        $data['totalEarned'] = 0;
        $data['earnedLastYear'] = 0;
        $data['earnedLastMonth'] = 0;
        $totalVideoTasks = 0;
        $totalWritingTasks = 0;
        $lastYearTasks = Task::where('user_id', $user_id)->where('status', 'approved')->where('created_at', '>=', Carbon::now()->startOfYear())->get();
        $lastMonthTasks = Task::where('user_id', $user_id)->where('status', 'approved')->where('created_at', '>=', Carbon::now()->startOfMonth())->get();
        foreach ($lastYearTasks as $task){
            $data['earnedLastYear'] = $data['earnedLastYear'] + $task->project->price;
        }
        foreach ($lastMonthTasks as $task){
            $data['earnedLastMonth'] = $data['earnedLastMonth'] + $task->project->price;
        }
        $tasks    = Task::where('user_id', $user_id)->where('status', 'approved')->get();
        $data['tasks']    = Task::where('user_id', Auth()->user()->id)->orderBy('created_at', 'desc')->limit(6)->get();
        $data['membership'] = Membership::where('name', 'Premium')->first();
        $approvedTasks    = Task::where('user_id', Auth()->user()->id)->where('status', 'approved')->get();
        foreach ($approvedTasks as $task){
            if ($task->project->type_id == 2){
                $totalVideoTasks = $totalVideoTasks + 1 ;
            }
            if ($task->project->type_id == 1){
                $totalWritingTasks = $totalWritingTasks + 1 ;
            }
        }
        $data['totalVideoTasks'] = $totalVideoTasks ;
        $data['totalWritingTasks'] = $totalWritingTasks ;


        foreach ($tasks as $task){
        $data['totalEarned'] = $data['totalEarned'] + $task->project->price;
        }
        $data['transactions']   = Transaction::where('user_id', $user_id)->get();
        $data['currentLevel']   = UserLevel::where('user_id', $user_id)->orderBy('created_at', 'desc')->take(1)->get();
        $myTask                 = Task::where('user_id', $user_id)->whereIn('status', array('started', 'extended', 'reworking'))->first();
        if (!is_null($myTask)){
        $myDate                 = strtotime($myTask->project->deadline);
        $now                    = strtotime(date("y-m-d h:i:s"));
        $diff                   = $myDate - $now;
        $data['currentTask']    = $myTask;
        $data['diff']           = $diff;
        $data['taskTime']       = $data['diff'];
        }else{
        $data['currentTask']    = null;
        $data['diff']           = 0;
        }

        $data['currentMembership'] = null;
        foreach (auth()->user()->currentMembership as $membership){
            $data['currentMembership'] = $membership;
        }

        return view('user.dashboard', $data);
    }
}
