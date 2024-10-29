<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarcaModelo extends Model
{
    use HasFactory;

    protected $table = 'marcamodelos';
    protected $primaryKey = 'id';
}
