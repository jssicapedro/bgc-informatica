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
        'tipo',
        'dataInicio',
        'conclusaoExpectada',
        'conclusao',
        'estado',
        'descricao',
    ];
}
