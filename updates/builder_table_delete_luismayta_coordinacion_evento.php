<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteLuismaytaCoordinacionEvento extends Migration
{
    public function up()
    {
        Schema::dropIfExists('luismayta_coordinacion_evento');
    }
    
    public function down()
    {
        Schema::create('luismayta_coordinacion_evento', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('tipo', 191);
            $table->string('titulo', 191);
            $table->text('descripcion');
        });
    }
}
