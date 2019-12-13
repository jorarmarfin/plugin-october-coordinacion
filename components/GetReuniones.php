<?php namespace LuisMayta\Coordinacion\Components;

use Cms\Classes\ComponentBase;
use LuisMayta\Coordinacion\Models\Reuniones;

class GetReuniones extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'luismayta.coordinacion::lang.reuniones.reunion_name',
            'description' => 'luismayta.coordinacion::lang.reuniones.reunion_desc'
        ];
    }

    // This array becomes available on the page as {{ component.posts }}
    public function lista_reuniones()
    {
        return Reuniones::orderBy('fecha','asc')->get();
    }
}