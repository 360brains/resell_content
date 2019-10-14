<?php

namespace App\Http\Controllers\User;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index(){
        $user_id                = auth()->user()->id;
        $data['transactions']   = Transaction::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(10);
        return view('user.transactions', $data);
    }
}
