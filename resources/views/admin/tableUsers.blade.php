@extends('welcome')
@section('title', 'Таблица продуктов')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <h1>Таблица товаров</h1>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название товара</th>
                <th scope="col">Цена</th>
                <th scope="col">Категория</th>
                <th scope="col">Описание</th>
                <th scope="col">Изображение</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th style=" vertical-align: middle;">{{$product->id}}</th>
                    <th style=" vertical-align: middle;">{{$product->name_product}}</th>
                    <th style=" vertical-align: middle;">{{$product->price_product}}</th>
                    <th style=" vertical-align: middle;">{{$product->category->name_category}}</th>
                    <th style=" vertical-align: middle;">{{$product->description_product}}</th>
                    <th style=" vertical-align: middle;">
                        <img src="{{asset('storage/' . $product->image_product)}}" alt="" style="width: 100px">
                    </th>
                    <th style=" vertical-align: middle;">
                        <form action="{{route('removeProduct', ['productId' => $product->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Удалить</button>
                        </form>
                    </th>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection
