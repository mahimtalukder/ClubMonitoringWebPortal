@component('mail::message')
    # Respected {{$data['name']}} Sir,
    Your account was created successfully!

    ID: {{$data['user_id']}}
    Password (After login please change this): {{$data['password']}}
    Remember we do not store your password. Don't share this with anyone else ever asked for this.]

    Thanks,
    Club Monitoring Web Portal.
@endcomponent



