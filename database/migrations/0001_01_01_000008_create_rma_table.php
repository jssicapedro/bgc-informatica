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
            $table->foreignId('equipamentos');
            $table->foreignId('tecnicos');
            $table->foreignId('servicos');
            $table->foreignId('encomendas');
            $table->date('dataChegada');
            $table->date('previsaoEntrega')->nullable();
            $table->date('dataEntrega')->nullable();
            $table->float('horasTrabalho')->nullable();
            $table->string('descricaoProblema');
            $table->enum('estado', ['em processamento', 'em reparacao', 'completo']);
            $table->float('totalPagar')->nullable();
            $table->string('qr');
            $table->timestamps();
            $table->softDeletes();
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
