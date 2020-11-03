@extends('layouts.auth')

@section('content')
<h1 class="section-title">Вход</h1>
<div class="icon-close"></div>

<form class="form" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

        <label for="email" class="">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Почта">

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

        <label for="password" class="">Password</label>
        <input id="password" type="password" class="form-control" name="password" placeholder="Пароль">

        <label for="password" class="col-md-4 control-label">Password</label>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Войти</button>
    </div>

    <div class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" class="checkbox-input">Запомнить пароль
            </label>
        </div>
    </div>

    <div class="form-group">
        <a class="" href="{{ url('/password/reset') }}">Забыли пароль?</a><br>
        <a class="red" href="{{ url('/register') }}">Регистрация</a>
    </div>
</form>

<script>$('#pop-up').show();</script>
@endsection
