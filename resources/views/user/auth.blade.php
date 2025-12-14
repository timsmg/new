@extends('welcome')
@section('title', 'Авторизация')
@section('content')
    <div class="container vh-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-10 col-md-4 p-5 bg-form" style="border-radius: 30px; background-color: #03045E">
                <h2 class="text-center mb-5 text-white">Авторизация</h2>
                <form method="POST">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="login" placeholder="Ваш логин" class="form-control @error('login') is-invalid @enderror" id="login">
                        @error('login')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password" placeholder="Ваш парол" class="form-control @error('password') is-invalid @enderror" id="password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn mt-4 w-50 btn-primary">Войти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
