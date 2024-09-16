<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('news', [NewsController::class, 'index'])->name('news.index');
Route::get('news/show/{item}', [NewsController::class, 'show'])->name('news.show');
