<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Servico extends Model
{
    use HasFactory;

    protected $table = 'servicos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'categoria_id',
        'nome',
        'custo',
        'estimativa',
        'descricao',
    ];

    // Exemplo de enum
    const LISTA_SERVICOS = [
        'limpeza',
        'conserto',
        'substituição/manutenção',
        'melhoria',
    ];

    protected $casts = [
        'custo' => 'decimal:2',  // Isso garante que o valor de custo tenha 2 casas decimais
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class);
    }
}
