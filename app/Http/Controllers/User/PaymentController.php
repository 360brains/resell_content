<?php

namespace App\Http\Controllers\User;

use App\Models\Account;
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
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    public function depositFunds(){
        return view('user.deposit-funds');
    }

}
