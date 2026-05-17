<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return redirect('/owners');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('owners', OwnerController::class);
Route::resource('cars', CarController::class);
