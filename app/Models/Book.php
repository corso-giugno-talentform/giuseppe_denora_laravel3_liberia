<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'pages', 'year','image'];
    //aggiunto image dopo l'up migration della table
}
