<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLuismaytaCoordinacionMensajes extends Migration
{
    public function up()
    {
        Schema::table('luismayta_coordinacion_mensajes', function($table)
        {
            $table->date('fecha');
        });
    }
    
    public function down()
    {
        Schema::table('luismayta_coordinacion_mensajes', function($table)
        {
            $table->dropColumn('fecha');
        });
    }
}
