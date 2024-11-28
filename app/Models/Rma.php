<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rma extends Model
{
    use HasFactory;

    protected $table = 'rma';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tecnico_id',
        'equipamento_id',
        'encomenda_id',
        'dataChegada',
        'dataEntrega',
        'horasTrabalho',
        'descricaoProblema',
        'estado',
        'totalPagar'
    ];

    // Evento que ocorre antes de salvar o modelo
    protected static function booted()
    {
        static::saving(function ($rma) {
            // Calcula o totalPagar
            $servico = $rma->servico; // Relacionamento com serviço
            $encomenda = $rma->encomenda; // Relacionamento com encomenda

            $custoServico = $servico ? $servico->custo : 0;
            $custoEncomenda = $encomenda ? $encomenda->custo : 0;

            $rma->totalPagar = ($rma->horasTrabalho * $custoServico) + $custoEncomenda;
        });
    }

    // Relacionamento com a encomenda (um RMA tem uma encomenda)
    public function encomenda(): HasOne
    {
        return $this->hasOne(Encomenda::class, 'id');
    }

    public function equipamento(): BelongsTo
    {
        return $this->belongsTo(Equipamento::class, 'equipamento_id', 'id');
    }

    public function servicos()
    {
        return $this->belongsToMany(Servico::class, 'rma_servico', 'rma_id', 'servico_id');
    }

    public function tecnicos()
    {
        return $this->belongsToMany(Tecnico::class, 'rma_servico', 'rma_id', 'tecnico_id');
    }

    public function tecnico_responsavel()
    {
        return $this->belongsTo(Tecnico::class, 'tecnico_id', 'id');
    }
}
