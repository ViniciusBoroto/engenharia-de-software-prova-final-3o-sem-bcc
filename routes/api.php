<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Department;
use App\Models\Employee;


Route::controller(GenreController::class)->group(function () {
    Route::get('/genres', 'get');
    Route::get('/genres/{id}', 'details');
    Route::get('/genres/books', 'getWithBooks');
    Route::get('/genres/books/{id}', 'findBooks');
    Route::post('/genres', 'store');
    Route::patch('/genres/{id}', 'update');
    Route::delete('/genres/{id}', 'delete');
});

Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'get');
    Route::get('/authors/{id}', 'details');
    Route::get('/authors/books', 'getWithBooks');
    Route::get('/authors/books/{id}', 'findBooks');
    Route::post('/authors', 'store');
    Route::patch('/authors/{id}', 'update');
    Route::delete('/authors/{id}', 'delete');
});

Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'get');
    Route::get('/books/detailed', 'allDetailed');
    Route::get('/books/{id}', 'details');
    Route::get('/books/{id}/reviews', 'findReviews');
    Route::post('/books', 'store');
    Route::patch('/books/{id}', 'update');
    Route::delete('/books/{id}', 'delete');
});

Route::controller(ReviewController::class)->group(function () {
    Route::get('/reviews', 'get');
    Route::get('/reviews/{id}', 'details');
    Route::post('/reviews', 'store');
    Route::patch('/reviews/{id}', 'update');
    Route::delete('/reviews/{id}', 'delete');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'get');
    Route::get('/users/{id}', 'details');
    Route::post('/users', 'store');
    Route::patch('/users/{id}', 'update');
    Route::delete('/users/{id}', 'delete');
});