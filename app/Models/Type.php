<?php

namespace App\Models;

use App\Level;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function category(){
        return $this->hasMany(Level::class);
    }
}
