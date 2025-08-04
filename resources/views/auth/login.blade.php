<x-main>
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                <x-errors/>

                <form class="p-5 border rounded" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email utente</label>
                        <input type="email" name="email" class="form-control" id="email" required value="{{old('email')}}" >
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>

                    <button type="submit" class="btn btn-dark">Accedi</button>
                    <a href="{{ route('register') }}" class="btn btn-outline-dark">Non sei iscritto?</a>
                </form>
                
            </div>
        </div>
    </div>
</x-main>
