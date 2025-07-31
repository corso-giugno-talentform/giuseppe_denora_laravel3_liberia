<x-main>
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 text-center">
        <h1>I libri presenti nella libreria</h1>

        <ul class="list-unstyled">
            @foreach ($books as $book)
                <li class="d-flex align-items-center mb-3">
                    <img 
                        src="{{$book->image ? Storage::url($book->image) :'/images/coverDefault.png' }}" 
                        alt="{{ $book->name }}" 
                        class="img-thumbnail me-3" 
                        style="width: 50px; height: auto;">
                    <span>{{ $book->name }}</span>
                </li>
            @endforeach
        </ul>

        <a href="{{ route('books.create') }}" class="btn btn-primary py-3">
            vai al form per inserire libri<i class="fas fa-paper-plane ms-2"></i>
        </a>
    </div>
</x-main>