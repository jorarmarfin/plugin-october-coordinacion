<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateLuismaytaCoordinacionHermanos extends Migration
{
    public function up()
    {
        Schema::create('luismayta_coordinacion_hermanos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('apellidos', 100);
            $table->string('nombres', 100);
            $table->date('fecha_nacimiento');
            $table->string('inicio_go');
            $table->string('telefonos');
            $table->string('direccion');
            $table->string('ocupacion');
            $table->string('estado_civil');
            $table->string('grado_estudios');
            $table->string('email');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('luismayta_coordinacion_hermanos');
    }
}
