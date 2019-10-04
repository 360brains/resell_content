<?php

namespace App\Models;

use App\Level;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    function type(){
        return $this->belongsTo(Type::class);
    }
    function category(){
        return $this->belongsTo(Category::class);
    }
    function level(){
        return $this->belongsTo(Level::class);
    }
}
