<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;

Route::get('/', function () {
   return view('welcome', ['libri' => Book::all()]);



});
//la query ::all è pericolosa se ho tante colonne allora faremo query ottimizzate
//select::