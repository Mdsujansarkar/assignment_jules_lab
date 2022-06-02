<?php

use App\Http\Controllers\UrlShortController;
use Illuminate\Support\Facades\Route;



Route::get('/admin', function () {
    return view('backend.home.dashboard');
});

Route::get('/login', function () {
    return view('backend.auth.login');
});

Route::get('/', [UrlShortController::class, 'index'])->name('url.short');
Route::post('/url/short', [UrlShortController::class, 'store'])->name('url.short.store');