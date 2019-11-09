<?php

namespace App\Http\Controllers\User;

use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembershipController extends Controller
{
    public function index(){
        $data['membership'] = Membership::where('name', 'Premium')->first();
        return view('user.memberships', $data);
    }
}
