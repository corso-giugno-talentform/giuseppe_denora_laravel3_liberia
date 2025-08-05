<x-main>
     Nome Libro:{{ $book->name }} <br>
    ANno di uscita: {{ $book->year }}<br>
    Numero Pagine: {{ $book->page }}<br>

    Autore: @if (isset($book->author->firstname))
        {{ $book->author->firstname }} {{ $book->author->lastname }}<br>
    @else
        Sconociuto<br>
    @endif
    <br>
</x-main>