<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterController;

Route::get('/', [HomeController::class, 'home'])->name('HalamanHome');
Route::get('/about', [HomeController::class, 'about'])->name('HalamanAbout');
Route::get('/blog', [HomeController::class, 'blog'])->name('HalamanBlog');
Route::get('/dblog', [HomeController::class, 'dblog'])->name('HalamanDBlog');
Route::get('/carerr', [HomeController::class, 'carerr'])->name('HalamanCarerr');
Route::get('/dcarerr', [HomeController::class, 'dcarerr'])->name('HalamanDCarerr');
Route::get('/dportfolio', [HomeController::class, 'dportfolio'])->name('HalamanDPortfolio');
