<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book; // IMPORTANTE
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Category;


class BookController extends Controller
{
    public function index()
    {
        //$books = Book::all();
        // $books = Book::simplePaginate(4);  //per la paginazione
        if (request()->search) {

            /*  $books = Book::where('name', 'LIKE', '%' . request('search') . '%')
       ->orWhere('year',  'LIKE', '%' . request('search') . '%')->get();
 */
            //usando  scout e tnt search basta fare
            
            $books = Book::search(request()->search)->get();
        } else {
            $books = Book::all();
        }

        return view('books.index', compact('books'));
    }


    /*  public function create()
    {

        return view('books.create');
    }
 */

    //ora devo mandare i gli AUTORI e le cateforie alla view
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();

        return view('books.create', compact('authors', 'categories'));
    }




    public function store(StoreBookRequest $request)
    {


        $path_image = '';
        if ($request->hasFile('image')) {
            $file_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('images', $file_name, 'public');
            //qui images è la cartella storage/images che contiene il file ed è settato public, in piu c'è $file_name perche posso scegliere il nome con cui salvarlo 
        }
        //NB  non usando path image e if potrei usare semplicemente in create /*  'image'=>$request->file('image')->store('cover','public'), qui 'cover' è storage/cover che contiene il file uploadato  */

        $defaultAuthorId = Author::where('firstname', '')->first()?->id ?? null;
        $book =  Book::create([
            'name' => $request->name,
            'year' => $request->year,
            'pages' => $request->pages,
            /*  'author_id' => $request->author_id, */
            'author_id' => $request->author_id ?? $defaultAuthorId, //nel caso abbia cancellato autore , posso cmq fare un  create

            'image' => $path_image,
        ]);
        //uso l'oggetto $book per fare l'attach delle categorie e prenderle dal form
        $book->categories()->attach($request->categories);


        return redirect()->route('books.index')->with('success', 'Libro aggiunto con successo!');
    }


    // metodo per mostrare il dettaglio libro
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }
    //edit . ritornera solo la view per il form 
    public function edit(Book $book)
    {
        $authors = Author::all(); //mi servono tutte 
        $categories = Category::all();
        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    //update 2 parametri.. l oggetto libro e updaterequest per la validazione

    public function update(Book $book, UpdateBookRequest $request)
    {
        $image = $book->image; // immagine attuale

        // Se è stata caricata una nuova immagine
        if ($request->hasFile('image')) {
            $file_name = $request->file('image')->getClientOriginalName();
            $image = $request->file('image')->storeAs('images', $file_name, 'public');
        }
        $defaultAuthorId = Author::where('firstname', '')->first()?->id ?? null;

        // In ogni caso, aggiorna il libro
        $book->update([
            'name' => $request->name,
            'year' => $request->year,
            'pages' => $request->pages,
            'image' => $image,
            /* 'author_id' => $request->author_id, */ //Aggiunta la FK che verra vista dal select del form di creazione BOOK
            'author_id' => $request->author_id ?? $defaultAuthorId, //nel caso abbia cancellato autore , posso cmq fare un update


        ]);

        //ATTACCO LE CATEGORIE selezionate quando faccio l'update ma prima faccio detouch per non avere duplicazioni

        $book->categories()->detach();

        $book->categories()->attach($request->categories);


        return redirect()->route('books.index')->with('success', 'Il libro è stato modificato');
    }

    public function destroy(Book $book)
    {
        $book->categories()->detach(); //cosi se c'è ancora relazione non posso cancellare
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Libro cancellato!');
    }
}
