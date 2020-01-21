<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
  protected $table = 'unidades';
  protected $fillable = [
<<<<<<< HEAD
      'id','titulo','descripcion','materia_id'
=======
      'id','titulo','descripcion','materia_id','orden_u'
>>>>>>> 79a638e9f9c41aa6b8ffcdea6a106fa4bb575b34
  ];
}
