<?php

namespace App\Http\Controllers\User;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index(){
        return view('user.settings');
    }
    public function update(Request $request){
            $data = [];
            if ($request->task_updates == "on"){
                $data['task_updates'] = 1;
            }else{
                $data['task_updates'] = 0;
            }
            if ($request->support_notifications == "on"){
                $data['support_notifications'] = 1;
            }else{
                $data['support_notifications'] = 0;
            }
            if ($request->withdraw_notifications == "on"){
                $data['withdraw_notifications'] = 1;
            }else{
                $data['withdraw_notifications'] = 0;
            }
        $response = Setting::updateOrCreate(['user_id' => auth()->user()->id], $data);
        if ($response){
            return redirect()->route('user.settings')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }
}
