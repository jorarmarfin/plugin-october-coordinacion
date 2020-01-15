<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLuismaytaCoordinacionAsistencias extends Migration
{
    public function up()
    {
        Schema::create('luismayta_coordinacion_asistencias', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('fecha');
            $table->integer('idhermano');
            $table->string('estado');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('luismayta_coordinacion_asistencias');
    }
}
