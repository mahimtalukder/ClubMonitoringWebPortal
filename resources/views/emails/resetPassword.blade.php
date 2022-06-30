@component('mail::message')

Dear {{$data['name']}},

Your reset otp is: <b>{{$data['reset_password_otp']}}</b>

Regards,<br>
<b>Club Monitoring Web Portal</b>
@endcomponent
