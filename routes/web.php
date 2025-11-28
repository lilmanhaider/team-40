<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'homepage')->name('homepage');
Route::view('/', 'productpage')->name('productpage');
Route::view('/', 'homepage')->name('homepage');
Route::view('/', 'homepage')->name('homepage');
Route::view('/', 'homepage')->name('homepage');
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/home', function () {
    return "You are logged in!";
})->middleware('auth');