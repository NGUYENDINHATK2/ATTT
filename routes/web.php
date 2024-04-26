<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('home', App\Http\Controllers\HomeController::class)->middleware('auth');

Route::resource('post', App\Http\Controllers\PostController::class)->middleware('auth');