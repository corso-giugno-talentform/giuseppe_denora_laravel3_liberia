 <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
             @foreach ($books as $book)
                 <div class="col">
                     <div class="card">
                         <img src="{{ isset($book->image) ? Storage::url($book->image) : '/images/default.png' }}"
                             class="card-img-top " style="height: 150px; object-fit: cover;"alt="...">
                         <div class="card-body">
                             <h5 class="card-title">{{ $book->name }}</h5>
                             <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                 to
                                 additional content. This content is a little bit longer.</p>
                         </div>
                     </div>
                 </div>
             @endforeach



         </div>