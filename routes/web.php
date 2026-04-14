<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [ShopController::class, 'home'])->name('home');
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/product/{id}', [ShopController::class, 'product'])->name('product')->where('id', '[0-9]+');
Route::get('/cart', [ShopController::class, 'cart'])->name('cart');
