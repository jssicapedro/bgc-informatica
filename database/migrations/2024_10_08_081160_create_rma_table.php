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
        Schema::create('rma', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipamento_id')->constrained('equipamentos')->onDelete('cascade');
            $table->foreignId('servico_id')->constrained('servicos')->onDelete('cascade');
            $table->foreignId('encomenda_id')->constrained('encomendas')->onDelete('cascade');
            $table->date('dataChegada');
            $table->date('previsaoEntrega')->nullable();
            $table->date('dataEntrega')->nullable();
            $table->float('horasTrabalho')->nullable();
            $table->string('descricaoProblema');
            $table->enum('estado', ['em processamento', 'em reparacao', 'completo']);
            $table->float('totalPagar')->nullable();
            $table->string('qr');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rma');
    }
};
