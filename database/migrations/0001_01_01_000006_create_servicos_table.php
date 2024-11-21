<?php

use App\Models\Servico;
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



        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id');
            $table->enum('nome', Servico::LISTA_SERVICOS);
            $table->float('custo');
            $table->string('descricao');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
