<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['task_updates', 'support_notifications', 'withdraw_notifications', 'user_id',];

}
