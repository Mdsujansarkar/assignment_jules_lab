<?php

use App\Http\Controllers\UrlShortController;
use Illuminate\Support\Facades\Route;



Route::get('/admin', function () {
    return view('backend.home.dashboard');
});
Route::get('/', function () {
    return view('frontend.home.home');
});
Route::get('/login', function () {
    return view('backend.auth.login');
});

Route::get('/url-short', [UrlShortController::class, 'index'])->name('url-short');