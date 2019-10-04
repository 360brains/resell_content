<?php

namespace App\Models;

use App\Level;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function category(){
        return $this->hasMany(Level::class);
    }
}
