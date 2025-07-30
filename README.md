# 📚 Progetto Library - Laravel

## Introduzione

In questo progetto Laravel viene introdotta la gestione di **tabelle (schemas)** nel database, collegate a **model** Eloquent.  
Ogni entità del dominio (es. Libro) viene rappresentata con un **model**, collegato a una specifica **tabella** nel database.

---

##  Convenzioni di sintassi

- Il **Model** ha un nome **singolare** con **iniziale maiuscola**  
  Esempio: `Book`
- La **tabella** associata ha un nome **plurale** e tutto in **minuscolo**  
  Esempio: `books`
- I nomi sono sempre in **inglese**.
- Ogni **record** della tabella corrisponde a un’**istanza** del Model.

---

##  Migrazione: creazione della tabella `books`

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

id() crea una chiave primaria auto-incrementale.

Gli altri campi (name, pages, year) rappresentano gli attributi del libro.

timestamps() aggiunge i campi created_at e updated_at automaticamente.

##  model BOOK
```php
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'pages', 'year'];
}
```

$fillable specifica gli attributi che possono essere assegnati in massa, ad esempio usando Book::create([...]) oppure immessi direttente nella table tramite Sql o..
