<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marca extends Model
{
    use HasFactory, SoftDeletes;
    //
    protected $fillable = [
        'name'
    ];

    public function modelo()
    {
        return $this->belongsTo(Modelo::class ,'marca_id', 'id');
    }
}
