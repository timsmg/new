@php use Illuminate\Support\Facades\Auth; @endphp
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container d-flex align-items-center">
        <a href="{{route('main')}}"><img src="{{asset('assets/images/logo.png')}}" height="50px" alt=""
                                         class="me-3"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('main')}}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('catalog')}}">Создать</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">О нас</a>
                </li>
            </ul>
            <div class="d-flex gap-3">
                @auth()
                    @if(Auth::user()->is_admin)
                        <a href="{{ route('admin') }}" class="btn text-white btn-info">Панель админа</a>
                    @endif
                    @if(!Auth::user()->is_admin)
                            <a href="{{route('basket')}}" class="btn btn-primary">Корзина</a>
                            <a class="btn btn-primary" href="{{route('myOrders')}}">Мои заказы</a>
                    @endif
                    <a href="{{ route('logout') }}" class="btn btn-danger">Выйти</a>
                @endauth

                @guest()
                        <a href="{{route('login')}}"><div class="btn btn-primary">Вход</div></a>
                        <a href="{{route('register')}}"><div class="btn text-white btn-info">Зарегистрироваться</div></a>
                @endguest
            </div>
        </div>
    </div>
</nav>
