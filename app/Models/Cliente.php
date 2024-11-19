<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /** @use HasFactory<\Database\Factories\ClienteFactory> */
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nome',
        'email',
        'telemovel',
        'morada',
        'nif',
    ];

    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class, 'cliente');
    }
}
