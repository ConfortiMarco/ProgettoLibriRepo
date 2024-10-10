<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/authors',[\App\Http\Controllers\AuthorController::class,'index'])->name('authors.index');

Route::get('/createauthors',[\App\Http\Controllers\AuthorController::class,'create'])->name('create.author');

Route::post('/storeauthors',[\App\Http\Controllers\AuthorController::class,'store'])->name('store.author');

Route::get('/editauthor/{id}',[\App\Http\Controllers\AuthorController::class,'edit'])->name('edit.author');

Route::post('/updateauthors/{id}',[\App\Http\Controllers\AuthorController::class,'update'])->name('update.author');

Route::post('/destroyauthor/{id}',[\App\Http\Controllers\AuthorController::class,'destroy'])->name('destroy.author');



Route::get('/categories',[\App\Http\Controllers\CategoryController::class,'index'])->name('categories.index');

Route::get('/createcategory',[\App\Http\Controllers\CategoryController::class,'create'])->name('create.category');

Route::post('/storecategory',[\App\Http\Controllers\CategoryController::class,'store'])->name('store.category');

Route::get('/editcategory/{id}',[\App\Http\Controllers\CategoryController::class,'edit'])->name('edit.category');

Route::post('/updatecategory/{id}',[\App\Http\Controllers\CategoryController::class,'update'])->name('update.category');

Route::post('/destroycategory/{id}',[\App\Http\Controllers\CategoryController::class,'destroy'])->name('destroy.category');



Route::get('/',[\App\Http\Controllers\BookController::class,'index'])->name('books.index');

Route::get('/createbook',[\App\Http\Controllers\BookController::class,'create'])->name('create.book');

Route::post('/storebook',[\App\Http\Controllers\BookController::class,'store'])->name('store.book');

Route::get('/editbook/{id}',[\App\Http\Controllers\BookController::class,'edit'])->name('edit.book');

Route::post('/updatebook/{id}',[\App\Http\Controllers\BookController::class,'update'])->name('update.book');

Route::post('/destroybook/{id}',[\App\Http\Controllers\BookController::class,'destroy'])->name('destroy.book');

Route::get('/showbook/{id}',[\App\Http\Controllers\BookController::class,'show'])->name('show.book');
