<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servico extends Model
{
    use HasFactory, SoftDeletes;

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
        'Limpeza',
        'Conserto',
        'Substituição/manutenção',
        'Melhoria',
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

    public function tecnico()
    {
        return $this->belongsToMany(Tecnico::class, 'rma_servico', 'id', 'tecnico_id');
    }
}
