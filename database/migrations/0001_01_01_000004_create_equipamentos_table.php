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
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria');    // FK para tabela categorias
            $table->unsignedBigInteger('cliente');     // FK para tabela clientes
            $table->unsignedBigInteger('marcaModelo'); // FK para tabela marcamodelos
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('categoria')->references('id')->on('categoria')->onDelete('cascade');
            $table->foreign('cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('marcaModelo')->references('id')->on('marcamodelos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipamentos');
    }
};
