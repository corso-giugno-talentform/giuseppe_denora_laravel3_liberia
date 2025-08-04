<x-main>

 <section class="container d-flex flex-column justify-content-center  align-items-center mb-5">
    <h1>I libri presenti nella libreria </h1>
   {{--  <ul>
        @foreach ( $books as $book)
            <li>{{ $book->name }}</li>
        @endforeach

    </ul> --}}

  <x-cards :books="$books" />

</section>
</x-main>
