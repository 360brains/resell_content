<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'reference_id', 'user_id', 'bank', 'amount', 'date_deposit', 'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
