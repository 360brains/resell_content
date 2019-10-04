<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'parent_id'
    ];

    function parent_category(){
        return $this->belongsTo(Category::class,"parent_id");
    }
    function child_categories(){
        return $this->hasMany(Category::class,"parent_id");
    }
}
