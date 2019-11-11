<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'reference_id', 'user_id', 'bank', 'amount', 'date_deposit'
    ];
}
