<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['name', 'description', 'type_id', 'active'];

    public function types()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }


}
