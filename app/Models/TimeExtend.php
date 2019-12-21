<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeExtend extends Model
{
    protected $fillable = ['reason', 'time', 'status', 'task_id'];
}
