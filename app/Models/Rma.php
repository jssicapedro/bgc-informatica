<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rma extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rma';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tecnico_id',
        'equipamento_id',
        'equipamento.modelo.marca',
        'equipamento.cliente',
        'encomenda_id',
        'dataChegada',
        'dataEntrega',
        'horasTrabalho',
        'descricaoProblema',
        'estado',
        'totalPagar',
        'custoServicos'
    ];

    protected $guarded = [];

    // Evento que ocorre antes de salvar o modelo
    protected static function booted()
    {
        static::saving(function ($rma) {
            // Calcula o totalPagar
            $servico = $rma->servico; // Relacionamento com serviço
            $encomenda = $rma->encomenda; // Relacionamento com encomenda

            $custoServico = $servico ? $servico->custo : 0; // se não houver fica 0
            $custoEncomenda = $encomenda ? $encomenda->custo : 0;  // se não houver fica 0
        });
    }

    // Relacionamento com a encomenda (um RMA tem uma encomenda)
    public function encomenda()
    {
        return $this->belongsTo(Encomenda::class, 'encomenda_id');
    }

    public function equipamento(): BelongsTo
    {
        return $this->belongsTo(Equipamento::class, 'equipamento_id', 'id');
    }

    public function servicos()
    {
        return $this->belongsToMany(Servico::class, 'rma_servico', 'rma_id', 'servico_id')
                    ->withPivot('horas', 'tecnico_id')
                    ->withTimestamps();
    }

    public function tecnicos()
    {
        return $this->belongsToMany(Tecnico::class, 'rma_servico', 'rma_id', 'tecnico_id');
    }

    public function tecnico_responsavel()
    {
        return $this->belongsTo(Tecnico::class, 'tecnico_id', 'id');
    }

    public function rmaServico()
    {
        return $this->hasMany(RmaServico::class, 'rma_id');
    }
}
