@extends('layouts.auth')

@section('content')
<p class="info-message">Проверьте свою почту, Вам было выслано письмо с подтверждением регистрации. Пожалуйста, убедитесь в корректности введенного адреса и в том, что письмо не попало в спам.</p>
<div class="icon-close"></div>
<script>$('#pop-up').show();</script>
@endsection
