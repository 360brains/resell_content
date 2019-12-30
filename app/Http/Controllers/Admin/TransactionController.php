<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use App\Models\Withdraw;
use App\Notifications\EmailUser;
use App\Notifications\TaskResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['transactions'] =Transaction::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.transactions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $data['transaction'] = $transaction;
        return view('admin.transactions.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
    public function withdrawIndex(){
        $data['withdrawRequests']   = Withdraw::with('user')->orderBy('status', 'desc')->paginate(10);
        return view('admin.withdraws.index', $data);
    }

    public function withdrawApprove($id)
    {

        $withdraw = Withdraw::where('id', $id)->first();

        $data = [
            'type' => 'Credit',
            'amount' => $withdraw->amount,
            'description' => 'Withdrawn Money',
            'withdraw_id' => $withdraw->id,
            'status' => "Received",
            'user_id' => $withdraw->user->id,
        ];

        $response = Transaction::create($data);

        $data = [
            'status' => "Approved",
        ];

        $response = $withdraw->update($data);
        $details = [
            'taskName' => 'Withdraw Funds',
            'date' => now(),
            'message' => 'Your withdraw request is approved.',
            'tooltip' => ' You have been sent requested amount. In case of any issue feel free to contact us.',
            'link' => "",
        ];
        $emailDetails = [
            'message' => 'Your withdraw request is approved. You have been sent requested amount. In case of any issue feel free to contact us.',
            'url' => route("user.dashboard"),
            'urlText' => 'Dashboard',
        ];

        if (!is_null($withdraw->user->setting)) {
            if ($withdraw->user->setting->withdraw_notifications == 0) {
                $withdraw->user->notify(new EmailUser($emailDetails));
            }
        }else{
            $withdraw->user->notify(new EmailUser($emailDetails));
        }

        $withdraw->user->notify(new TaskResult($details));

        foreach (auth()->user()->unreadNotifications as $notification)
        {
            if (strpos($notification->data['link'], "".$withdraw->id))
            {
                $notification->markAsRead();
                break;
            }
        }


        if ($response){
            return redirect()->route('admin.withrawRequests')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
    }
}
