<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'parent_id'
    ];

    function parentCategory(){
        return $this->belongsTo(Category::class,"parent_id");
    }
    function childCategories(){
        return $this->hasMany(Category::class,"parent_id");
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
