<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rma extends Model
{
    use HasFactory;

    protected $table = 'rma';
    protected $primaryKey = 'id';

    protected $fillable = [
        'equipamento_id',
        'encomenda_id',
        'dataChegada',
        'dataEntrega',
        'horasTrabalho',
        'descricaoProblema',
        'estado'
    ];

    // Relacionamento com a encomenda (um RMA tem uma encomenda)
    public function encomenda()
    {
        return $this->hasMany(Encomenda::class, 'rma_id');
    }

    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class, 'equipamento_id', 'id');
    }

    public function servicos()
    {
        return $this->belongsToMany(Servico::class);
    }

    public function tecnicos()
    {
        return $this->belongsToMany(Tecnico::class, 'rma_servico', 'rma_id', 'tecnico_id');
    }
}
