@extends('layouts.auth')

@section('content')
<p class="info-message">Проверьте свою почту, Вам было выслано письмо с подтверждением регистрации. Если письма нет, проверьте правильность адреса e-mail. Если адрес правильный, проверьте спам, письмо могло попасть туда.</p>
<div class="icon-close"></div>
<script>$('#pop-up').show();</script>
@endsection
