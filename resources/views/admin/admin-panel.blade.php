@extends('welcome')
@section('title', 'Админская панель')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-12 d-flex flex-wrap justify-content-center mt-5 gap-4">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        Управление товарами
                    </button>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('createProduct')}}"><li>Создать товар</li></a>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <a class="dropdown-item" href="{{route('productList')}}"><li>Таблица товаров</li></a>
                        <li>
                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                Добавление категории
                            </button>
                        </li>
                    </ul>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Добавление категории</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <form action="{{route('categoryCreate')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <input class="form-control" type="text" name="name_category" id="name_category"
                                               placeholder="Название категории">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        Управление заказами
                    </button>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('tableOrders')}}"><li>Таблица заказов</li></a>
                    </ul>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
