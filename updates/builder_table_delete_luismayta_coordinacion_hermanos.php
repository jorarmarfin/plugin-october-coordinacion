<?php namespace LuisMayta\Coordinacion\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteLuismaytaCoordinacionHermanos extends Migration
{
    public function up()
    {
        Schema::dropIfExists('luismayta_coordinacion_hermanos');
    }
    
    public function down()
    {
        Schema::create('luismayta_coordinacion_hermanos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('paterno', 50);
            $table->string('materno', 50);
            $table->smallInteger('nombres');
            $table->date('fecha_nacimiento');
            $table->text('direccion');
            $table->string('telefonos', 191);
        });
    }
}
