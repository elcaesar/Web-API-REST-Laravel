<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 20);
            $table->boolean('condicion')->default(1);
            $table->timestamps();
        });
        DB::table('roles')->insert(array('id'=>'1', 'nombre'=>'Administrador','condicion'=>'1'));
        DB::table('roles')->insert(array('id'=>'2', 'nombre'=>'Docente','condicion'=>'1'));
        DB::table('roles')->insert(array('id'=>'3', 'nombre'=>'Alumno','condicion'=>'1'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
