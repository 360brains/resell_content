<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    function type(){
        return $this->belongsTo(Type::class,"type_id");
    }
}
