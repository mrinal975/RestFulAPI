
@component('mail::message')
    <p>Hello , <b>{{$user->name}}</b></p>
    Thanks for creating your account.please verify your email with belows link

    @component('mail::button', ['url' =>route('verify',$user->id)])
        Verify Account
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
