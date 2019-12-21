<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use App\Models\Level;
use App\Models\Project;
use App\Models\Task;
use App\Models\TimeExtend;
use App\Models\Type;
use App\Notifications\EmailUser;
use App\Notifications\TaskResult;
use App\User;
use Bitfumes\Multiauth\Model\Admin;
use Bitfumes\Multiauth\Model\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function index(){
        $data['totalWritings'] = 0;
        $data['totalVideos'] = 0;
        $data['reworking'] = 0;
        $data['delivered'] = 0;
        $data['rejected'] = 0;

        $data['tasks']    = Task::where('user_id', Auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);

        foreach ($data['tasks'] as $task){
            if ($task->status == 'approved'){
                if ($task->project->type_id == 1){
                    $data['totalWritings'] = $data['totalWritings'] + 1;
                }
                elseif($task->project->type_id == 2){
                    $data['totalVideos'] = $data['totalVideos'] + 1;
                }
            }
            if ($task->status == 'delivered'){
                $data['delivered'] = $data['delivered'] + 1;
            }
            if ($task->status == 'reworking'){
                $data['reworking'] = $data['reworking'] + 1;
            }
            if ($task->status == 'rejected'){
                $data['rejected'] = $data['rejected'] + 1;
            }
        }

        return view('user.tasks', $data);
    }

    public function taskTake($id){
        // find project the user wants
        $project = Project::find($id);
        $training = 1;
        $isWorking = 0;

        foreach (auth()->user()->tasks as $task){
            if ($task->status == 'started' OR $task->status == 'extended' OR $task->status == 'reworking'){
                return redirect()->route('user.tasks')->with("error", "You already have a task. Complete it to get more.");
            }
        }

        if ($project->active == 1 && $project->available > 0){

            if(!is_null(auth()->user()->memberships()->where('name', 'Premium')->where('status', 'Bought')->first())){

                $training = 1;

            }elseif($project->special == 1 && auth()->user()->special == 1){

                $training = 1;

            }else{
                // check if the user level type matches project level type
                if ( ($project->type->name == 'Content Writing' &&
                        $project->level->name == auth()->user()->writing_level) OR
                    ($project->type->name == 'Video Making' &&
                        $project->level->name == auth()->user()->video_level) ){

                    // check if the user trainings matches project required trainings
                    foreach ($project->trainings as $projectTraining){
                        foreach (auth()->user()->trainings as $userTraining){
                            if ($projectTraining->name == $userTraining->name){
                                $training = 1;
                                break;
                            }else{
                                $training = 0;
                            }
                        }
                    }
                }else{
                    return redirect()->back()->with("error", "Your skills do not match project requirements");
                }
            }

        }else{
            return redirect()->back()->with("error", "Project is not available");
        }



        if ($training == 1){

            $data = [
                'project_id'   => $id,
                'user_id'      => auth()->user()->id,
                'status'       => 'Started',
                'deadline'     => now()->addHours($project->deadline),
            ];

            if ($project->template_id != null){
                $data['body']       = $project->template->body;
            }
            $status = [
                'name'       => 'Started',
            ];
            $available = [
                'available'       => $project->available - 1,
            ];

            $project->update($available);
            $task       = Task::create($data);
            $response   = $task->statuses()->create($status);

            $details = [
                'taskName'      => $project->name,
                'date'          => now(),
                'message'       => 'Congratulations! You have been assigned a task',
                'tooltip'       => '',
                'link'          => "<a href=".route("user.tasks")." class=\'d-inline\'>Details</a>",
            ];

            $task->user->notify(new TaskResult($details));

        }else{
            return redirect()->back()->with("error", "You do not have the required trainings.");
        }


        if ($response){
            return redirect()->route('user.tasks')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
        return view('user.tasks');
    }

    public function work(){
        return view('user.work');
    }

    public function saveProgress(Request $request, $id){
        $task = Task::find($id);

        if ($request->action == 'submit'){
            $task->body     = $request->body;
            $task->status   = 'delivered';
            $response       = $task->save();

            $data = [
                'name' => 'delivered',
            ];
            $task->statuses()->create($data);

            $details = [
                'taskName'      => $task->project->name,
                'date'          => now(),
                'message'       => 'Your task is delivered and awaiting result.',
                'tooltip'       => ' You will get result notification soon',
                'link'          => "<a href=".route("pages.projects")." class=\'d-inline\'>Take More</a>",
            ];
            $task->user->notify(new TaskResult($details));

            $adminDetails = [
                'taskName'      => $task->project->id,
                'date'          => now(),
                'message'       => "<a href=".route("admin.users.show", $task->user->id)." class='d-inline'>". $task->user->name . "</a><a href=".route("admin.tasks.show", $task->id)." class='d-inline'> delivered a task.</a>",
                'tooltip'       => 'Task',
                'link'          => "<a href=".route("admin.tasks.show", $task->id)." class='d-inline'>View task</a>",
            ];
            $admins = Admin::all();
            foreach ($admins as $admin) {
                $admin->notify(new TaskResult($adminDetails));
            }
        }

        elseif ($request->action == 'video'){

            if ($request->hasFile("video") && $request->file('video')->isValid()) {
                $filename           = $request->file('video')->getClientOriginalName();
                $filename           = time()."-".$filename;
                $destinationPath    = public_path('/videos');
                $task->video       = "videos/".$filename;
                $request->file('video')->move($destinationPath, $filename);
                $task->status   = 'delivered';
                $response       = $task->save();

                $data = [
                    'name' => 'delivered',
                ];
                $task->statuses()->create($data);

                $details = [
                    'taskName'      => $task->project->name,
                    'date'          => now(),
                    'message'       => 'Your task is delivered and awaiting result.',
                    'tooltip'       => ' You will get result notification soon',
                    'link'          => "<a href=".route("pages.projects")." class=\'d-inline\'>Take More</a>",
                ];
                $task->user->notify(new TaskResult($details));

                $adminDetails = [
                    'taskName'      => $task->project->id,
                    'date'          => now(),
                    'message'       => "<a href=".route("admin.users.show", $task->user->id)." class='d-inline'>". $task->user->name . "</a><a href=".route("admin.tasks.show", $task->id)." class='d-inline'> delivered a task.</a>",
                    'tooltip'       => 'Task',
                    'link'          => "<a href=".route("admin.tasks.show", $task->id)." class='d-inline'>View task</a>",
                ];
                $admins = Admin::all();
                foreach ($admins as $admin) {
                    $admin->notify(new TaskResult($adminDetails));
                }

            }

        }else{
            $task->body         = $request->body;
            $response           = $task->save();
        }

        if ($response){
            return redirect()->route('user.tasks')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }

    }

    public function projects(Request $request){

        $level              = $request->level;
        $category           = $request->category;
        $type               = $request->type;
        $price              = $request->price;
//        $account            = $request->account;
        $data['projects']   = Project::where('active', 1)->where('special', 0)->where('available', '>', 0)->whereNotNull('id');
        $data['categories'] = Category::with('projects')->get();
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

        return view('user.projects', $data);
    }

    public function extendTime(Request $request, $id){
        if ($request->time > 0 && $request->time < 48){
            $task = Task::find($id);
            $data = [
                'reason'  => $request->reason,
                'time'    => $request->time,
                'status'  => 'Requested',
                'task_id' => $task->id,
            ];

            $response = TimeExtend::create($data);

            $details = [
                'taskName'      => $task->project->name,
                'date'          => now(),
                'message'        => 'Your time extension request is waiting approval.',
                'tooltip'       => 'You will get notified when the request is approved.',
                'link'          => "<a href=".route("user.tasks")." class=\'d-inline\'>My tasks</a>",
            ];

            $adminDetails = [
                'taskName'      => $task->project->id,
                'date'          => now(),
                'message'       => "<a href=".route("admin.users.show", $task->user->id)." class='d-inline'>". $task->user->name . "</a><a href=".route("admin.tasks.show", $task->id)." class='d-inline'> requested time extension.</a>",
                'tooltip'       => 'Time Extension',
                'link'          => "<a href=".route("admin.tasks.show", $task->id)." class='d-inline'>View request</a>",
            ];

            $task->user->notify(new TaskResult($details));

            $admins = Admin::all();
            foreach ($admins as $admin) {
                $admin->notify(new TaskResult($adminDetails));
            }

            if ($response){
                return redirect()->route('user.tasks')->with("success", "Completed Successfully.");
            }else{
                return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
            }
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Requested time must be between 1 to 48 hours.");
        }
    }

}
