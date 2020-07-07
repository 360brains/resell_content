<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'quantity', 'words', 'available', 'type_id', 'deadline' , 'duration', 'category_id', 'level_id', 'description', 'active', 'price', 'points', 'special', 'template_id'];
//    protected $dates = ['deadline'];
    function type(){
        return $this->belongsTo(Type::class);
    }
    function subDescriptions(){
        return $this->hasMany(ProjectDescription::class);
    }
    function template(){
        return $this->belongsTo(Template::class);
    }
    function category(){
        return $this->belongsTo(Category::class);
    }
    function level(){
        return $this->belongsTo(Level::class);
    }
    function trainings(){
        return $this->belongsToMany(Training::class);
    }
    function tasks(){
        return $this->hasMany(Task::class);
    }
    public function getCreatedAtAttribute($date)
    {
        return date('d-M-Y', strtotime($date));
    }

    public function getUpdatedAtAttribute($date)
    {
        return date('d-M-Y', strtotime($date));
    }
//    public function getDeadlineAttribute($date)
//    {
//        return date('d-M-Y', strtotime($date));
//    }
}
