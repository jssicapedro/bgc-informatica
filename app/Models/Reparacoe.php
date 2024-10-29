<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparacoe extends Model
{
    use HasFactory;

    protected $table = 'reparacoes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'equipamento_id',
        'servico_id',
        'descricaoProblema',
        'estado',
    ];
}
