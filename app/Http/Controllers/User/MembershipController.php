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

    public function buy(Request $request, $id){
        $membership = Membership::where('id', $id)->first();
        if ($request->check == 'on'){
            if (auth()->user()->balance >= $membership->price){
                $date = new \DateTime("+2 months");
                $data = [
                    'user_id'           => auth()->user()->id,
                    'membership_id'     => $membership->id,
                    'status'            => 'Bought',
                    'deadline'          => $date,
                ];
                $responce = Membership::create($data);

                if ($responce){
                    // To be continued
                    // To be continued
                    // To be continued
                    // To be continued
                    // To be continued
                    // To be continued
                    // To be continued
                    // To be continued
                    // To be continued
                    // To be continued
                    // To be continued
                }
            }else{
                return redirect()->back()->with("error", "Your balance is not enough to Buy this membership. Try after depositing Funds.");
            }
        }else{
            return redirect()->back()->with("error", "Please agree to the membership purchase agreement.");
        }
    }
}
