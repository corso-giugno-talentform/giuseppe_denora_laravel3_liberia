<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'pages', 'year','image','author_id'];
    //aggiunto image dopo l'up migration della table


    public function author()
{
return $this->belongsTo(Author::class); ///il libro appartine Alla l'autore ovvero classe Author
}
}
