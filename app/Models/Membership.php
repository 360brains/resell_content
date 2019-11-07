<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = ['name', 'price','description','badge', 'active'];

    function users(){
        return $this->belongsToMany(User::class);
    }
}
