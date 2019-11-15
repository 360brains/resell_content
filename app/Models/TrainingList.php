<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingList extends Model
{
    protected $fillable = ['name','training_id'];
    public function training(){
        return $this->belongsTo(Training::class,'training_id');
    }
}
