@extends('layouts.mail')

@section('content')
    <h1 class="section-title">Подтверждение регистрации</h1>
    <p>С вашим адресом e-mail выполнена регистрация на сайте philips-shell-promo.ru.</p>
    <p>Если Вы этого не делали, просто проигнорируйте это сообщение. Если регистрация осуществлена Вами, то Вам следует подтвердить свою регистрацию и тем самым активировать учетную запись.</p>
    <p>Дпя подтверждения регистрации перейдите по ссылке: <a href="{{ url('/confirm-registration/'.$token) }}">{{ url('/confirm-registration/'.$token) }}</a><p>
@endsection