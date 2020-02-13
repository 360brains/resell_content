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
        $data['Income']         = Transaction::where('user_id', $user_id)->where('status', 'paid')->sum('amount');
        $data['withdrawn']      = Transaction::where('user_id', $user_id)->where('withdraw_id', '!=', NULL)->sum('amount');
        $data['purchased']      = Transaction::where('user_id', $user_id)->where('description', 'like', 'Purchased%')->sum('amount');
        $data['pending']        = Withdraw::where('user_id', $user_id)->where('status', 'Pending')->sum('amount');
        $data['transactions']   = Transaction::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(10);
        return view('user.transactions', $data);
    }
    public function withdrawIndex(){
        $data['withdrawRequests']   = Withdraw::with('user')->orderBy('status', 'desc')->get();
        return view('admin.withdraws.index', $data);
    }
}
