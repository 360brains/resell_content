<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index(){
        return view('user.payment');
    }

    public function addAccount(Request $request){
        if($request->option == 'bank'){
            return view('user.add-bank-account');
        }elseif($request->option == 'jazzcash'){
            return view('user.add-jazzcash-account');
        }elseif($request->option == 'easypaisa'){
            return view('user.add-easypaisa-account');
        }
    }

    public function storeAccount(){
        //
    }

    public function depositFunds(){
        return view('user.deposit-funds');
    }

}
