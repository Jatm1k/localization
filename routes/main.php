<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home.index')->name('home');
Route::view('/placeholders', 'placeholders.index')->name('placeholders');

Route::get('language/{language}', LanguageController::class)->name('language');
