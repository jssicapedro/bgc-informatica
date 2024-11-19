<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
   /** @use HasFactory<\Database\Factories\ClienteFactory> */
   use HasFactory;

   protected $table = 'encomenda';
   protected $primaryKey = 'id';

   protected $fillable = [
      'rma_id',
      'custo',
      'dataPedido',
      'dataEntrega',
      'descricao',
   ];

}
