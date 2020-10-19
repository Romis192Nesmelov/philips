@extends('layouts.auth')

@section('content')
@include('auth._register_block')
<script>$('#pop-up').show();</script>
@endsection
