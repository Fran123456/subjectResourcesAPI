<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutores extends Model
{
    protected $table = 'tutores';
    protected $fillable = [
        'id','nombre','descripcion','whatsapp','carrera_id','materia_id','estado'
    ];
}
