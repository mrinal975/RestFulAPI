@component('mail::message')
    <p>Hello , <b>{{$user->name}}</b></p>
    You have changed your mail.you need to verify the new mail address.please click the link below.

    @component('mail::button', ['url' =>route('verify',$user->verification_token)])
        Verify
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent

