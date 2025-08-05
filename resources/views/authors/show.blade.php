<x-main>
    Nome Autore:{{ $author->firstname }} <br>
    Cognome Autore:{{ $author->lastname }} <br>
    Libri scritti:
    <ul>
        @foreach ($author->books as $book)
            <li>{{ $book->name }}</li>
        @endforeach
    </ul>
</x-main>