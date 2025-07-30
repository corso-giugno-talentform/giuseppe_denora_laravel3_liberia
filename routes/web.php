<?php



use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Controllers\BookController;


/* Route::get('/', function () {
   return view('welcome', ['libri' => Book::all()]);



}); */
//la query ::all è pericolosa se ho tante colonne allora faremo query ottimizzate
//select::

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/crea-libro', [BookController::class, 'create'])->name('books.create');
Route::post('/salva-libro', [BookController::class, 'store'])->name('books.store');