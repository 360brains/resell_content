<?php

namespace App\Console\Commands;

use App\Models\Task;
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
    $tasks = Task::whereIn('status', array('started', 'extended', 'reworking'))->get();
    foreach ($tasks as $task){
        $myDate = strtotime($task->project->deadline);
        $now  = strtotime(date("y-m-d h:i:s"));
        $diff = $myDate - $now;
        if ($diff <= 0){
            $data = [
                'status' => 'undelivered',
            ];
            $task->update($data);
        }
    }

    }
}
