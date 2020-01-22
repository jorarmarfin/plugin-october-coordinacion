<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLuismaytaCoordinacionServicios extends Migration
{
    public function up()
    {
        Schema::create('luismayta_coordinacion_servicios', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->text('descripcion');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('luismayta_coordinacion_servicios');
    }
}
