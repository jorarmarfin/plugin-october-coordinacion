<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLuismaytaCoordinacionEventos extends Migration
{
    public function up()
    {
        Schema::create('luismayta_coordinacion_eventos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo');
            $table->text('descripcion');
            $table->date('fecha');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('luismayta_coordinacion_eventos');
    }
}
