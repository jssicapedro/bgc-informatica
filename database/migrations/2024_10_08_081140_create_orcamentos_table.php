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
        Schema::create('orcamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reparacao_id')->constrained('reparacoes')->onDelete('cascade');
            $table->decimal('valor', 8, 2);
            $table->text('descricao');
            $table->date('dataEmissao');
            $table->date('conclusao')->nullable();
            $table->enum('estado', ['em processamento', 'aceite', 'rejeitado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orcamentos');
    }
};
