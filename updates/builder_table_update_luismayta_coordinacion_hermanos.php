<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLuismaytaCoordinacionHermanos extends Migration
{
    public function up()
    {
        Schema::table('luismayta_coordinacion_hermanos', function($table)
        {
            $table->date('fecha_nacimiento')->nullable()->change();
            $table->string('inicio_go', 191)->nullable()->change();
            $table->string('telefonos', 191)->nullable()->change();
            $table->string('direccion', 191)->nullable()->change();
            $table->string('ocupacion', 191)->nullable()->change();
            $table->string('estado_civil', 191)->nullable()->change();
            $table->string('grado_estudios', 191)->nullable()->change();
            $table->string('email', 191)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('luismayta_coordinacion_hermanos', function($table)
        {
            $table->date('fecha_nacimiento')->nullable(false)->change();
            $table->string('inicio_go', 191)->nullable(false)->change();
            $table->string('telefonos', 191)->nullable(false)->change();
            $table->string('direccion', 191)->nullable(false)->change();
            $table->string('ocupacion', 191)->nullable(false)->change();
            $table->string('estado_civil', 191)->nullable(false)->change();
            $table->string('grado_estudios', 191)->nullable(false)->change();
            $table->string('email', 191)->nullable(false)->change();
        });
    }
}
