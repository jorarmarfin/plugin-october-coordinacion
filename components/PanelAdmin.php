<?php namespace LuisMayta\Coordinacion\Components;

use Cms\Classes\ComponentBase;
use LuisMayta\Coordinacion\Models\Sabado;
use LuisMayta\Coordinacion\Models\Eventos;
use LuisMayta\Coordinacion\Models\Hermanos;
use LuisMayta\Coordinacion\Models\Reuniones;
use LuisMayta\Coordinacion\Models\Asistencias;

class PanelAdmin extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'luismayta.coordinacion::lang.panel_admin.de_name',
            'description' => 'luismayta.coordinacion::lang.panel_admin.de_desc'
        ];
    }
    public function Panel()
    {
        $mes = date('m');
        $hermano = Hermanos::UltimoCumple()->first();
        $zonal = Reuniones::UltimaReunion('zonal')->first();
        $capilla = Reuniones::UltimaReunion('capilla')->first();
        $servidores = Reuniones::UltimaReunion('servidores')->first();
        $sabados = Sabado::ReunionMes()->get();
        $eventos = Eventos::EventosMes()->get();
        $data = [
            'cumple'=>$hermano,
            'zonal'=>$zonal,
            'capilla'=>$capilla,
            'servidores'=>$servidores,
            'sabados'=>$sabados,
            'eventos'=>$eventos,
        ];
        return $data;
    }
}