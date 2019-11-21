<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLuismaytaCoordinacionEventos extends Migration
{
    public function up()
    {
        Schema::table('luismayta_coordinacion_eventos', function($table)
        {
            $table->string('tipo');
        });
    }
    
    public function down()
    {
        Schema::table('luismayta_coordinacion_eventos', function($table)
        {
            $table->dropColumn('tipo');
        });
    }
}
