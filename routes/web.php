<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\CategoryController;


Route::resource('books', BookController::class);
Route::resource('book-categories', BookCategoryController::class);
Route::resource('categories', BookCategoryController::class);
Route::resource('categories', CategoryController::class);



