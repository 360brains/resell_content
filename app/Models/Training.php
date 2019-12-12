<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = ['name', 'type_id','fee', 'badge', 'description', 'active','avatar'];

    public function types()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
    public function levels()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
    public function projects(){
        return $this->belongsToMany(Project::class);
    }
    public function trainingLists(){
        return $this->hasMany(TrainingList::class);
    }
}
