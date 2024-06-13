<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [BooksController::class, 'index'])->name('books.index');
Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
Route::post('/books', [BooksController::class, 'store'])->name('books.store');
Route::get('/books/{book}', [BooksController::class, 'show'])->name('books.show');
Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [BooksController::class, 'update'])->name('books.update');
Route::delete('/books/{book}', [BooksController::class, 'destroy'])->name('books.destroy');

Route::get('/books/{book}/chapters/create', [ChaptersController::class, 'create'])->name('chapters.create');
Route::post('/books/{book}/chapters', [ChaptersController::class, 'store'])->name('chapters.store');
Route::get('/books/{book}/chapters/{chapter}/edit', [ChaptersController::class, 'edit'])->name('chapters.edit');
Route::put('/books/{book}/chapters/{chapter}', [ChaptersController::class, 'update'])->name('chapters.update');
Route::delete('/books/{book}/chapters/{chapter}', [ChaptersController::class, 'destroy'])->name('chapters.destroy');

Route::post('/books/{book}/comments', [CommentsController::class, 'store'])->name('comments.store');
Route::delete('/books/{book}/comments/{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy');

