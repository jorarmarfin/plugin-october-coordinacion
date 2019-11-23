<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLuismaytaCoordinacionSabado extends Migration
{
    public function up()
    {
        Schema::create('luismayta_coordinacion_sabado', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('oracion_inical');
            $table->string('musica');
            $table->string('oracion_ponente');
            $table->string('tema');
            $table->string('oracion_ofrendas');
            $table->string('titulo');
            $table->date('fecha');
            $table->text('observacion');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('luismayta_coordinacion_sabado');
    }
}
