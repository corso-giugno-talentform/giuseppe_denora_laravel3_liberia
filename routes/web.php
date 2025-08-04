<?php



use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Controllers\{BookController, PageController};


/* Route::get('/', function () {
   return view('welcome', ['libri' => Book::all()]);



}); */
//la query ::all è pericolosa se ho tante colonne allora faremo query ottimizzate
//select::
Route::get('/', [PageController::class, 'homepage'])->name('pages.homepage');

Route::get('/libri', [BookController::class, 'index'])->name('books.index');

/* Route::get('/crea-libro', [BookController::class, 'create'])->name('books.create');
Route::post('/salva-libro', [BookController::class, 'store'])->name('books.store'); */

Route::get('/libri', [BookController::class, 'index'])->name('books.index')->middleware('auth');
Route::get('/libri/crea-libro', [BookController::class, 'create'])->name('books.create')->middleware('auth');
Route::post('/libri/salva-libro', [BookController::class, 'store'])->name('books.store')->middleware('auth');

/*rotte per completare il crud */

Route::get('/libri/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/libri/{book}/modifica', [BookController::class, 'edit'])->name('books.edit');
Route::put('/libri/{book}/aggiorna', [BookController::class, 'update'])->name('books.update');

Route::delete('/libri/{book}/elimina', [BookController::class, 'destroy'])->name('books.destroy');