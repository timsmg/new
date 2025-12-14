@extends('admin.admin-panel')
@section('title','Добавление товара')
@section('content')
    <div class="container vh-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-10 col-md-4 p-5 bg-form" style="border-radius: 30px; background-color: #03045E">
                <h2 class="text-center mb-5 text-white">Добавление товара</h2>
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="name_product" placeholder="Название продукта" class="form-control @error('name_product') is-invalid @enderror" id="name_product">
                        @error('name_product')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" id="category_id">
                            <option selected disabled>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name_category }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <textarea name="description_product" placeholder="Описание продукта" class="form-control @error('description_product') is-invalid @enderror" id="description_product" rows="4"></textarea>
                        @error('description_product')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input type="number" name="price_product" placeholder="Цена продукта" class="form-control @error('price_product') is-invalid @enderror" id="price_product">
                        @error('price_product')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input type="file" name="image_product" class="form-control @error('image_product') is-invalid @enderror" id="image_product">
                        @error('image_product')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input type="text" name="country_product" placeholder="Страна производитель" class="form-control @error('country_product') is-invalid @enderror" id="country_product">
                        @error('country_product')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input type="number" name="count_product" placeholder="Количество на складе" class="form-control @error('count_product') is-invalid @enderror" id="count_product">
                        @error('count_product')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn mt-4 w-75 btn-primary">Добавить продукт</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
