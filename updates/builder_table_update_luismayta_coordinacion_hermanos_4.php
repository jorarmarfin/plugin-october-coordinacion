<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLuismaytaCoordinacionHermanos4 extends Migration
{
    public function up()
    {
        Schema::table('luismayta_coordinacion_hermanos', function($table)
        {
            $table->string('estado')->nullable();
            $table->date('fecha_nacimiento')->default(null)->change();
            $table->string('inicio_go', 191)->default(null)->change();
            $table->string('telefonos', 191)->default(null)->change();
            $table->string('direccion', 191)->default(null)->change();
            $table->string('ocupacion', 191)->default(null)->change();
            $table->string('estado_civil', 191)->default(null)->change();
            $table->string('grado_estudios', 191)->default(null)->change();
            $table->string('email', 191)->default(null)->change();
            $table->integer('dia_nacimiento')->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('luismayta_coordinacion_hermanos', function($table)
        {
            $table->dropColumn('estado');
            $table->date('fecha_nacimiento')->default('NULL')->change();
            $table->string('inicio_go', 191)->default('NULL')->change();
            $table->string('telefonos', 191)->default('NULL')->change();
            $table->string('direccion', 191)->default('NULL')->change();
            $table->string('ocupacion', 191)->default('NULL')->change();
            $table->string('estado_civil', 191)->default('NULL')->change();
            $table->string('grado_estudios', 191)->default('NULL')->change();
            $table->string('email', 191)->default('NULL')->change();
            $table->integer('dia_nacimiento')->default(NULL)->change();
        });
    }
}
