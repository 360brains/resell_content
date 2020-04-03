<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\EmailUser;
use App\Notifications\TaskResult;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (isset($data['referer'])){
            $referer = User::find($data['referer']);

            $referer->balance   = $referer->balance + 250;
            $referer->income    = $referer->income + 250;

            $referer->update();

            $details = [
                'taskName'      => 'Referred User',
                'date'          => now(),
                'message'       => 'Congratulations!' . $data['name']. ' Registered via your referral link.',
                'tooltip'       => 'Your balance is updated with addition of 250PKR as a reward.',
                'link'          => "",
            ];
            $emailDetails = [
                'message'       => 'Congratulations!' . $data['name']. ' Registered via your referral link. Your balance is updated with addition of 250PKR as a reward.',
                'url'          => route("user.dashboard"),
                'urlText'      => 'Dashboard',
            ];

            $referer->notify(new TaskResult($details));

            if (!is_null($referer->setting)) {
                if ($referer->setting->support_notifications == 0) {
                    $referer->notify(new EmailUser($emailDetails));
                }
            }else{
                $referer->notify(new EmailUser($emailDetails));
            }
    }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'show_password' => $data['password'],
        ]);
    }
}
