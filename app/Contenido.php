<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
   protected $table = 'contenidos';

   protected $fillable = [
<<<<<<< HEAD
       'id','titulo','descripcion','pdf','video','temario_id'
=======
       'id','titulo','descripcion','pdf','video','temario_id','url','vistas'  
>>>>>>> 79a638e9f9c41aa6b8ffcdea6a106fa4bb575b34
   ];

}
