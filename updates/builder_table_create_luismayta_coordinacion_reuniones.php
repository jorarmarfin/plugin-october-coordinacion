<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLuismaytaCoordinacionReuniones extends Migration
{
    public function up()
    {
        Schema::create('luismayta_coordinacion_reuniones', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('tipo');
            $table->date('fecha');
            $table->string('asunto');
            $table->text('descripcion');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('luismayta_coordinacion_reuniones');
    }
}
