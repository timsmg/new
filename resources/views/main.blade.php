<style>
    .card {
        height: 100%;
    }

    .card-img-top {
        height: 150px; /* Задаём фиксированную высоту для изображений */
        object-fit: cover; /* Указываем, чтобы изображение обрезалось и заполняло контейнер */
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Распределяем текст внутри карточки */
        height: 100%;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 0.9rem;
        margin-top: auto; /* Отправляем текст к нижней части карточки */
    }
</style>

@extends('welcome')
@section('title', 'Главная страница')
@section('content')
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ПортфолиоСтроитель - Создайте впечатляющее портфолио</title>
        <style>
            /* Минимальные стили для читаемости */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Segoe UI', Arial, sans-serif;
            }
            * title {
                margin-left: 1000px
            }

            body {
                line-height: 1.6;
                color: #333;
                background-color: #f9f9f9;
            }


            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 20px;
            }

            header {
                background-color: #fff;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                padding: 15px 0;
            }
            .header-content {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .logo {
                font-size: 24px;
                font-weight: bold;
                color: #2c3e50;
                text-decoration: none;
                margin-bottom: 15px;
            }

            nav ul {
                display: flex;
                list-style: none;
                justify-content: center;
                flex-wrap: wrap;
            }

            nav ul li {
                margin: 0 12px;
            }

            @media (max-width: 768px) {
                /* Удаляем старые стили для мобильной версии, т.к. теперь они не нужны */
                nav ul li {
                    margin: 5px 8px;
                }
            }
            .header-content {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .logo {
                font-size: 24px;
                font-weight: bold;
                color: #2c3e50;
                text-decoration: none;
            }

            nav ul {
                display: flex;
                list-style: none;
            }

            nav ul li {
                margin-left: 25px;
            }

            nav ul li a {
                text-decoration: none;
                color: #2c3e50;
                font-weight: 500;
            }

            .hero {
                padding: 80px 0;
                text-align: center;
                background-color: #fff;
            }

            .hero h1 {
                font-size: 42px;
                margin-bottom: 20px;
                color: #2c3e50;
            }

            .hero p {
                font-size: 18px;
                max-width: 700px;
                margin: 0 auto 30px;
                color: #555;
            }

            .btn {
                display: inline-block;
                padding: 12px 30px;
                background-color: #3498db;
                color: white;
                text-decoration: none;
                border-radius: 4px;
                font-weight: 600;
                transition: background-color 0.3s;
            }

            .features {
                padding: 60px 0;
                background-color: #f5f7fa;
            }

            .section-title {
                text-align: center;
                margin-bottom: 50px;
                font-size: 32px;
                color: #2c3e50;
            }

            .features-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 30px;
            }

            .feature-card {
                background-color: white;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            }

            .feature-icon {
                font-size: 40px;
                margin-bottom: 20px;
                color: #3498db;
            }

            .feature-card h3 {
                margin-bottom: 15px;
                color: #2c3e50;
            }

            .cta-section {
                padding: 80px 0;
                text-align: center;
                background-color: #2c3e50;
                color: white;
            }

            .cta-section h2 {
                font-size: 36px;
                margin-bottom: 20px;
            }

            .cta-section p {
                max-width: 700px;
                margin: 0 auto 30px;
                font-size: 18px;
            }

            .btn-secondary {
                background-color: #e74c3c;
            }

            footer {
                padding: 30px 0;
                text-align: center;
                background-color: #1a252f;
                color: #ecf0f1;
            }

            @media (max-width: 768px) {
                .header-content {
                    flex-direction: column;
                    text-align: center;
                }

                nav ul {
                    margin-top: 20px;
                    justify-content: center;
                }

                nav ul li {
                    margin: 0 10px;
                }

                .hero h1 {
                    font-size: 32px;
                }
            }

        </style>
    </head>
    <body>
    <!-- Шапка сайта -->
    <header>
        <div class="container">
            <div class="header-content">
                <a href="#" class="logo">ПортфолиоСтроитель</a>
                <nav>

                </nav>
            </div>
        </div>
    </header>

    <!-- Главный герой-секция -->
    <section class="hero">
        <div class="container">
            <h1>Создайте впечатляющее портфолио за считанные минуты</h1>
            <p>Профессиональные шаблоны, интуитивный редактор и все необходимые инструменты для презентации ваших работ в лучшем свете.</p>
            <a href="#" class="btn">Начать бесплатно</a>
        </div>
    </section>

    <!-- Секция с возможностями -->
    <section class="features">
        <div class="container">
            <h2 class="section-title">Почему выбирают нас</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🎨</div>
                    <h3>Современные шаблоны</h3>
                    <p>Выбирайте из более чем 50 профессионально разработанных шаблонов, которые адаптируются под любую сферу деятельности.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🚀</div>
                    <h3>Быстрая настройка</h3>
                    <p>Наш интуитивно понятный редактор позволяет создать портфолио за 15 минут без навыков программирования.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Адаптивный дизайн</h3>
                    <p>Все портфолио идеально отображаются на любых устройствах: от смартфонов до настольных компьютеров.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Призыв к действию -->
    <section class="cta-section">
        <div class="container">
            <h2>Начните создавать свое портфолио сегодня</h2>
            <p>Присоединяйтесь к более чем 100 000 профессионалов, которые уже используют ПортфолиоСтроитель для демонстрации своих работ.</p>
            <a href="#" class="btn btn-secondary">Создать портфолио</a>
        </div>
    </section>

    <!-- Подвал -->
    <footer>
        <div class="container">
            <p>&copy; 2023 ПортфолиоСтроитель. Все права защищены.</p>
            <p>Контакты: info@portfoliostroi.ru | +7 (999) 123-45-67</p>
        </div>
    </footer>
    </body>
    </html>

@endsection
