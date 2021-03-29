<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLuismaytaCoordinacionGrupo extends Migration
{
    public function up()
    {
        Schema::create('luismayta_coordinacion_grupo', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre');
            $table->text('historia');
            $table->date('fecha_fundacion');
            $table->text('vision_mision');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('luismayta_coordinacion_grupo');
    }
}
