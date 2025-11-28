<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::view('/', 'homepage')->name('homepage');
Route::view('/product', 'productpage')->name('productpage');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/profile', 'profile')->name('profile');
Route::view('/cart', 'cart')->name('cart');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/home', function () {
    return "You are logged in!";
})->middleware('auth')->name('home');