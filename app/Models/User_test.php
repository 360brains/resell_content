<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_test extends Model
{
    protected $table = 'user_tests';
    protected $fillable = ['user_id', 'test_id', 'status', 'body'];
}
