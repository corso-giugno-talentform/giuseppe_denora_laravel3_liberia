

<x-main>

     {{--  <x-slot name="title">
      Liberia  | il luogo dei libri
    </x-slot> --}}
    <!-- Hero Section -->
{{-- <x-hero/> --}}

    <!-- Featured Articles -->
   {{--  <section class="featured-articles" id="articles">
        <div class="container">
            <h2 class="section-title">Articoli in Evidenza</h2>
            <div class="row">

                <!-- Article in evidenza -->
                @foreach ($articlesEvid as $article)
                   
         
            <x-card :article="$article" type="featured" :letto="$article['letto']" />

                @endforeach
            </div>
        </div>
    </section>
 --}}
 <h1>I libri presenti nella libreria </h1>
    <ul>
        @foreach ($books as $book)
            <li>{{ $book->name }}</li>
        @endforeach

    </ul>
   

</x-main>