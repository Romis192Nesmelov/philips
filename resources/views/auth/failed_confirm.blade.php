@extends('layouts.auth')

@section('content')
<p class="info-message">Ошибка проверки адреса почты. Возможно Вы перешли по устаревшей ссылке для подтверждения регистрации.</p>
<div class="icon-close"></div>
<script>$('#pop-up').show();</script>
@endsection
