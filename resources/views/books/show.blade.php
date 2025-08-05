<x-main>
    Nome Libro: {{ $book->name }} <br>
    Anno di uscita: {{ $book->year }}<br>
    Numero Pagine: {{ $book->page }}<br>

    Autore: 
    @if (isset($book->author->firstname))
        {{ $book->author->firstname }} {{ $book->author->lastname }}<br>
    @else
        Sconosciuto<br>
    @endif

    <hr>

    <ul>
        {{-- Prendo le categorie di quel libro --}}
        @foreach($book->categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
</x-main>
