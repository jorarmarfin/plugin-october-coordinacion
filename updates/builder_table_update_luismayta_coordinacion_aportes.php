<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLuismaytaCoordinacionAportes extends Migration
{
    public function up()
    {
        Schema::table('luismayta_coordinacion_aportes', function($table)
        {
            $table->string('aporte');
        });
    }
    
    public function down()
    {
        Schema::table('luismayta_coordinacion_aportes', function($table)
        {
            $table->dropColumn('aporte');
        });
    }
}
