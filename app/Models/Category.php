<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable=['name'];
   
   public function books(){ //bookS plurale perche è una relazione N a N tra libri e categorie
    return $this->belongsToMany(Book::class);
   }
}
