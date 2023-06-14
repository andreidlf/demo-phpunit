<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthorController::class)->group(function () {
    Route::get('/author', 'index')->name('author.list');
//    Route::get('/author/{author}', 'show')->name('author.show')->where('author', '[0-9]+');

    Route::get('/author/create', 'create')->name('author.create');
    Route::post('/author', 'store')->name('author.store');

    Route::get('/author/edit/{author}', 'edit')->name('author.edit');
    Route::post('/author/update/{author}', 'update')->name('author.update');

    Route::get('/author/delete/{author}', 'destroy')->name('author.delete');
});

Route::controller(BookController::class)->group(function () {
    Route::get('/author/{author}/book', 'index')->where('author', '[0-9]+')->name('book.list');
//    Route::get('/book/{book}', 'show')->name('book.show')->where('book', '[0-9]+');

    Route::get('/author/{author}/book/create', 'create')->where('author', '[0-9]+')->name('book.create');
    Route::post('/book', 'store')->name('book.store');

    Route::get('/book/edit/{book}', 'edit')->name('book.edit');
    Route::post('/book/update/{book}', 'update')->name('book.update');

    Route::get('/book/delete/{book}', 'destroy')->name('book.delete');
});
