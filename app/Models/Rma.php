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
        'tecnico_id',
        'servico_id',
        'encomenda_id',
        'dataChegada',
        'dataEntrega',
        'horasTrabalho',
        'descricaoProblema',
        'estado',
        'qr',
    ];

    // Relacionamento com a encomenda (um RMA tem uma encomenda)
    public function encomenda()
    {
        return $this->hasOne(Encomenda::class, 'encomenda_id');
    }
}
