<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteLuismaytaCoordinacionReunion extends Migration
{
    public function up()
    {
        Schema::dropIfExists('luismayta_coordinacion_reunion');
    }
    
    public function down()
    {
        Schema::create('luismayta_coordinacion_reunion', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->date('fecha');
            $table->text('descripcion');
            $table->string('tipo', 191);
        });
    }
}
