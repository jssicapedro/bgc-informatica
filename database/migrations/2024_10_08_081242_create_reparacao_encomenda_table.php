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
        Schema::create('reparacao_encomenda', function (Blueprint $table) {
            $table->foreignId('reparacao_id')->constrained('reparacoes')->onDelete('cascade');
            $table->foreignId('encomenda_id')->constrained('encomendas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparacao_encomenda');
    }
};
