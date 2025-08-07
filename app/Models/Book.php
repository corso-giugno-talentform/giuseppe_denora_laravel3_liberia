<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Laravel\Scout\Searchable; // PER tnt scout

class Book extends Model
{
    use Searchable; /// PER tnt scout
    public $asYouType = true;  //per scout
    use HasFactory;

    protected $fillable = ['name', 'pages', 'year', 'image', 'author_id'];



    public function author()
    {
        return $this->belongsTo(Author::class); ///il libro appartine Alla l'autore ovvero classe Author
    }

    //per la relazione N a N con category
    public function categories()
    { //al plur perche relazione N a N 
        return $this->belongsToMany(Category::class);
    }

    //aggiunto per TNT search
   /*  public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    } */

   public function toSearchableArray()
{
    return [
        'id' => $this->id,
        'name' => $this->name,
        'year' => $this->year,
        'pages' => $this->pages,
        'author' => optional($this->author)->firstname . ' ' . optional($this->author)->lastname,
        'categories' => implode(', ', $this->categories->pluck('name')->toArray()), 
    ];
}


}
