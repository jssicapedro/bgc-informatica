<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    protected $table = 'equipamentos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'categoria_id',
        'cliente_id',
        'modelo_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }
}
