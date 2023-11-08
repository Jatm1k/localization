<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LanguageController;

Route::view('/', 'home.index')->name('home');
Route::view('/placeholders', 'placeholders.index')->name('placeholders');
Route::view('/pluralization', 'pluralization.index')->name('pluralization');

Route::get('blog', BlogController::class)->name('blog');

Route::get('language/{language}', LanguageController::class)->name('language');
