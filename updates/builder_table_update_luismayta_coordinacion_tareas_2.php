<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLuismaytaCoordinacionTareas2 extends Migration
{
    public function up()
    {
        Schema::table('luismayta_coordinacion_tareas', function($table)
        {
            $table->string('asunto', 191)->nullable();
            $table->text('descripcion')->nullable()->change();
            $table->dropColumn('idhermano');
            $table->dropColumn('accion');
        });
    }
    
    public function down()
    {
        Schema::table('luismayta_coordinacion_tareas', function($table)
        {
            $table->dropColumn('asunto');
            $table->text('descripcion')->nullable(false)->change();
            $table->integer('idhermano');
            $table->string('accion', 191);
        });
    }
}
