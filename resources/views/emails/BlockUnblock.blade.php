@component('mail::message')

Dear {{$data['name']}},
@if($data['status_code']==0)
    Sorry! Your acount has been block by the admin!</b>
@endif
@if($data['status_code']==1)
    Congratulations! Your acount has been unblock by the admin!</b>
@endif

Regards,<br>
<b>Club Monitoring Web Portal</b>
@endcomponent