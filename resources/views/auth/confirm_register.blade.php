@extends('layouts.auth')

@section('content')
<p class="info-message">Проверьте свою почту, Вам было выслано письмо с подтверждением регистрации. Проверьте также спам, письмо могло попасть туда.</p>
<div class="icon-close"></div>
<script>$('#pop-up').show();</script>
@endsection
