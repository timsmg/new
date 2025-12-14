<style>
    .grid-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .card {
        width: 100%;
    }
</style>
@extends('welcome')
@section('title','Корзина')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <h1>Корзина</h1>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Оформить заказ
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Оформление заказа</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('createOrder')}}" method="POST">
                            @csrf
                            <div class="form-group"><label for="address">Адрес доставки:</label> <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="address"
                                                                                                        name="address"
                                                                                                        required></div>
                            <div class="form-group"><label for="phone">Номер телефона:</label> <input type="text"
                                                                                                      class="form-control"
                                                                                                      id="phone"
                                                                                                      name="phone"
                                                                                                      required></div>
                            <button type="submit" class="btn btn-primary">Оформить заказ</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="grid-container">
            @foreach($basketItems as $item)
                <div class="card">
                    <img src="{{asset('storage/' . $item->product->image_product)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->product->price_product}}</h5>
                        <p class="card-text">{{$item->product->name_product}}</p>
                        <p class="card-text">{{$item->product->category->name_category}}</p>
                        <div style=" display: flex; vertical-align: center">
                            <form action="{{ route('decreaseProductCount', ['basketId' => $item->id]) }}" method="POST"
                                  class="me-2">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">-</button>
                            </form>
                            <p class="card-text mt-1">{{ $item->countProducts }}</p>
                            <form action="{{ route('increaseProductCount', ['basketId' => $item->id]) }}" method="POST"
                                  class="ms-2">
                                @csrf
                                <button type="submit" class="btn btn-outline-success btn-sm">+</button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
