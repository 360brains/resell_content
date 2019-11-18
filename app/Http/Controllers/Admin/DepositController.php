<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deposit;
use App\Models\Membership;
use App\Models\Transaction;
use App\Notifications\TaskResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['deposits']   =Deposit::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.deposits.index', $data);
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
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {

        if( $request->action == 'approve' ){

            $deposit->user->balance = $deposit->user->balance +  $deposit->amount;
            $deposit->user->update();

            $deposit->status = 'Approved';
            $response = $deposit->update();

            $data = [
                'type'            =>'Debit',
                'amount'          => $deposit->amount,
                'description'     =>'Deposited Funds',
                'deposit_id'      => $deposit->id,
                'status'          => "Paid",
                'user_id'         => $deposit->user->id,
            ];

            $response = Transaction::create($data);

            $details = [
                'taskName'      => 'Deposited Funds',
                'date'          => now(),
                'message'       => 'Your fund deposit request is approved.',
                'tooltip'       => ' Your balance is updated. You can use it for different payments or can withdraw it any time.',
                'link'          => "",
            ];

        }elseif ( $request->action == 'reject' ){


            $deposit->status = 'Rejected';
            $response = $deposit->update();

            $details = [
                'taskName'      => 'Deposited Funds',
                'date'          => now(),
                'message'       => 'Your fund deposit request is rejected.',
                'tooltip'       => 'Your deposit request is rejected. Please try again with valid information.',
                'link'          => "",
            ];
        }
    foreach (auth()->user()->unreadNotifications as $notification)
    {
        if (strpos($notification->data['link'], "".$deposit->id))
        {
            $notification->markAsRead();
            break;
        }
    }

        $deposit->user->notify(new TaskResult($details));


        if ($response){
            return redirect()->route('admin.deposits.index')->with("success", "Completed successfully.");
        }else{
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
