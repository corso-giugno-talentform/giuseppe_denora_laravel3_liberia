<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Book;
use App\Models\Author;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crea prima utente fisso altrimenti viene sovrascritto e non appare nel db 
        User::factory()->create([
            'name' => 'giuseppedeno',
            'email' => 'giuseppedeno@gmail.com',
            'password' => Hash::make('Lampada78@'),
        ]);

        // Poi crea gli altri utenti casuali
        User::factory(100)->create();

        // Crea gli autori
        Author::factory(100)->create();

        // Crea i libri (controlla il metodo hasAuthor nella factory)
        Book::factory(1000)->create(); // per esempio 1000 libri
    }
}
