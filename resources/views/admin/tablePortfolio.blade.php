@extends('welcome')
@section('title', 'Таблица заказов')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Адрес</th>
                <th scope="col">Номер телефона</th>
                <th scope="col">ФИО получателя</th>
                <th scope="col">Номер заказа</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th>{{ $order->address }}</th>
                    <th>{{ $order->phone }}</th>
                    <th>{{ $order->user->full_name }}</th>
                    <th>{{ $order->id }}</th>
                    <th>
                        @if($order->status == 'Получен')
                            <span class="badge bg-success">{{ $order->status }}</span>
                        @else
                            <form action="{{ route('orders.changeStatus') }}" method="post">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <select name="status" id="status-{{ $order->id }}" class="form-select">
                                    <option value="В обработке" {{ $order->status == 'В обработке' ? 'selected' : '' }}>В обработке</option>
                                    <option value="Отправлен" {{ $order->status == 'Отправлен' ? 'selected' : '' }}>Отправлен</option>
                                    <option value="Получен" {{ $order->status == 'Получен' ? 'selected' : '' }}>Получен</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Изменить статус</button>
                            </form>
                        @endif
                    </th>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
@endsection
