<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{


    //relación uno a varios
    public function cursadas()
    {
        return $this->hasMany('App\Cursada');
    }


    //relacion varios a varios
    public function docentes()
    {
        return $this->belongsToMany('App\Docente', 'asignaturas_docentes')->withPivot('cargodocente');
    }

    //relacion varios a uno
    public function planes()
    {
        return $this->belongsTo('App\Plan');
    }


    protected $fillable = ['nombre', 'plan_id', 'anio', 'regimen'];

    //scope para el plan de estudios
    public function scopePlan($query, $plan)
    {
        if($plan)
            return $query->where('plan', '=', "$plan");
    }

    //scope para buscar asignaturas
    public function scopeAsignatura($query, $asig)
    {
        if($asig)
            return $query->where('nombre', 'LIKE', "%$asig%");
    }


}
