<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //relación varios a varios
    public function cursadas()
    {
        return $this->belongsToMany('App\Cursada', 'examenes');
    }

    protected $fillable = ['lu', 'dni', 'nombre', 'apellido', 'tel1', 'tel2', 'email'];
}
