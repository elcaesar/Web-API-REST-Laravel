<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursada extends Model
{

    //relacion varios a uno
    public function asignaturas()
    {
        return $this->belongsTo('Asignatura');
    }


    //relacion varios a varios
    public function alumnos()
    {
        return $this->belongsToMany('App\Alumno', 'examenes');
    }

    protected $fillable = ['asignatura_id', 'anio', 'diasyhorarios', 'aula', 'estado'];
}
