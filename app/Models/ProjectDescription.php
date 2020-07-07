<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectDescription extends Model
{
    protected $fillable = ['text'];

    function project(){
        return $this->belongsTo(Project::class);
    }

}
