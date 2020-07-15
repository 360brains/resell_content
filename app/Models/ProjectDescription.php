<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectDescription extends Model
{
    protected $fillable = ['text', 'is_taken'];

    function project(){
        return $this->belongsTo(Project::class);
    }

}
