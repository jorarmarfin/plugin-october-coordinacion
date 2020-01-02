<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLuismaytaCoordinacionTareas extends Migration
{
    public function up()
    {
        Schema::table('luismayta_coordinacion_tareas', function($table)
        {
            $table->string('accion');
        });
    }
    
    public function down()
    {
        Schema::table('luismayta_coordinacion_tareas', function($table)
        {
            $table->dropColumn('accion');
        });
    }
}
