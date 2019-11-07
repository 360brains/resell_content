<?php

namespace App\Http\Controllers\Admin;

use App\Models\Account;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['accounts']   = Account::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.accounts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bank'          => 'required',
            'holder'        => 'required',
            'iban'          => 'required',
        ]);

        $account = new Account();
        $account->bank          = $request->bank;
        $account->holder        = $request->holder;
        $account->iban          = $request->iban;
        $response               = $account->save();

        if ($response){
            return redirect()->route('admin.accounts.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        $data['account'] = $account;
        return view('admin.accounts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $request->validate([
            'bank'          => 'required',
            'holder'        => 'required',
            'iban'          => 'required',
        ]);

        $account->bank          = $request->bank;
        $account->holder        = $request->holder;
        $account->iban          = $request->iban;

        $response               = $account->save();

        if ($response){
            return redirect()->route('admin.accounts.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->active    = $account->active == 0 ? 1 : 0;
        $response           = $account->save();

        if ($response){
            return redirect()->back()->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
    }
}
