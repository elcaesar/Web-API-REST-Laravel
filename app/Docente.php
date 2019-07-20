<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{

    public function asignaturas()
    {
        return $this->belongsToMany('App\Asignatura', 'asignaturas_docentes')->withPivot('cargodocente');
    }

    //scope para buscar docentes
    public function scopeDocente($query, $doc)
    {
        if($doc)
            return $query->where('apellido', 'LIKE', "%$doc%");
    }

}
