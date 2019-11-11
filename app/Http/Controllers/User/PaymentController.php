<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index(){
        return view('user.payment');
    }

    public function addAccount(){
        return view('user.add-account');
    }

    public function storeAccount(){
        //
    }

}
