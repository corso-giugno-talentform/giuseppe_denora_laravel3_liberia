<x-main>
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 text-center">
        <form id="contactForm" action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ $hidden ?? '' }}

            {{-- Nome autore --}}
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Nome autore" name="firstname"
                    value="{{ old('firstname') }}">
                @error('firstname')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Cognome autore --}}
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Cognome autore" name="lastname"
                    value="{{ old('lastname') }}">
                @error('lastname')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Pulsante --}}
            <button type="submit" class="btn btn-primary py-3">
                Inserisci autore <i class="fas fa-paper-plane ms-2"></i>
            </button>

            <a href="{{ route('authors.index') }}" class="btn btn-primary py-3">
                Vedi tutti gli autori presenti <i class="fas fa-paper-plane ms-2"></i>
            </a>
        </form>
    </div>
</x-main>
