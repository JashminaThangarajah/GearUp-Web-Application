<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth.register');
});


Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/checkout/{productId}', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
Route::get('/cart/{productId}', [App\Http\Controllers\CartController::class, 'index'])->name('cart');


// Route::get('/create',[ContactController::class,'create']);
// Route::post('/store',[ContactController::class,'store']);
// Route::get('/index',[ContactController::class,'index']);
// Route::get('/edit/{id}',[ContactController::class,'edit']);
// Route::get('/update/{id}',[ContactController::class,'update']);
// Route::get('/delete/{id}',[ContactController::class,'destroy']);

// Route::post('user', 'UserController@store');
// Route::get('products', 'ProductController@index');
// Route::post('cart', 'CartController@store');
// Route::put('cart/{id}', 'CartController@update');
// Route::delete('cart/{id}', 'CartController@destroy');
// Route::post('order', 'OrderController@store');




