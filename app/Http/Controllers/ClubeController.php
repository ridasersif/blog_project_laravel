<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'] );

Route::resource('articles', ArticleController::class);
Route::post('/articles/toggle-status/{id}', [ArticleController::class, 'toggleStatus'])->name('articles.toggleStatus');

Route::resource('categories', CategoryController::class);



