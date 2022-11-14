@component('mail::message')
Hello!

You receive this email because we recieved a password reset request for your account. <br>
<a style="background-color:rgb(32, 32, 32);color:white;padding:1px 3px;" href="{{route('customer.reset-password',$code)}}">Reset Password</a> <br>
This password reset link will expire in 60 minutes. <br>
If you did not request a password reset, no further action is required. <br>
Regards,
<br>
{{ config('app.name') }}
@endcomponent
