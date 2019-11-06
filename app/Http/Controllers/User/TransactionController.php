<?php

namespace App\Http\Controllers\User;

use App\Models\Transaction;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index(){
        $user_id                = auth()->user()->id;
        $data['transactions']   = Transaction::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(10);
        return view('user.transactions', $data);
    }
    public function withdrawIndex(){
        $data['withdrawRequests']   = Withdraw::with('user')->orderBy('status', 'desc')->get();
        return view('admin.withdraws.index', $data);
    }
}
