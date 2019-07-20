<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursadas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asignatura_id')->unsigned();
            $table->integer('anio');
            $table->json('fechaylugarcursada'); // Ejemplo {dia1: ['Tipo':'Practica','dia':'Martes','horario':'18 hs', 'lugar':'aula 2 centro'] , dia2: ['Tipo':'Teoria','dia':'Jueves','horario':'15 hs', 'lugar':'aula 5 campus']}
            $table->json('fechasexamenes');//Ej {'1erParcial':'20-04-2019 aula magna', 'Recup1Parc':'28-04-2019 aula 2 campus', etc...}
            $table->boolean('promocionable')->default(0);// 1->Si  2->NO
            //el estado puede ser 1-En curso 2-Finalizado
            $table->boolean('estado')->default(1); //Puede ser "1 - Cursando" o "0 - Finalizado"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursadas');
    }
}
