<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\CarPhotoController;

Route::get('/', function () {
    return redirect('/owners');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/lang/{lang}', [LangController::class, 'changeLanguage'])->name('lang.change');

Route::middleware('auth')->group(function () {
    Route::resource('owners', OwnerController::class);
    Route::resource('cars', CarController::class);

    Route::post('/cars/{car}/photos', [CarPhotoController::class, 'store'])
        ->name('cars.photos.store');
    Route::delete('/cars/photos/{photo}', [CarPhotoController::class, 'destroy'])
        ->name('cars.photos.destroy');
});
