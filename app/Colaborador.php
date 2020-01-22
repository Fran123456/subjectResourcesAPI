<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
   protected $table = 'Colaboradores';

   protected $fillable = [
       'id','nombre', 'contacto'
   ];
}
