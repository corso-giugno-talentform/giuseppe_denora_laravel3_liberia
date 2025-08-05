# Progetto Library - Laravel

## Introduzione

In questo progetto Laravel viene introdotta la gestione di **tabelle (schemas)** nel database, collegate a **model** Eloquent.  
Ogni entità del dominio (es. Libro) viene rappresentata con un **model**, collegato a una specifica **tabella** nel database.

---

## Convenzioni di sintassi

- Il **Model** ha un nome **singolare** con **iniziale maiuscola**  
  Esempio: `Book`
- La **tabella** associata ha un nome **plurale** e tutto in **minuscolo**  
  Esempio: `books`
- I nomi sono sempre in **inglese**.
- Ogni **record** della tabella corrisponde a un’**istanza** del Model.

---

## Migrazione: creazione della tabella `books`

Nel file di migrazione `create_books_table.php` troviamo il metodo `up()` in cui definiamo la struttura della tabella con i relativi attributi.

```php
public function up(): void
{
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('name', 100);
        $table->integer('pages');
        $table->integer('year')->nullable();
        $table->timestamps();
    });
}
```

- `id()` crea una chiave primaria auto-incrementale.
- Gli altri campi (`name`, `pages`, `year`) rappresentano gli attributi del libro.
- `timestamps()` aggiunge i campi `created_at` e `updated_at` automaticamente.

---

## Model Book

```php
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'pages', 'year'];
}
```

- `$fillable` specifica gli attributi che possono essere assegnati in massa, ad esempio usando `Book::create([...])` oppure immessi direttamente nella tabella tramite SQL.

---

## Creazione del BookController

Tramite esso ed i metodi:

- `create()` → ritorna solo la view del form
- `store()` → valida e invia i dati dal form al model e quindi al database

Si ha la possibilità di aggiungere nuovi record nella tabella e visualizzarli nella view `index.blade.php` situata nella cartella `books`.

---

## Upload file

```php
$path_image = '';
if ($request->hasFile('image')) {
    $file_name = $request->file('image')->getClientOriginalName();
    $path_image = $request->file('image')->storeAs('images', $file_name, 'public');
}
```

> Da inserire nel `BookController`.  
> Ricorda di eseguire il comando:  
> `php artisan storage:link`  
> per creare il link simbolico allo storage e rendere le immagini caricate visibili.

## Auth con Fortify

## Operazioni crud
 in questo progetto le operazioni crud sono concesse a tutti i loggati , senza la creazione di un ipotetico Admin al quale sarebbe concesso l'uso esclusivo del form di modifica visualizza ed elimina
## Aggiunta della tabella autori 1 a N 
* La relazione tra la tabella book e autori è 1 a n
* Sono state create operazioni crud per aggiungere autori
ed associarli poi ad un libro tramite un form select
* Prevista la possibiltà di creare o fare update di un libro con author->id  Null


## corretto errore grave per la integrita del db
in database add_author_id_to_books_table
ho eliminato la prima riga poiche nella seconda ho gia usato
il foreignId mantenendole entrambe avevo errore di duplicazione colonna
nella migration
```php
 public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
          /*   $table->unsignedBigInteger('author_id')->nullable(); */
           
            $table->foreignId('author_id')->constrained()->onDelete('cascade'); 
            
        });
    }

```
## Nuova entita Categoria
* l'entita category ha una relazione N a N con i book
* comando  php artisan make:model Category -mcrR
* Route : Route::resource('categories', CategoryController::class);
* $table->string('name'); nel metodo up
* utilizzo delle checkbox per aggiungere una categoria ad un libro
sia nella fase di creazione che di editing 