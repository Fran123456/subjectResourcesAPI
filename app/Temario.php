<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temario extends Model
{
    protected $table = 'temarios';
    protected $fillable = [
        'id','titulo','descripcion','unidad_id','orden',
    ];

    public function unidad()
    {
       return $this->belongsTo('App\Unidad','unidad_id');
    }
}
