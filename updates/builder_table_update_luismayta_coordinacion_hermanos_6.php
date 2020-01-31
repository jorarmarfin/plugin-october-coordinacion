<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLuismaytaCoordinacionHermanos6 extends Migration
{
    public function up()
    {
        Schema::table('luismayta_coordinacion_hermanos', function($table)
        {
            $table->date('fecha_orden');
            $table->date('fecha_nacimiento')->default(null)->change();
            $table->string('inicio_go', 191)->default(null)->change();
            $table->string('telefonos', 191)->default(null)->change();
            $table->string('direccion', 191)->default(null)->change();
            $table->string('ocupacion', 191)->default(null)->change();
            $table->string('estado_civil', 191)->default(null)->change();
            $table->string('grado_estudios', 191)->default(null)->change();
            $table->string('email', 191)->default(null)->change();
            $table->string('estado', 191)->default(null)->change();
            $table->dropColumn('dia_nacimiento');
            $table->dropColumn('mes_nacimiento');
        });
    }
    
    public function down()
    {
        Schema::table('luismayta_coordinacion_hermanos', function($table)
        {
            $table->dropColumn('fecha_orden');
            $table->date('fecha_nacimiento')->default('NULL')->change();
            $table->string('inicio_go', 191)->default('NULL')->change();
            $table->string('telefonos', 191)->default('NULL')->change();
            $table->string('direccion', 191)->default('NULL')->change();
            $table->string('ocupacion', 191)->default('NULL')->change();
            $table->string('estado_civil', 191)->default('NULL')->change();
            $table->string('grado_estudios', 191)->default('NULL')->change();
            $table->string('email', 191)->default('NULL')->change();
            $table->string('estado', 191)->default('NULL')->change();
            $table->integer('dia_nacimiento')->nullable()->default(NULL);
            $table->integer('mes_nacimiento')->nullable()->default(NULL);
        });
    }
}
