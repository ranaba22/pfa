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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('image')->nullable();
            $table->integer('quantité');
            $table->decimal('prix_d_achat', 10, 2);
            $table->decimal('prix_de_vente', 10, 2);
            $table->unsignedBigInteger('id_fournisseur');
            $table->unsignedBigInteger('id_categorie');
            $table->timestamps();
        
            $table->foreign('id_fournisseur')->references('id')->on('fournisseurs')->onDelete('cascade');
            $table->foreign('id_categorie')->references('id')->on('categories')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
