<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'planes';

    public function asignaturas()
    {
    	return $this->hasMany('App\Asignatura');
    }
}
