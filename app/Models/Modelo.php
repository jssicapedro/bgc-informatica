<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modelo extends Model
{
    use HasFactory, SoftDeletes;
    //
    protected $fillable = [
        'name'
    ];

    protected $with = [
        'marca'
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class ,'marca_id', 'id');
    }

    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class, 'cliente_id');
    }
}
