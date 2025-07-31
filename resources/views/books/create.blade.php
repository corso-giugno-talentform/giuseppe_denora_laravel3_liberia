<x-main>

    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 text-center">
        <form id="contactForm" action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ $hidden ?? '' }}

            {{-- Titolo libro --}}
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Titolo libro" name="name"
                    value="{{ old('name') }}">
                @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Anno --}}
            <div class="mb-3">
                {{-- ho messo type=text solo per vedere il mesaggio di errore personalizzato nela classe StoreBookRequest --}}
                <input type="text" class="form-control" placeholder="Anno" name="year"
                    value="{{ old('year') }}">
                @error('year')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Pagine --}}
            <div class="mb-3">
                <input type="number" class="form-control" placeholder="Pagine" name="pages"
                    value="{{ old('pages') }}">
                @error('pages')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            {{--  upload file  --}}
            <div class="mb-3">
                <label for="formFile" class="form-label">Immagine cover</label>
                <input class="form-control" type="file" id="formFile"  name="image"  
>
            </div>

            {{-- Pulsante --}}
            <button type="submit" class="btn btn-primary  py-3">
                Inserisci libro <i class="fas fa-paper-plane ms-2"></i>
            </button>

            <a href="{{ route('books.index') }}" class="btn btn-primary py-3">
                vedi tutti i libri presenti<i class="fas fa-paper-plane ms-2"></i>
            </a>
        </form>

    </div>
</x-main>
