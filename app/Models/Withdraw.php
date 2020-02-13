<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = ['amount','iban', 'holder','bank','user_id', 'status'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
