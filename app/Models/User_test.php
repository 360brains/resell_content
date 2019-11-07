<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class User_test extends Model
{
    protected $table = 'user_tests';
    protected $fillable = ['user_id', 'test_id', 'status', 'body', 'video', 'deadline'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }
}
