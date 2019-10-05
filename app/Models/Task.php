<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'type_id', 'deadline', 'category_id', 'level_id', 'description', 'active'];

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
    public function getCreatedAtAttribute($date)
    {
        return date('d-M-Y', strtotime($date));
    }

    public function getUpdatedAtAttribute($date)
    {
        return date('d-M-Y', strtotime($date));
    }
}
