<?php

use App\Http\Livewire\BookForm;
use App\Http\Livewire\BookShow;
use App\Http\Livewire\BooksList;
use App\Http\Livewire\CategoryForm;
use App\Http\Livewire\CategoryList;
use Illuminate\Support\Facades\Route;

//List of Books
Route::get('/', BooksList::class)->name('home')->middleware('auth');

Route::get('/books/crear', BookForm::class)->name('books.create')->middleware('auth');
Route::get('/books/{book}/edit', BookForm::class)->name('books.edit')->middleware('auth');
Route::get('/show/{book}', BookShow::class)->name('books.show')->middleware('auth');

Route::get('/categories', CategoryList::class)->name('categories.list')->middleware('auth');
Route::get('/categories/crear', CategoryForm::class)->name('categories.create')->middleware('auth');
Route::get('/categories/{category}/edit', CategoryForm::class)->name('categories.edit')->middleware('auth');

