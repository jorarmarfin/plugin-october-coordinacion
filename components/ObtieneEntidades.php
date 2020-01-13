<?php namespace LuisMayta\Coordinacion\Components;

use Cms\Classes\ComponentBase;

class ObtieneEntidades extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'luismayta.coordinacion::lang.obtiene_entidades.ob_name',
            'description' => 'luismayta.coordinacion::lang.obtiene_entidades.ob_desc'
        ];
    }
    public function defineProperties()
    {
        return [
            'Modelo' => [
                'title'             => 'Tabla',
                'description'       => 'Obtiene los registros de la tabla escogida',
                'type'              => 'string',
            ]
        ];
    }

    public function Modelo()
    {
        $modelo = $this->property('Modelo');
        $instancia = trim("LuisMayta\Coordinacion\Models\ ").$modelo;
        $obj=new $instancia;

        return $obj::get();
    }
    public function ModeloPorMes()
    {
        $modelo = $this->property('Modelo');
        $instancia = trim("LuisMayta\Coordinacion\Models\ ").$modelo;
        $obj=new $instancia;

        return $obj::get();
    }
}