<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index(){
        return view('user.profile');
    }

    public function editPersonal(Request $request){
        $request->validate([
            'name'          => 'required',
            'contact'       => 'required',
            'gender'        => 'required',
        ]);

        $user = auth()->user();
        $user->name     = $request->name;
        $user->contact  = $request->contact;
        $user->gender   = $request->gender;

        if ($request->hasFile("image") && $request->file('image')->isValid()) {
            $filename           = $request->file('image')->getClientOriginalName();
            $filename           = time()."-".$filename;
            $destinationPath    = public_path('/images');
            $user->avatar       = "images/".$filename;
            $request->file('image')->move($destinationPath, $filename);
        }


        $response = $user->save();

        if ($response){
            return redirect()->route('user.profile')->with("success", "Completed successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    public function editPassword(Request $request){
        $request->validate([
            'old_password'          => 'required',
            'new_password'          => 'required',
            'confirm_password'      => 'required|same:new_password'
        ]);

        if (Hash::check($request->old_password, auth()->user()->password)) {
            $data = [
                'password'     => bcrypt($request->new_password),
            ];

            $response = auth()->user()->update($data);

            if ($response){
                return redirect()->route('user.profile')->with("success", "Completed successfully.");
            }else{
                return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
            }
        }else{
            return redirect()->back()->withInput($request->all())->with("error", " Old password is incorrect. Please try again.");
        }

    }
}
