@component('mail::message')
# Email Verified

You email has been successfully verified!<br>

<strong>Login</strong> = {{$user->email }}<br>
<strong>Password</strong> = {{ $user->show_password }}

@component('mail::button', ['url' => url('login')])
Login Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
