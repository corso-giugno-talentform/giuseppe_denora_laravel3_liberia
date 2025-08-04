<x-main>
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 text-center">
        
{{-- <h1>I libri presenti nella libreria</h1>
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
 --}}
<div class="rounded-3 py-5 px-4 px-md-5 mb-5">

         <div class="container mt-5">
             <div class="align-middle gap-2 d-flex justify-content-between">
                 <h3>Elenco Libri inseriti</h3>
                 <form class="d-flex" role="search" action="#" method="POST">
                     <input class="form-control me-2" name="search" type="search" placeholder="Cerca Libro"
                         aria-label="Search">
                 </form>
                 <a href="{{ route('books.create') }}" type="button" class="btn btn btn-success me-md-2">
                     Crea Nuovo Libro
                 </a>
             </div>
             <table class="table border mt-2">
                 <thead>
                     <tr>
                         <th scope="col">#</th>
                         <th scope="col">Immagine</th>
                         <th scope="col">Titolo</th>
                         <th scope="col"></th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($books as $book)
                         <tr>
                             <th scope="row">{{ $book->id }}</th>
                             <td>
                                 <img class="card-img-top" style="width:3rem"
                                     src="{{ isset($book->image) ? Storage::url($book->image) : '/images/default.png' }}"
                                     alt="..." />
                             </td>
                             <td>{{ $book->name }}</td>
                             <td>

                                 <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                     <a href="{{ route('books.show', ['book' => $book]) }}" class="btn btn-primary me-md-2">
                                         Visualizza
                                     </a>
                                     <a href="{{ route('books.edit', ['book' => $book]) }}" class="btn btn-warning me-md-2">
                                         Modifica
                                     </a>
                                    {{--  questo bottone triggera la modale che  è il vero form di eliminazione --}}
                                        <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal"
                                        data-bs-target="#book-{{ $book->id }}">Elimina</button>


                                           <!-- Modale/form -->
                                    <div class="modal fade" id="book-{{ $book->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="${this.id}"">
                                                        Sei sicuro di
                                                        voler eliminare il libro "{{ $book->name }}"?
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Attenzione: L'operazione non é reversibile.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annulla</button>
                                                    <form action="{{ route('books.destroy', ['book' => $book]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                 </div>
                             </td>
                         </tr>
                     @endforeach

                 </tbody>
             </table>
         </div>
     </div>


        <a href="{{ route('books.create') }}" class="btn btn-primary py-3">
            vai al form per inserire libri<i class="fas fa-paper-plane ms-2"></i>
        </a>
    </div>
</x-main>