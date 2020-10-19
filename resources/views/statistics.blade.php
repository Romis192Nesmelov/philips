@extends('layouts.mail')

@section('content')

<h1 class="section-title">{{ $head }}</h1>
<table class="table table-striped table-bordered statistic">
    <th>Дата</th>
    <th>Зарегистрировано промокодов</th>
    <th>Получено скидок 30%</th>
    <th>Получено скидок 40%</th>
    <th>Получено скидок 50%</th>
    <th>Сделано заказов</th>
    @foreach ($statistics as $statistic)
        <tr>
            <td>{{ $statistic['date'] }}</td>
            <td>{{ $statistic['promoRegister'] }}</td>
            <td>{{ $statistic['gotDiscount30'] }}</td>
            <td>{{ $statistic['gotDiscount40'] }}</td>
            <td>{{ $statistic['gotDiscount50'] }}</td>
            <td>{{ $statistic['ordersDone'] }}</td>
        </tr>
    @endforeach
</table>

@endsection