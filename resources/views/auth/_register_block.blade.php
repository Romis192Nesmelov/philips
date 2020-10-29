<h1 class="section-title">{{ isset($head) ? $head : 'Регистрация' }}</h1>
<div class="icon-close"></div>

<form class="form" role="form" method="POST" action="{{ isset($action) ? $action : url('/register') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ count($errors->getMessageBag()) ? old('email') : (!Auth::guard()->guest() ? Auth::user()->email : '') }}" placeholder="Почта">

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="">Password</label>
        <input id="password" type="password" class="form-control" name="password" placeholder="Пароль">

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

    @if (Auth::guard()->guest())
        <div class="form-group form-text-left">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="agree_rules"> <sup style="color: Red;">*</sup> Я ознакомился и согласен<br> с <!-- <a href="{{ url('/rules') }}">условиями акции</a> --> <a href="ShellPhilipsRules.pdf">условиями акции</a>

                </label>
            </div>
        </div>
    @endif

    <div class="form-group">
        <button type="submit" class="btn btn-primary" {{ Auth::guard()->guest() ? 'disabled' : '' }}>{{ Auth::guard()->guest() ? 'Регистрация' : 'Сохранить' }}</button>
    </div>
</form>
