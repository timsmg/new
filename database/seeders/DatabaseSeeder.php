<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::insert([
                'login' => 'User',
                'full_name' => 'Иванов Иван Иванович',
                'number_phone' => '89238228388',
                'password' => Hash::make('123456'),
        ]);

        User::insert([
            'login'=>'admin',
            'full_name'=>'admin',
            'number_phone'=>'admin',
            'password'=>Hash::make('admin'),
            'is_admin'=>true,
        ]);

        Category::insert([
            [
                'name_category'=>'Стиральная машина'
            ],
            [
                'name_category'=>'Холодильник'
            ],
            [
                'name_category'=>'Микроволновая печь'
            ],
            [
                'name_category'=>'Электрический чайник'
            ],
            [
                'name_category'=>'Пылесос'
            ],
        ]);

        Product::insert([
            [
                'name_product' => 'Стиральная машина LG',
                'description_product' => 'Стиральная машина с фронтальной загрузкой, 8 кг, 1200 об/мин, с функцией паровой стирки.',
                'price_product' => 29999,
                'category_id'=>'1',
                'image_product' => 'stiralka.jpeg',
                'country_product' => 'Южная Корея'
            ],
            [
                'name_product' => 'Холодильник Samsung',
                'description_product' => 'Холодильник с морозильной камерой, объем 350 л, класс энергопотребления A++.',
                'price_product' => 45999,
                'category_id'=>'2',
                'image_product' => 'holodilnik.png',
                'country_product' => 'Южная Корея'
            ],
            [
                'name_product' => 'Микроволновая печь Panasonic',
                'description_product' => 'Микроволновая печь с грилем, мощность 1000 Вт, объем 20 л.',
                'price_product' => 8999,
                'category_id'=>'3',
                'image_product' => 'microvolnovka.jpg',
                'country_product' => 'Япония'
            ],
            [
                'name_product' => 'Электрический чайник Philips',
                'description_product' => 'Чайник с функцией автоматического отключения, объем 1.7 л, мощность 2200 Вт.',
                'price_product' => 2999,
                'category_id'=>'4',
                'image_product' => 'chainik.jpg',
                'country_product' => 'Нидерланды'
            ],
            [
                'name_product' => 'Пылесос Dyson',
                'description_product' => 'Беспроводной пылесос с мощной всасывающей способностью и HEPA-фильтром.',
                'price_product' => 24999,
                'category_id'=>'5',
                'image_product' => 'pilesos.jpg',
                'country_product' => 'Великобритания'
            ],
        ]);

        Review::insert([
            [
                'name_review' => 'Дима',
                'text_review' => 'Я очень доволен этой покупкой. Работает безупречно.',
                'product_id' => 1,
            ],
            [
                'name_review' => 'Оля',
                'text_review' => 'Качество на высоте, рекомендую всем!',
                'product_id' => 1,
            ],
            [
                'name_review' => 'Андрей',
                'text_review' => 'Продукт неплохой, но есть некоторые недостатки.',
                'product_id' => 1,
            ],

            [
                'name_review' => 'Павел',
                'text_review' => 'Превосходный товар, полностью оправдал ожидания.',
                'product_id' => 2,
            ],
            [
                'name_review' => 'Света',
                'text_review' => 'Лучший продукт в своем классе!',
                'product_id' => 2,
            ],
            [
                'name_review' => 'Коля',
                'text_review' => 'В целом, продукт хороший, но есть нюансы.',
                'product_id' => 2,
            ],

            [
                'name_review' => 'Андрей',
                'text_review' => 'К сожалению, продукт не оправдал моих ожиданий.',
                'product_id' => 3,
            ],
            [
                'name_review' => 'Маша',
                'text_review' => 'Продукт средний, есть лучше.',
                'product_id' => 3,
            ],
            [
                'name_review' => 'Макс',
                'text_review' => 'В целом, неплохо, но есть куда расти.',
                'product_id' => 3,
            ],

            [
                'name_review' => 'Влад',
                'text_review' => 'Продукт просто супер, всем рекомендую!',
                'product_id' => 4,
            ],
            [
                'name_review' => 'Толя',
                'text_review' => 'Очень доволен покупкой, спасибо!',
                'product_id' => 4,
            ],
            [
                'name_review' => 'Гриша',
                'text_review' => 'Хороший продукт, буду заказывать еще.',
                'product_id' => 4,
            ],

            [
                'name_review' => 'Андрей',
                'text_review' => 'Продукт неплохой, но ожидал большего.',
                'product_id' => 5,
            ],
            [
                'name_review' => 'Дима',
                'text_review' => 'В целом, продукт хороший, но есть недостатки.',
                'product_id' => 5,
            ],
            [
                'name_review' => 'Лёня',
                'text_review' => 'Продукт сойдет, но не без недостатков.',
                'product_id' => 5,
            ],
        ]);
    }
}
