<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('books', BookController::class);
// Route::delete('/delete/{BookID}', [BookController::class, 'destroy'])->name('books.destroy');