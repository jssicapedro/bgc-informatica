<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RmaServico extends Model
{
    protected $table = 'rma_servico';
    protected $primaryKey = 'id';

    protected $fillable = [
        'rma_id',
        'servico_id',
        'tecnico_id',
        'horas'
    ];

    
    public function servico()
    {
        return $this->belongsTo(Servico::class, 'servico_id');
    }
    
    public function rma()
    {
        return $this->belongsTo(Rma::class, 'rma_id');
    }
    
    public function tecnico()
    {
        return $this->belongsToMany(Tecnico::class, 'rma_servico', 'rma_id', 'tecnico_id');
    }
}
