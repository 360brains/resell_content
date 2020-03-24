<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'parent_id','avatar'
    ];

    function parentCategory(){
        return $this->belongsTo(Category::class,"parent_id");
    }
    function childCategories(){
        return $this->hasMany(Category::class,"parent_id");
    }

    function projects(){
    return $this->hasMany(Project::class);
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
