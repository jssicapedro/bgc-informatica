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
            $table->enum('tipo', ['computador', 'periferico', 'armazenamento', 'rede', 'conectividade']);
            $table->string('numero_serie')->unique();
            $table->text('descricao');
            $table->date('entrada');
            $table->date('resolucao')->nullable();
            $table->date('levantamento')->nullable();
            $table->string('qr')->nullable();
            $table->timestamps();
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
