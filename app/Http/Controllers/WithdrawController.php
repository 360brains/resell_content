<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\Withdraw;
use App\Notifications\EmailUser;
use App\Notifications\TaskResult;
use App\User;
use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['withdrawRequests']   = Withdraw::where('user_id', Auth::user()->id)->where('status', 'Pending')->latest()->get();
        return view('user.withdraw', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->balance < $request->amount){
            return redirect()->route('withdraw.create')->withInput($request->all())->with('error','Requested amount must be less than or equal to available balance.');
        }
        else{
            $request->validate([
                'amount'       => 'required',
                'account'       => 'required',

            ]);

            $account = Account::find($request->account);

            $data = [
                'holder'          =>$account->holder,
                'iban'            => $account->iban,
                'bank'            => $account->bank,
                'amount'          => $request->amount,
                'status'          => "Pending",
                'user_id'         => Auth()->user()->id,
            ];

            $response = Withdraw::create($data);
            $remaining            = Auth::user()->balance - $request->amount;
            $set                  = User::find( Auth::user()->id);
            if ($set){
                $set->balance     = $remaining;
                $set->save();
            }

            // hassaan
            $details = [
                'taskName'      => 'Withdraw Funds',
                'date'          => now(),
                'message'       => 'Your fund withdraw request is waiting approval.',
                'tooltip'       => 'You will be notified when admin approves your withdraw.',
                'link'          => "<a href=".route("withdraw.create")." class='d-inline'>View Withdraw</a>",
            ];

            auth()->user()->notify(new TaskResult($details));

            $adminDetails = [
                'taskName'      => 'Withdraw Funds',
                'date'          => now(),
                'message'       => "<a href=".route("admin.users.show", auth()->user()->id)." class='d-inline'>". auth()->user()->name . "</a><a href=".route("admin.withrawRequests")." class='d-inline'> Requested funds withdraw.</a>",
                'tooltip'       => 'withdraw',
                'link'          => "<a href=".route("admin.withrawRequests")." class='d-inline'>View withdraw</a>",
            ];
            $admins = Admin::all();
            foreach ($admins as $admin) {
                $admin->notify(new TaskResult($adminDetails));
            }
            // hassaan


            if ($response){
                return redirect()->route('withdraw.create')->with("success", "Completed Successfully.");
            }else{
                return redirect()->route('withdraw.create')->withInput($request->all())->with("error", "Something went wrong. Please try again.");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function show(Withdraw $withdraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdraw $withdraw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Withdraw $withdraw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdraw $withdraw)
    {
        //
    }
}
