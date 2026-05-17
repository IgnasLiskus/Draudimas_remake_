<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LangController;

Route::get('/', function () {
    return redirect('/owners');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/lang/{lang}', [LangController::class, 'changeLanguage'])->name('lang.change');

// VISI prisijungę gali MATYTI
Route::middleware('auth')->group(function () {
    Route::resource('owners', OwnerController::class);
    Route::resource('cars', CarController::class);
});

// TIK ADMIN gali CRUD
Route::middleware(['auth', 'role'])->group(function () {

    Route::resource('owners', OwnerController::class)
        ->except(['index', 'show']);

    Route::resource('cars', CarController::class)
        ->except(['index', 'show']);

});
