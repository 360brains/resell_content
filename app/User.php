<?php

namespace App;

use App\Models\Level;
use App\Models\Task;
use App\Models\Test;
use App\Models\Training;
use App\Models\Transaction;
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

    function tests(){
        return $this->belongsToMany(Test::class, 'user_tests')->withPivot('status', 'body', 'video');
    }

    function tasks(){
        return $this->hasMany(Task::class);
    }

    function transactions(){
        return $this->hasMany(Transaction::class);
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
