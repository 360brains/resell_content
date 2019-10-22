<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['deadline', 'user_id', 'project_id', 'status', 'body', 'video'];

    function user(){
        return $this->belongsTo(User::class);
    }
    function type(){
        return $this->belongsTo(Type::class);
    }
    function project(){
        return $this->belongsTo(Project::class);
    }
    function category(){
        return $this->belongsTo(Category::class);
    }
    function level(){
        return $this->belongsTo(Level::class);
    }
    function statuses(){
        return $this->hasMany(Task_status::class);
    }
    function trainings(){
        return $this->belongsToMany(Training::class);
    }

    public function getDeadlineAttribute($date)
    {
        return date('d-M-Y', strtotime($date));
    }
}
