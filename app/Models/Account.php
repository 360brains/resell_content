<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'bank', 'holder', 'iban', 'user_id', 'type', 'active'
    ];
}
