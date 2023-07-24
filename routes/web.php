<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BooksController;
use App\Exports\BookExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BooksExportPDF;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



///////////// CATEGORY///////////
Route::get('/category',[CategoryController::class,'index'])->name('category.index');

Route::get('/',[CategoryController::class,'home'])->name('category.app');

Route::get('category/create',[CategoryController::class,'create'])
    ->name('category.create')->middleware('auth');

Route::post('category/store',[CategoryController::class,'store'])->name('category.store')->middleware('auth');
Route::get('category/filter/{id}',[CategoryController::class,'filter'])->name('category.filter');
Route::get('category/show/{id}',[CategoryController::class,'show'])->name('category.show')->middleware('auth');
Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit')->middleware('auth');
Route::put('category/update/{id}',[CategoryController::class,'update'])->name('category.update')->middleware('auth');;
Route::delete('category/delete/{id}', [CategoryController::class,'delete'])->name('category.delete')->middleware('auth');


///////////// BOOKS //////////
Route::get('/book',[BooksController::class,'index'])->name('book.index');

Route::get('/books',[BooksController::class,'home'])
    ->name('book.app');

Route::get('book/create',[BooksController::class,'create'])
    ->name('book.create')->middleware('auth');

Route::post('book/store',[BooksController::class,'store'])->name('book.store')->middleware('auth');

Route::get('book/show/{id}',[BooksController::class,'show'])->name('book.show')->middleware('auth');
Route::get('book/edit/{id}',[BooksController::class,'edit'])->name('book.edit')->middleware('auth');
Route::put('book/update/{id}',[BooksController::class,'update'])->name('book.update')->middleware('auth');;
Route::delete('book/delete/{id}', [BooksController::class,'delete'])->name('book.delete')->middleware('auth');

Route::get('/search', [BooksController::class, 'search'])->name('search');

//////////////////////////////// EXPORT BUKU ////////////////////////////////
Route::get('/export-books/{id}', function ($id) {
    return Excel::download(new BookExport($id), 'book_' . $id . '.xlsx');
})->name('book.export')->middleware('auth');

// Route::get('/export-books-pdf',[BooksController::class,'export'])->name('export.pdf');

require __DIR__.'/auth.php';
