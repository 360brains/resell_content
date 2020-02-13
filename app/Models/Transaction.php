<?php

namespace App\Models;

use App\User; //Why did environment prompt to use user model???
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id','training_id','withdraw_id', 'membership_id', 'deposit_id', 'amount', 'type', 'description', 'status'
    ];

    function user(){
        return $this->belongsTo(User::class);
    }

    function task(){
        return $this->belongsTo(Task::class);
    }

    function test(){
        return $this->belongsTo(Test::class);
    }

    function training(){
    return $this->belongsTo(Training::class);
    }

    function membership(){
        return $this->belongsTo(Membership::class);
    }

    function withdraw(){
        return $this->belongsTo(Withdraw::class);
    }

    function deposit(){
        return $this->belongsTo(Deposit::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return date('d-M-Y', strtotime($date));
    }

    public function getUpdatedAtAttribute($date)
    {
        return date('d-M-Y', strtotime($date));
    }
}
