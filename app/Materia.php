<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
  protected $table = 'materias';

  protected $fillable = [
      'id','siglas','titulo','descripcion'
  ];
}
