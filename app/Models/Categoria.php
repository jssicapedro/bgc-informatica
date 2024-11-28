<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';

    protected $hidden = [
        'id'
    ];

    protected $fillable = [
        'nome',
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
