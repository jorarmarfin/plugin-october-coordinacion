<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLuismaytaCoordinacionAportes extends Migration
{
    public function up()
    {
        Schema::create('luismayta_coordinacion_aportes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('fecha');
            $table->text('descripcion');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('luismayta_coordinacion_aportes');
    }
}
