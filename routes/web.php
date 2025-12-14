<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main');
})->name('main');

Route::view('/about', 'about')->name('about');

Route::view('/auth','user.auth')->name('login');
Route::post('/auth',[UserController::class,'loginPost'])->name('login');
Route::view('/register','user.register')->name('register');
Route::post('/register',[UserController::class, 'registrationPost']);
Route::get('/catalog',[CatalogController::class, 'viewCatalog'])->name('catalog');
Route::get('/catalog/product/{productID}',[ProductController::class, 'getCardProducts'])->name('product');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout',[UserController::class, 'logout'])->name('logout');
    Route::post('/catalog/createBasketItem/{productId}',[BasketController::class, 'createBasketItem'])->name('createBasketItem');
    Route::post('/catalog/product/addReview/{productID}',[ReviewController::class, 'addReview'])->name('addReview');
    Route::get('/basket',[BasketController::class, 'getBasketItems'])->name('basket');
    Route::post('/basket/decrease/{basketId}', [BasketController::class, 'decreaseProductCount'])->name('decreaseProductCount');
    Route::post('/basket/increase/{basketId}', [BasketController::class, 'increaseProductCount'])->name('increaseProductCount');
    Route::post('/basket/createOrder', [OrderController::class, 'createOrder'])->name('createOrder');
    Route::get('/myOrders', [OrderController::class, 'getUserOrder'])->name('myOrders');
    Route::group(['middleware' => 'role'], function () {
        Route::view('/admin','admin.admin-panel')->name('admin');
        Route::post('/admin/categoryCreate',[CategoryController::class, 'createCategory'])->name('categoryCreate');
        Route::get('/admin/createProduct',[CategoryController::class, 'getCategories'])->name('createProduct');
        Route::post('/admin/createProduct',[ProductController::class, 'createProduct']);
        Route::get('/admin/productList',[ProductController::class, 'getProductsAdmin'])->name('productList');
        Route::delete('/admin/removeProduct/{productId}',[ProductController::class, 'removeProduct'])->name('removeProduct');
        Route::get('/admin/tableOrders',[OrderController::class, 'getAllOrders'])->name('tableOrders');
        Route::post('/orders/change-status', [OrderController::class, 'changeStatus'])->name('orders.changeStatus');
    });
});


