<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    protected $table = "examenes";
    protected $fillable = ['alumno_id' , 'cursada_id' , 'notas' , 'estado'];
}
