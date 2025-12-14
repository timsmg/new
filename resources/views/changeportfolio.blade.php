@extends('welcome')

@section('title', 'Мои заказы')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Мои заказы</h2>
        @foreach($orders as $order)
            <div class="card mb-3">
                <div class="card-header">
                    Заказ #{{ $order->id }} - Статус:
                    <span style="color:
        @if($order->status === 'Получен') green
        @elseif($order->status === 'Отправлен') blue
        @else orange
        @endif;">
        {{ $order->status }}
    </span>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Адрес: {{ $order->address }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Телефон: {{ $order->phone }}</h6>
                    <ul class="list-group">
                        @foreach($order->basketItems as $item)
                            <li class="list-group-item">
                                Товар: {{ $item->product->name_product }} - Количество: {{ $item->countProducts }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endsection

