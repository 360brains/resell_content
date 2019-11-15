<?php

namespace App\Http\Controllers\User;

use App\Models\Membership;
use App\Models\Membership_user;
use App\Notifications\TaskResult;
use Bitfumes\Multiauth\Model\Admin;
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
                $date = new \DateTime("+1 months");
                $data = [
                    'user_id'           => auth()->user()->id,
                    'membership_id'     => $membership->id,
                    'status'            => 'Bought',
                    'deadline'          => $date,
                ];
                $responce = Membership_user::create($data);

                $newBalance = [
                    'balance'           => auth()->user()->balance - $membership->price,
                ];

                auth()->user()->update($newBalance);

                $details = [
                    'taskName'      => 'Membership',
                    'date'          => now(),
                    'message'       => 'Congratulations! You are a premium member now.',
                    'tooltip'       => 'This Membership is valid for 1 month. You can take tasks of any level now.',
                    'link'          => "<a href=".route("pages.projects")." class=\'d-inline\'>Take Tasks</a>",
                ];
                auth()->user()->notify(new TaskResult($details));

                $adminDetails = [
                    'taskName'      => 'Premium Membership',
                    'date'          => now(),
                    'message'       => "<a href=".route("admin.users.show", auth()->user()->id)." class='d-inline'>". auth()->user()->name . "</a><a href='#' class='d-inline'> is now Premium.</a>",
                    'tooltip'       => 'membership',
                    'link'          => "",

                ];
                $admins = Admin::all();
                foreach ($admins as $admin) {
                    $admin->notify(new TaskResult($adminDetails));
                }

                if ($responce){
                    return redirect()->route('user.dashboard')->with("success", "Completed Successfully.");
                }else{
                    return redirect()->back()->with("error", "Something went wrong. Please try again.");
                }
            }else{
                return redirect()->back()->with("error", "Your balance is not enough to Buy this membership. Try after depositing Funds.");
            }
        }else{
            return redirect()->back()->with("error", "Please agree to the membership purchase agreement.");
        }
    }
}
