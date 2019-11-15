<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Membership_user extends Model
{
    protected $table = 'membership_user';

    protected $fillable = [
        'membership_id','user_id','deadline', 'status'
    ];

    function user(){
        return $this->belongsTo(User::class);
    }
    function membership(){
        return $this->belongsTo(Membership::class);
    }
}
