<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLuismaytaCoordinacionActas extends Migration
{
    public function up()
    {
        Schema::create('luismayta_coordinacion_actas', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('fecha');
            $table->text('acuerdos');
            $table->text('asistentes');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('luismayta_coordinacion_actas');
    }
}
