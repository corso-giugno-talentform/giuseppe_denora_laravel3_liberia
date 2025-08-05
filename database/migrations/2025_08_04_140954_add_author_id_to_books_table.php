<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
          /*   $table->unsignedBigInteger('author_id')->nullable(); */
            //link tra le tabelle e eliminazione a cascata
            //IMPORANTE SOLO QUESTA RIGA ALTRIMENTI Non ce integrita delle relazione nella tabella
            $table->foreignId('author_id')->constrained()->onDelete('cascade'); 
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
            $table->dropColumn('author_id');
        });
    }
};
