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
        Schema::create('carrito_temporal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id'); // usuario dueño del carrito
            $table->unsignedBigInteger('album_id');   // producto añadido (álbum)
            $table->integer('cantidad')->default(1);  // cantidad de ese álbum
            $table->timestamps();

            // Foreign keys
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('album_id')->references('id')->on('albumes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito_temporal');
    }
};
