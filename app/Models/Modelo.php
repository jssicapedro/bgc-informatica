<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
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
