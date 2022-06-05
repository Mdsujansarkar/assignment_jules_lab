<?php

use App\Http\Controllers\UrlShortController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPanelController;
use Illuminate\Support\Facades\Route;




Route::get('/admin', [UrlShortController::class, 'adminDashboard'])->name('admin.filter');
Route::get('/login', [UrlShortController::class, 'adminLogin']);
Route::get('/', [UrlShortController::class, 'index'])->name('url.short');
Route::post('/url/short', [UrlShortController::class, 'store'])->name('url.short.store');
Route::post('/login/admin', [UserController::class, 'store'])->name('admin.login');

Route::post('/login/create', [UserController::class, 'store']);
Route::get('/user/signup', [UserController::class, 'registration'])->name('user.signup');
Route::post('/user/create', [UserController::class, 'create'])->name('user.registration');
Route::get('/admin/logout', [UserController::class, 'logout'])->name('admin.logout');
Route::get('/user/add', [UserController::class, 'userAdd'])->name('user.add');
Route::post('/user/login', [UserController::class, 'userLogin'])->name('user.login');

//user panel
Route::get('/user/panel', [UserPanelController::class, 'index'])->name('user.panel');

//Export csv
Route::get('/exportTo/{type}', [UrlShortController::class, 'export']);

Route::get('session/{id}', [UrlShortController::class, 'sessionTime'])->name('time.change');


