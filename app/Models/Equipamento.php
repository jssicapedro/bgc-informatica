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
        'categoria',
        'clientes',
        'marcaModelo',
    ];

    protected $with = [
        'categoria',
        'clientes',
        'marcaModelo'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria', 'id');
    }
    
    public function clientes()
    {
        return $this->belongsTo(Cliente::class, 'clientes', 'id');
    }
    
    public function marcaModelo()
    {
        return $this->belongsTo(MarcaModelo::class, 'marcaModelo', 'id');
    }
}
