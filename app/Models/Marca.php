<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function modelo()
    {
        return $this->belongsTo(Modelo::class ,'marca_id', 'id');
    }
}
