<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temario extends Model
{
    protected $table = 'temarios';
    protected $fillable = [
        'id','titulo','descripcion','unidad_id','orden',
    ];
}
