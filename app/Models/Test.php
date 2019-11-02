<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['name', 'type_id','fee','description','level_id', 'active'];
    public function types()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
    public function levels()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
    function users(){
        return $this->belongsToMany(User::class, 'user_tests')->withPivot('id', 'status', 'body', 'video');
    }


}
