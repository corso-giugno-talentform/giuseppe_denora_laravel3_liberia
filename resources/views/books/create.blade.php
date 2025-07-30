<x-main>
    <form id="contactForm" action="{{route('books.store')}}" method="POST">
        @csrf
        {{ $hidden ?? '' }}

        {{-- Titolo libro --}}
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Titolo libro" name="name" value="{{ old('name') }}">
            @error('nome')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Anno --}}
        <div class="mb-3">
            <input type="number" class="form-control" placeholder="Anno" name="year" value="{{ old('year') }}">
            @error('year')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Pagine --}}
        <div class="mb-3">
            <input type="number" class="form-control" placeholder="Pagine" name="pages" value="{{ old('pages') }}">
            @error('pages')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Pulsante --}}
        <button type="submit" class="btn btn-primary w-100 py-3">
            Inserisci libro <i class="fas fa-paper-plane ms-2"></i>
        </button>
    </form>
</x-main>
