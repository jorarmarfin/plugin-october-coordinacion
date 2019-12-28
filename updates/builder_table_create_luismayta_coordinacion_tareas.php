<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLuismaytaCoordinacionTareas extends Migration
{
    public function up()
    {
        Schema::create('luismayta_coordinacion_tareas', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('descripcion');
            $table->date('fecha');
            $table->integer('idhermano');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('luismayta_coordinacion_tareas');
    }
}
