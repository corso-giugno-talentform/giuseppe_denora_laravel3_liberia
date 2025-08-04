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
