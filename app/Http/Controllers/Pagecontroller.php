<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class Pagecontroller extends Controller
{
    public function homepage(){
        $books= Book::latest()->take(3)->get();
        return view('pages.homepage', compact('books'));
    }
}
