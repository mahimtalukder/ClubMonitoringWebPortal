@component('mail::message')

Dear {{$email}},

The body of your message.

@component('mail::button', ['url' => 'mahimtlaukder.me'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
