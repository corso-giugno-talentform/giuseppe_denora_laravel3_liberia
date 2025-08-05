<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light  bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand"  href="{{ route('pages.homepage') }}">
            <i class="fas fa-book me-2 text-brown"></i>{{ env('APP_NAME') }}<span>site</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('pages.homepage') }}">Home</a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.index') }}">Gestione Libri</a>
                </li>
                   <li class="nav-item">
                        <a class="nav-link" href="{{ route('authors.index') }}">Gestione Autori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Gestione Categorie</a>
                    </li>
               {{--  parte visibile ai guest  --}}
                @guest

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                        </li>
                    @else
                       <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button class="nav-link" type="submit">Logout</button>
                            </form>

                        </li>
                    @endguest
            </ul>

               @auth
                    Ciao, {{ Auth::user()->name }}
                @endauth
            </div>
        </div>
    </div>
</nav>