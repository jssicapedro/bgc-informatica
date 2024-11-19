<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';
    protected $primaryKey = 'id';

    protected $fillable = [
        'categoria',
    ];

    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class, 'categoria');
    }

    public function servicos()
    {
        return $this->hasMany(Servico::class, 'categoria_id');
    }
}
