<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class Pagecontroller extends Controller
{
    public function homepage(){
       /*  $books= Book::latest()->take(3)->get();  prende solo gli ultimi 3 */
       $books= Book::All();
        return view('pages.homepage', compact('books'));
    }
}
