@extends('welcome')
@section('title', 'О нас')
@section('content')

    <div class="container my-5">
        <div class="text-center mb-4">
            <h1>О нас</h1>

        </div>

        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <img src="{{ asset('assets/images/company.png') }}" class="img-fluid rounded" alt="">
            </div>
            <div class="col-md-6">
                <h2>Кто мы?</h2>
                <p>
                    ПортфолиоСтроитель — это инновационная платформа, созданная в 2020 году для помощи профессионалам в демонстрации своих работ и достижений. Мы верим, что каждый талант заслуживает быть увиденным.
                </p>
                <p>
                    Наша команда состоит из дизайнеров, разработчиков и карьерных консультантов, которые объединились с общей целью — сделать процесс создания портфолио простым, быстрым и эффективным для специалистов любой сферы.                </p>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-4 text-center">
                <img src="{{ asset('assets/images/mission.png') }}" class="mb-3" style="height: 100px;" alt="Миссия">
                <h4>Наша миссия</h4>
                <p>Сделать создание профессионального портфолио доступным для каждого, независимо от технических навыков или бюджета.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('assets/images/shared-vision.png') }}" class="mb-3" style="height: 100px;" alt="Видение">
                <h4>Наше видение</h4>
                <p>Стать ведущей мировой платформой для презентации профессиональных достижений и поиска талантов.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('assets/images/values.png') }}" class="mb-3" style="height: 100px;" alt="Ценности">
                <h4>Наши ценности</h4>
                <p>Доступность, качество, инновации и поддержка сообщества профессионалов.</p>
            </div>
        </div>

        <div class="bg-light p-5 rounded">
            <h2 class="text-center mb-4">Почему выбирают нас?</h2>
            <ul class="list-group list-group-flush">
                <li>Более 50 профессионально разработанных шаблонов портфолио</li>
                <li>Интуитивно понятный конструктор без необходимости навыков программирования</li>
                <li>Полная адаптивность для всех устройств</li>
                <li>Интеграция с социальными сетями и профессиональными платформами</li>
                <li>Надежный хостинг и техническая поддержка 24/7</li>
                <li>Регулярное обновление функционала и добавление новых возможностей</li>
            </ul>
        </div>
    </div>

@endsection
