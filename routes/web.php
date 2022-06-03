<?php

use App\Http\Controllers\UrlShortController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/admin', function () {
    return view('backend.home.dashboard');
});

Route::get('/login', function () {
    return view('backend.auth.login');
});

Route::get('/', [UrlShortController::class, 'index'])->name('url.short');
Route::post('/url/short', [UrlShortController::class, 'store'])->name('url.short.store');
Route::post('/login/admin', [UserController::class, 'store'])->name('admin.login');

Route::get('/login', [UserController::class, 'store']);
Route::get('/user/signup', [UserController::class, 'registration'])->name('user.signup');
Route::post('/user/create', [UserController::class, 'create'])->name('user.registration');


