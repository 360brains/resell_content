<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Level;
use App\Models\Project;
use App\Models\Type;
use App\Models\Task;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tasks'] = Task::orderBy('status', 'asc')->paginate(10);
        return view('admin.tasks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['types']      = Type::where('active', 1)->get();
        $data['categories'] = Category::where('active', 1)->get();
        $data['levels']     = Level::where('active', 1)->get();

        return view("admin.tasks.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'type'          => 'required',
            'description'   => 'required',
            'level'         => 'required',
        ]);

        $data = [
            'name'         => $request->name,
            'quantity'     => $request->quantity,
            'type_id'      => $request->type,
            'deadline'     => $request->deadline,
            'category_id'  => $request->category,
            'level_id'     => $request->level,
            'description'  => $request->description,
            'active'       => $request->active,
        ];

        $response = Task::create($data);

        if ($response){
            return redirect()->route('admin.tasks.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserTask  $userTask
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $data['task'] = $task;
        return view('admin.tasks.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserTask  $userTask
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $data['types']      = Type::where('active', 1)->get();
        $data['categories'] = Category::where('active', 1)->get();
        $data['levels']     = Level::where('active', 1)->get();
        $data['task']       = $task;
        return view("admin.tasks.edit", $data);
    }

    /*
     *
     *
     */

    public function update(Request $request, Task $task){
        //Checking if the admin has approved the task and changing the task status.
        if ($request->action == 'approved'){
            $task->status           = 'approved';
            $task->awarded_points   = $task->project->points;
            $response               = $task->save();
            $points = 0;
            $levels = Level::get();

            //Updating user balance by adding amount of task.
            $userData['balance'] = $task->user->balance + $task->project->price;


            //updating user writing level and points if the project type is writing.
                if ($task->project->type->name == 'Content Writing'){
                    $userData['writing_points'] = $task->user->writing_points + $task->project->points;

                    foreach ($levels as $level){
                        if ($userData['writing_points'] >= $level->min_points && $userData['writing_points'] <= $level->max_points){
                            $userData['writing_level'] = $level->name;
                            break;
                        }
                    }
                }
                //updating user writing level and points if the project type is video.
                elseif ($task->project->type->name == 'Video Making'){
                    $userData['video_points'] = $task->user->video_points + $task->project->points;

                    foreach ($levels as $level){
                        if ($userData['video_points'] >= $level->min_points && $userData['video_points'] <= $level->max_points){
                            $userData['video_level'] = $level->name;
                            break;
                        }
                    }
            }
            $response = User::where('id', $task->user_id)->update($userData);

            $taskData = ['name' => 'approved',];
            $task->statuses()->create($taskData);

        }
        //Checking if the admin has rejected the task and changing the task status.
        elseif($request->action == 'rejected'){
            $task->status   = 'rejected';
            $response       = $task->save();

            $taskData = ['name' => 'rejected',];
            $task->statuses()->create($taskData);

            $projectData['available'] = $task->project->available + 1;
            Project::where('id', $task->project_id)->update($projectData);
        }
        elseif($request->action == 'rework'){
            $task->status   = 'reworking';
            $response       = $task->save();

            $taskData = ['name' => 'reworking',];
            $task->statuses()->create($taskData);
        }

        if ($response){
            return redirect()->route('admin.projects.show', $task->project->id)->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }

    }

    /*
     *
     *
     */

    public function destroy(Task $task)
    {
        $task->active   = $task->active == 0 ? 1 : 0;
        $response       = $task->save();

        if ($response){
            return redirect()->route('admin.tasks.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
    }
}
