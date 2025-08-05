 <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 text-center">
     {{--  //metto la route per fare l update   --}}

     <form id="contactForm" action="{{ route('books.update', ['book' => $book]) }}" method="POST"
         enctype="multipart/form-data">

         @csrf
         {{--   importante FORZA METODO PUT  --}}
         @method('PUT')
         {{ $hidden ?? '' }}

         {{-- nomr libro --}}
         <div class="mb-3">
             <input type="text" class="form-control" placeholder="Titolo libro" name="name" {{--  //ora i valori old sono presi dal DB  --}}
                 value="{{ $book->name }}">
             @error('name')
                 <div class="alert alert-danger mt-1">{{ $message }}</div>
             @enderror
         </div>
        
        

 {{--  scelta autore --}}
 
 <div class="mb-3">
     <label for="inputAuthor" class="form-label">Scegli Autore</label>

     <select name="author_id" class="form-select" id="inputAuthor">
 {{--  value="" permette di non immettere un autore tra quelli esistenti  --}}

         <option value="" @if (!$book->author_id) selected @endif>Seleziona un Autore</option>
         @foreach ($authors as $author)
             <option @if ($author->id == $book->author_id) selected  @endif value="{{ $author->id }}">
                 {{ $author->firstname . ' ' . $author->lastname }}
             </option>
         @endforeach


     </select>
 </div>



 {{-- pages --}}
 <div class="mb-3">
     {{-- ho messo type=text solo per vedere il mesaggio di errore personalizzato nela classe StoreBookRequest --}}
     <input type="text" class="form-control" placeholder="pagine" name="pages" value="{{ $book->pages }}">
     @error('pages')
         <div class="alert alert-danger mt-1">{{ $message }}</div>
     @enderror
 </div>

 {{-- year --}}
 <div class="mb-3">
     {{-- ho messo type=text solo per vedere il mesaggio di errore personalizzato nela classe StoreBookRequest --}}
     <input type="text" class="form-control" placeholder="year" name="year" value="{{ $book->year }}">
     @error('year')
         <div class="alert alert-danger mt-1">{{ $message }}</div>
     @enderror
 </div>


 {{--  upload file image --}}
 <div class="mb-3">
     {{-- per fare upload della immagine gia presente nel db la metto in una img --}}

     <img style="height:90px" src="{{ Storage::url($book->image) }}">
     <label for="formFile" class="form-label">Copertina</label>
     <input class="form-control" type="file" id="formFile" name="image">
 </div>

 {{-- Pulsante --}}
 <button type="submit" class="btn btn-primary  py-3">
     aggiorna <i class="fas fa-paper-plane ms-2"></i>
 </button>


 </form>

 </div>
