<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Encomenda extends Model
{
   /** @use HasFactory<\Database\Factories\ClienteFactory> */
   use HasFactory, SoftDeletes;

   protected $table = 'encomendas';
   protected $primaryKey = 'id';

   protected $fillable = [
      'custo',
      'dataPedido',
      'dataEntrega',
      'descricao',
   ];

   // Se o campo "custo" for armazenado como decimal, você pode forçar sua conversão
   // para um número decimal em vez de um inteiro, caso necessário.
   protected $casts = [
      'custo' => 'decimal:2',  // Isso garante que o valor de custo tenha 2 casas decimais
   ];
}
