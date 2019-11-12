<?php

namespace App\Http\Controllers\User;

use App\Models\Account;
use App\Models\Deposit;
use App\Notifications\TaskResult;
use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index(){
        return view('user.payment');
    }

    public function addAccount(Request $request){
        if($request->option == 'bank'){
            return view('user.accounts.add-bank-account');
        }elseif($request->option == 'jazzcash'){
            return view('user.accounts.add-jazzcash-account');
        }elseif($request->option == 'easypaisa'){
            return view('user.accounts.add-easypaisa-account');
        }
    }

    public function storeAccount(Request $request){
        if($request->action == 'bank'){

            $request->validate([
                'bank'          => 'required',
                'iban'          => 'required',
                'holder'        => 'required',
            ]);

            $account = Account::where('bank', $request->bank)->where('iban', $request->iban)->where('active', 0)->first();


            if (count($account) > 0)
            $data = [
                'type'      => 'bank',
                'user_id'   => auth()->user()->id,
                'bank'      => $request->bank,
                'holder'    => $request->holder,
                'iban'      => $request->iban,
                ];

            $response = Account::create($data);

            if ($response){
                return redirect()->route('user.profile')->with("success", "Completed successfully.");
            }else{
                return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
            }


        }elseif($request->action == 'jazzcash'){
            $request->validate([
                'number'        => 'required',
                'holder'        => 'required',
            ]);

            $data = [
                'type'      => 'jazzcash',
                'user_id'   => auth()->user()->id,
                'bank'      => 'JazzCash',
                'holder'    => $request->holder,
                'iban'      => $request->number,
            ];

            $response = Account::create($data);

            if ($response){
                return redirect()->route('user.profile')->with("success", "Completed successfully.");
            }else{
                return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
            }


        }elseif($request->action == 'easypaisa'){
            $request->validate([
                'number'        => 'required',
                'holder'        => 'required',
            ]);

            $data = [
                'type'      => 'easypaisa',
                'user_id'   => auth()->user()->id,
                'bank'      => 'EasyPaisa',
                'holder'    => $request->holder,
                'iban'      => $request->number,
            ];

            $response = Account::create($data);

            if ($response){
                return redirect()->route('user.profile')->with("success", "Completed successfully.");
            }else{
                return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
            }
        }
    }


    public function updateAccount(Request $request, $id){

        $account = Account::where('id', $id)->first();

        if($request->action == 'bank'){

            $request->validate([
                'bank'          => 'required',
                'iban'          => 'required',
                'holder'        => 'required',
            ]);

            $data = [
                'bank'      => $request->bank,
                'holder'    => $request->holder,
                'iban'      => $request->iban,
            ];

            $response = $account->update($data);

            if ($response){
                return redirect()->route('user.profile')->with("success", "Completed successfully.");
            }else{
                return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
            }


        }elseif($request->action == 'jazzcash'){
            $request->validate([
                'number'        => 'required',
                'holder'        => 'required',
            ]);

            $data = [
                'holder'    => $request->holder,
                'iban'      => $request->number,
            ];

            $response = $account->update($data);


            if ($response){
                return redirect()->route('user.profile')->with("success", "Completed successfully.");
            }else{
                return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
            }


        }elseif($request->action == 'easypaisa'){
            $request->validate([
                'number'        => 'required',
                'holder'        => 'required',
            ]);

            $data = [
                'holder'    => $request->holder,
                'iban'      => $request->number,
            ];

            $response = $account->update($data);

            if ($response){
                return redirect()->route('user.profile')->with("success", "Completed successfully.");
            }else{
                return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
            }
        }
    }


    public function editAccount($id){
        $account = Account::where('id', $id)->first();
        $data['account'] = $account;
        if ($account->type == 'easypaisa'){
            return view('user.accounts.edit-easypaisa-account', $data);
        }elseif ($account->type == 'bank'){
            return view('user.accounts.edit-bank-account', $data);
        }elseif ($account->type == 'jazzcash'){
            return view('user.accounts.edit-jazzcash-account', $data);
        }
    }

    public function removeAccount($id){
        $account = Account::where('id', $id)->first();

        $data = [
            'active'    => 0,

        ];
        $response = $account->update($data);
        if ($response){
            return redirect()->route('user.profile')->with("success", "Completed successfully.");
        }else{
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
    }

    public function depositFunds(Request $request){

        $data['method'] = null;

        if($request->option == 'bank'){
            $data['method'] = 'bank';
        }elseif($request->option == 'jazzcash'){
            $data['method'] = 'jazzcash';
        }elseif($request->option == 'easypaisa'){
            $data['method'] = 'easypaisa';
        }

        return view('user.deposit-funds', $data);
    }

    public function storeFunds(Request $request){

        $response = null;
        $data = null;

        $data = [
            'reference_id'       => $request->reference_id,
            'amount'             => $request->amount,
            'user_id'            => auth()->user()->id,
            'date_deposit'       => $request->date,
            'status'             => 'Pending'
        ];

        if($request->action == 'bank'){
            $data['bank'] = $request->bank;

        }elseif($request->action == 'jazzcash'){
            $data['bank'] = 'JazzCash';

        }elseif($request->action == 'easypaisa'){
            $data['bank'] = 'EasyPaisa';
        }

        $response = Deposit::create($data);

        $details = [
            'taskName'      => 'Deposit Funds',
            'date'          => now(),
            'message'       => 'Your fund deposit request is delivered and waiting approval.',
            'tooltip'       => ' You will be notified when admin approves your deposit. Your balance will be updated after approval.',
            'link'          => "",
        ];

        auth()->user()->notify(new TaskResult($details));

        $adminDetails = [
            'taskName'      => 'Deposit Funds',
            'date'          => now(),
            'message'       => "<a href=".route("admin.users.show", auth()->user()->id)." class='d-inline'>". auth()->user()->name . "</a><a href=".route("admin.deposits.show", $response->id)." class='d-inline'> deposited funds.</a>",
            'tooltip'       => 'funds',
            'link'          => "<a href=".route("admin.deposits.show", $response->id)." class='d-inline'>View deposit</a>",
        ];
        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new TaskResult($adminDetails));
        }

        if ($response){
            return redirect()->route('user.profile')->with("success", "Completed successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

}
