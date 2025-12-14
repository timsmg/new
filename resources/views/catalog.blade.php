<style>
    .portfolio-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        padding: 20px 0;
    }

    .portfolio-item {
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease;
        background: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .portfolio-item:hover {
        transform: translateY(-5px);
    }

    .portfolio-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .portfolio-content {
        padding: 20px;
    }

    .portfolio-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin: 10px 0;
    }

    .tag {
        background: #f0f0f0;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.9em;
    }

    .portfolio-btn {
        display: inline-block;
        padding: 8px 20px;
        background: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .portfolio-btn:hover {
        background: #0056b3;
        color: white;
    }
</style>

@extends('welcome')
@section('title', 'Портфолио')
@section('content')
    <div class="container">
        <div class="text-center py-5">
            <h1 class="display-4 mb-3">Все портфолио</h1>
            <p class="lead text-muted">Здесь собраны лучшие работы и проекты</p>
        </div>

        <div class="filtration mb-5">
            <form class="d-flex gap-3 justify-content-center" method="GET">
                @csrf
                <select class="form-control w-25" name="category" id="category">
                    <option value="">Все категории</option>
                    <option value="web">Веб-разработка</option>
                    <option value="design">Дизайн</option>
                    <option value="mobile">Мобильные приложения</option>
                    <option value="other">Другие проекты</option>
                </select>
                <select class="form-select w-25" name="sort_date" id="">
                    <option value="new">Сначала новые</option>
                    <option value="old">Сначала старые</option>
                </select>
                <button type="submit" class="btn btn-primary">Фильтровать</button>
            </form>
        </div>

        <div class="portfolio-container">
            @foreach($products as $project)
                <div class="portfolio-item">
                    @if($project->image_product)
                        <img src="{{ asset('storage/' . $project->image_product) }}"
                             class="portfolio-image"
                             alt="{{ $project->name_product }}">
                    @else
                        <div class="portfolio-image bg-light d-flex align-items-center justify-content-center">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>
                    @endif

                    <div class="portfolio-content">
                        <h4 class="mb-2">{{ $project->name_product }}</h4>

                        <div class="portfolio-tags">
                            <span class="tag">{{ $project->category->name_category ?? 'Проект' }}</span>
                            @if($project->price_product)
                                <span class="tag">{{ $project->price_product }}</span>
                            @endif
                        </div>

                        <p class="card-text mb-3">
                            {{ Str::limit($project->description ?? 'Описание проекта', 120) }}
                        </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="portfolio-btn">Подробнее</a>
                            <small class="text-muted">
                                {{ $project->created_at ? $project->created_at->format('d.m.Y') : '' }}
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Блок "Обо мне" --}}
        <div class="row mt-5 py-5">
            <div class="col-md-4">
                <img src="assets/images/portfolio.png"
                     class=""
                     alt="Фото">
            </div>
            <div class="col-md-8">
                <h2>Обо мне</h2>
                <p class="lead">Привет! Я занимаюсь разработкой и дизайном. Здесь вы можете увидеть мои работы.</p>
                <p>Свяжитесь со мной для обсуждения вашего проекта:</p>
                <a href="mailto:email@example.com" class="btn btn-outline-primary">Написать</a>
            </div>
            <button type="submit" class="btn btn-primary">Создать портфолио</button>
        </div>
    </div>
@endsection
