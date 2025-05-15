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
        Schema::create('albumes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->unsignedBigInteger('artista_id');
            $table->unsignedBigInteger('genero_id');
            $table->year('anio');
            $table->string('imagen')->nullable();
            $table->decimal('precio', 8, 2);
            $table->integer('stock');
            $table->timestamps();
        
            $table->foreign('artista_id')->references('id')->on('artistas')->onDelete('cascade');
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
