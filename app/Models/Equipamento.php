<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    /** @use HasFactory<\Database\Factories\ClienteFactory> */
    use HasFactory;

    protected $table = 'equipamentos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'categoria',
        'cliente',
        'marcaModelo'
    ];

    // Relacionamento com categorias
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria');
    }

    // Relacionamento com clientes
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente');
    }

    // Relacionamento com marcamodelos
    public function marcaModelo()
    {
        return $this->belongsTo(MarcaModelo::class, 'marcaModelo');
    }
}
