<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <script src="{{asset('assets/js/bootstrap.bundle.js')}}"></script>
    <title>@yield('title', 'Портфолио')</title>
</head>
<body>
@if(session('logout'))
    <div
        class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 shadow"
        style="z-index: 1050; background-color: #f6ebc0; color: rgba(251,171,18,0.73)" role="alert">
        {{ session('logout') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
    </div>
@endif
@if(session('successBasket'))
    <div
        class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 shadow"
        style="z-index: 1050; background-color: #f6ebc0; color: rgba(251,171,18,0.73)" role="alert">
        {{ session('successBasket') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
    </div>
@endif
@include('components.header')
@yield('content')
</body>
</html>
