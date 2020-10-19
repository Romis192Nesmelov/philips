@extends('layouts.mail')

@section('content')
    <h1 class="section-title">Изменениe пароля</h1>
    <p>Запрошено изменение пароля на сайте philips-shell-promo.ru.</p>
    <p>Перейдите по ссылке, чтобы изменить свой пароль: <a href="{{ url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}</a></p>
@endsection