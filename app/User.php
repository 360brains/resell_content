<?php

namespace App;

use App\Models\Level;
use App\Models\Training;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active', 'contact', 'gender'
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
        return $this->hasMany(Level::class);
    }

    function trainings(){
        return $this->hasMany(Training::class);
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
