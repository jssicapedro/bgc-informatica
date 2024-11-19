<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tecnico extends Authenticatable
{
   /** @use HasFactory<\Database\Factories\UserFactory> */
   use HasFactory, Notifiable;

   protected $fillable = [
       'nome',
       'email',
       'telemovel',
       'especialidade',
       'password',
   ];

   protected $hidden = [
       'password',
       'remember_token',
   ];
}
