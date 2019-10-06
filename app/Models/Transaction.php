<?php

namespace App\Models;

use App\User; //Why did environment prompt to use user model???
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['name', 'type_id', 'deadline', 'category_id', 'level_id', 'description', 'active'];

    function user(){
        return $this->belongsTo(User::class);
    }

    function task(){
        return $this->belongsTo(Task::class);
    }

    function test(){
        return $this->belongsTo(Test::class);
    }

    function training(){
    return $this->belongsTo(Training::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return date('d-M-Y', strtotime($date));
    }

    public function getUpdatedAtAttribute($date)
    {
        return date('d-M-Y', strtotime($date));
    }
}