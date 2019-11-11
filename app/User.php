<?php

namespace App;

use App\Models\Account;
use App\Models\Membership;
use App\Models\Level;
use App\Models\Task;
use App\Models\Test;
use App\Models\Training;
use App\Models\Transaction;
use App\Models\Withdraw;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active', 'contact', 'gender', 'balance'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function levels(){
        return $this->belongsToMany(Level::class, 'user_levels')->latest();
    }

    function currentLevels(){
    return $this->hasOne(Level::class, 'user_levels');
    }

    function trainings(){
        return $this->belongsToMany(Training::class);
    }

    function accounts(){
        return $this->hasMany(Account::class)->whereActive(1);
    }

    function memberships(){
        return $this->belongsToMany(Membership::class);
    }

    function tests(){
        return $this->belongsToMany(Test::class, 'user_tests')->withPivot('id', 'status', 'body', 'video', 'deadline');
    }

    function videoTest(){
        return $this->belongsToMany(Test::class, 'user_tests')->withPivot('id', 'status', 'body', 'video', 'deadline')->whereTypeId(2);
    }
    function lastVideoTest(){
        return $this->belongsToMany(Test::class, 'user_tests')->withPivot('id', 'status', 'body', 'video', 'deadline')->whereTypeId(2)->orderBy('created_at', 'desc')->limit(1);
    }

    function writingTest(){
        return $this->belongsToMany(Test::class, 'user_tests')->withPivot('id', 'status', 'body', 'video', 'deadline')->whereTypeId(1);
    }
    function lastWritingTest(){
        return $this->belongsToMany(Test::class, 'user_tests')->withPivot('id', 'status', 'body', 'video', 'deadline')->whereTypeId(1)->orderBy('created_at', 'desc')->limit(1);
    }

    function currentVideoTest(){
        return $this->belongsToMany(Test::class, 'user_tests')->withPivot('id', 'status', 'body', 'video', 'deadline')->whereTypeId(2)->where('status' , '!=', 'failed')->where('status' , '!=', 'passed');
    }

    function currentWritingTest(){
        return $this->belongsToMany(Test::class, 'user_tests')->withPivot('id', 'status', 'body', 'video', 'deadline')->whereTypeId(1)->where('status' , '!=', 'failed')->where('status' , '!=', 'passed');
    }

    function tasks(){
        return $this->hasMany(Task::class);
    }

    function transactions(){
        return $this->hasMany(Transaction::class);
    }
    public function withdraws(){
        return $this->hasMany(Withdraw::class);
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
