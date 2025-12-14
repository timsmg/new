@extends('welcome')
@section('title', 'Регистрация')
@section('content')
    <div class="container vh-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-10 col-md-4 p-5 bg-form" style="border-radius: 30px; background-color: #03045E">
                <h2 class="text-center mb-5 text-white">Регистрация</h2>
                <form method="POST">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="login" placeholder="Придумайте логин" class="form-control @error('login') is-invalid @enderror" id="login">
                        @error('login')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input type="text" name="full_name" placeholder="Ваше ФИО" class="form-control @error('full_name') is-invalid @enderror" id="full_name">
                        @error('full_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input type="text" name="number_phone" placeholder="Ваш номер телефона" class="form-control @error('number_phone') is-invalid @enderror" id="number_phone">
                        @error('number_phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password" placeholder="Придумайте пароль" class="form-control @error('password') is-invalid @enderror" id="password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input type="password" name="repeat_password" placeholder="Повторите пароль" class="form-control @error('repeat_password') is-invalid @enderror" id="repeat_password">
                        @error('repeat_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="check" class="form-check-input @error('check') is-invalid @enderror" id="check">
                        <label class="form-check-label text-white" for="check">Соглашаюсь с условиями</label>
                        @error('check')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn mt-4 w-75 btn-primary">Зарегистрироваться</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
