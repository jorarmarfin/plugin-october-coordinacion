<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLuismaytaCoordinacionServicios2 extends Migration
{
    public function up()
    {
        Schema::table('luismayta_coordinacion_servicios', function($table)
        {
            $table->text('integrantes');
        });
    }
    
    public function down()
    {
        Schema::table('luismayta_coordinacion_servicios', function($table)
        {
            $table->dropColumn('integrantes');
        });
    }
}
