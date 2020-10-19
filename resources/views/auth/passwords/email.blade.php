@extends('layouts.auth')

<!-- Main Content -->
@section('content')
<h1 class="section-title">Восстановление пароля</h1>
<div class="icon-close"></div>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@else
    <form class="form" role="form" method="POST" action="{{ url('/password/email') }}">
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

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Выслать ссылку</button>
            <span class="help-block">После нажатия на кнопку, <br />Вам будет выслана ссылка для восстановления пароля.</span>
        </div>
    </form>
@endif

<script>$('#pop-up').show();</script>
@endsection
