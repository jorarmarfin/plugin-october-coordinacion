<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLuismaytaCoordinacionSabado extends Migration
{
    public function up()
    {
        Schema::table('luismayta_coordinacion_sabado', function($table)
        {
            $table->text('tema')->nullable(false)->unsigned(false)->default(null)->change();
            $table->renameColumn('observacion', 'informes');
            $table->dropColumn('oracion_inical');
            $table->dropColumn('musica');
            $table->dropColumn('oracion_ponente');
            $table->dropColumn('oracion_ofrendas');
            $table->dropColumn('titulo');
        });
    }
    
    public function down()
    {
        Schema::table('luismayta_coordinacion_sabado', function($table)
        {
            $table->string('tema', 191)->nullable(false)->unsigned(false)->default(null)->change();
            $table->renameColumn('informes', 'observacion');
            $table->string('oracion_inical', 191);
            $table->string('musica', 191);
            $table->string('oracion_ponente', 191);
            $table->string('oracion_ofrendas', 191);
            $table->string('titulo', 191);
        });
    }
}
