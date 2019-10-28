<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['name', 'type_id','fee','description','level_id', 'active'];
    public function types()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }


}
