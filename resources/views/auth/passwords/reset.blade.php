@extends('layouts.auth')

@section('content')
<h1 class="section-title">СБРОС ПАРОЛЯ</h1>
<div class="icon-close"></div>

<form class="form" role="form" method="POST" action="{{ url('/password/reset') }}">
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

        <label for="email" class="">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Почта">

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

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password" class="">Password Confirmation</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Подтверждение пароля">

        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Сбросить пароль</button>
    </div>
</form>

<script>$('#pop-up').show();</script>
@endsection
