<?php

namespace App\Console\Commands;

use App\Models\Membership_user;
use App\Models\Task;
use App\Models\User_test;
use App\Notifications\EmailUser;
use App\Notifications\TaskResult;
use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Console\Command;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It will manage tasks';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tasks          = Task::whereIn('status', array('started', 'extended', 'reworking'))->get();
        $tests          = User_test::where('status', 'started')->get();
        $memberships    = Membership_user::where('status', 'Bought')->get();

    foreach ($tasks as $task){
            if (is_null($task->timeExtension)){
                $myDate = strtotime($task->deadline);
                $now  = strtotime(date("y-m-d h:i:s"));
                $diff = $myDate - $now;
                if ($diff <= 0){

                    $details = [
                        'taskName'      => $task->project->name,
                        'date'          => now(),
                        'message'        => 'You have not delivered a task.',
                        'tooltip'       => 'You will lose points for not delivering the task.',
                        'link'          => "<a href=".route("pages.projects")." class=\'d-inline\'>Take Task</a>",
                    ];
                    $adminDetails = [
                        'taskName'      => $task->project->id,
                        'date'          => now(),
                        'message'       => "<a href=".route("admin.users.show", $task->user->id)." class='d-inline'>". $task->user->name . "</a><a href=".route("admin.tasks.show", $task->id)." class='d-inline'> delivered a task.</a>",
                        'tooltip'       => 'Task',
                        'link'          => "<a href=".route("admin.tasks.show", $task->id)." class='d-inline'>View task</a>",
                    ];
                    $task->user->notify(new TaskResult($details));

                    $admins = Admin::all();
                    foreach ($admins as $admin) {
                        $admin->notify(new TaskResult($adminDetails));
                    }
                    $data = [
                        'status' => 'undelivered',
                    ];
                    $task->update($data);
                }
            }elseif (!is_null($task->timeExtension)){
                if($task->timeExtension->status != 'Requested'){
                    $myDate = strtotime($task->deadline);
                    $now  = strtotime(date("y-m-d h:i:s"));
                    $diff = $myDate - $now;
                    if ($diff <= 0){

                        $details = [
                            'taskName'      => $task->project->name,
                            'date'          => now(),
                            'message'        => 'You have not delivered a task.',
                            'tooltip'       => 'You will lose points for not delivering the task.',
                            'link'          => "<a href=".route("pages.projects")." class=\'d-inline\'>Take Task</a>",
                        ];
                        $adminDetails = [
                            'taskName'      => $task->project->id,
                            'date'          => now(),
                            'message'       => "<a href=".route("admin.users.show", $task->user->id)." class='d-inline'>". $task->user->name . "</a><a href=".route("admin.tasks.show", $task->id)." class='d-inline'> delivered a task.</a>",
                            'tooltip'       => 'Task',
                            'link'          => "<a href=".route("admin.tasks.show", $task->id)." class='d-inline'>View task</a>",
                        ];
                        $task->user->notify(new TaskResult($details));

                        $admins = Admin::all();
                        foreach ($admins as $admin) {
                            $admin->notify(new TaskResult($adminDetails));
                        }
                        $data = [
                            'status' => 'undelivered',
                        ];
                        $task->update($data);
                    }
                }
            }
        }

        foreach ($tests as $test){
            $myDate = strtotime($test->deadline);
            $now  = strtotime(date("y-m-d h:i:s"));
            $diff = $myDate - $now;
            if ($diff <= 0){
                $data = [
                    'status' => 'failed',
                ];
                $test->update($data);
            }
        }

        foreach ($memberships as $membership){
            $myDate = strtotime($membership->deadline);
            $now  = strtotime(date("y-m-d h:i:s"));
            $diff = $myDate - $now;
            if ($diff <= 0){
                $data = [
                    'status' => 'Expired',
                ];
                $membership->update($data);
            }
        }

    }
}
