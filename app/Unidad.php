<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
  protected $table = 'unidades';
  protected $fillable = [

      'id','titulo','descripcion','materia_id','orden_u'

  ];


  public function materia()
  {
     return $this->belongsTo('App\Materia','materia_id');
  }
}
