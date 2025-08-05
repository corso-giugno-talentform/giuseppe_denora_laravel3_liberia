<x-main>
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 text-center">
        <form id="contactForm" action="{{ route('categories.store') }}" method="POST" >
            @csrf
            {{ $hidden ?? '' }}

            {{-- Nome categoria --}}
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Nome categoria" name="name"
                    value="{{ old('name') }}">
                @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Pulsante --}}
            <button type="submit" class="btn btn-primary py-3">
                Inserisci Categoria <i class="fas fa-paper-plane ms-2"></i>
            </button>

            <a href="{{ route('categories.index') }}" class="btn btn-primary py-3">
                Vedi tutti le categoria presenti <i class="fas fa-paper-plane ms-2"></i>
            </a>
        </form>
    </div>
</x-main>
