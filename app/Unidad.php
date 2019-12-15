<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
  protected $fillable = [
      'id','titulo','descripcion','materia_id'
  ];
}
