<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function level(){
        return $this->hasMany(Level::class);
    }
    public function test(){
        return $this->hasMany(Test::class);
    }
    public function trainings(){
        return $this->hasMany(Training::class);
    }
}
