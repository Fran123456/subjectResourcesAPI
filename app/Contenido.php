<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
   protected $table = 'contenidos';

   protected $fillable = [

       'id','titulo','descripcion','pdf','video','temario_id','url','vistas'

   ];

   public function temario()
   {
      return $this->belongsTo('App\Temario','temario_id');
   }

}
