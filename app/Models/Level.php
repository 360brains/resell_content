<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['name', 'description', 'min_points', 'active', 'max_points'];

    public function types()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
    public function test()
    {
        return $this->hasMany(Test::class, 'type_id');
    }
    public function trainings(){
        return $this->hasMany(Training::class);
    }
}
