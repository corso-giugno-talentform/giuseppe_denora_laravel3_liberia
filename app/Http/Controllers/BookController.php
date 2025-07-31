<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book; // IMPORTANTE
use Illuminate\Http\Request;


class BookController extends Controller
{
public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }


    public function create() {

        return view('books.create');
    }

    public function storeOLD(Request $request){

        //step1 validazione
        $request-> validate([
'name'=>['required', 'max:150','string'],//perche ho scelto max 150caratteri
'year'=>['integer'], //era facoltativo 
'pages'=>['integer'],//era facoltativo 

        ]);
    
       // step 2 mapping 
/* $data=[
'name'=> $request->name,
'year'=>$request->year,
'pages'=>$request->page]; */
//step3 salvo i $data
Book::create([
'name'=> $request->name,
'year'=>$request->year,
'pages'=>$request->page]);
    $text='elemento inserito';
    
    return redirect ()->route('books.index')->with('success', $text);
    
    }



    public function store(StoreBookRequest $request)
{


 $path_image='';
    if($request->hasFile('image')){
        $file_name=$request->file('image')->getClientOriginalName();
        $path_image=$request->file('image')->storeAs('images',$file_name,'public');
    } 
//NB  non usando path image e if potrei usare semplicemente in create /*  'image'=>$request->file('image')->store('cover','public'), */
    Book::create([
        'name' => $request->name,
        'year' => $request->year,
        'pages' => $request->pages,
       /*  'image'=>$request->file('image')->store('cover','public'), */
         'image' => $path_image,
    ]);

    return redirect()->route('books.index')->with('success', 'Libro aggiunto con successo!');
}
}
