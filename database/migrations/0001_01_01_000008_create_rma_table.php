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
            $table->foreignId('tecnico_id');
            $table->foreignId('equipamento_id');
            $table->foreignId('encomenda_id')->nullable();
            $table->date('dataChegada')->nullable();
            $table->date('previsaoEntrega')->nullable();
            $table->date('dataEntrega')->nullable();
            $table->float('horasTrabalho')->nullable();
            $table->float('custoServicos')->default(0.0);
            $table->string('descricaoProblema');
            $table->enum('estado', ['em processamento', 'em reparacao', 'completo']);
            $table->float('totalPagar')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('rma_servico', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rma_id');
            $table->foreignId('servico_id');
            $table->foreignId('tecnico_id');
            $table->float('horas')->default(0.0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rma_servico');
        Schema::dropIfExists('rma');
    }
};
