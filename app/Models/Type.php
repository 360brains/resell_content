<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function level(){
        return $this->hasMany(Level::class);
    }
}
