<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLuismaytaCoordinacionMensajes extends Migration
{
    public function up()
    {
        Schema::create('luismayta_coordinacion_mensajes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo');
            $table->text('contenido');
            $table->boolean('destacar');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('luismayta_coordinacion_mensajes');
    }
}
