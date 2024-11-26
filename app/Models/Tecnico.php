<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tecnico extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'tecnicos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'email',
        'telemovel',
        'especialidade',
        'password',
    ];

    const LISTA_ESPECIALIDADES = [
        'Computadores',
        'Smartphones',
        'Outros equipamentos',
        'Todas',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $dates = ['deleted_at']; // Isso é necessário para o Soft Delete

    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class);
    }
}
