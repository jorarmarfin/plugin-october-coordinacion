<?php namespace LuisMayta\Coordinacion\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\DB;
use LuisMayta\Coordinacion\Models\Hermanos;
use LuisMayta\Coordinacion\Models\Asistencias;

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
    public function ModeloPorMes($t='n')
    {
        $modelo = $this->property('Modelo');
        $instancia = trim("LuisMayta\Coordinacion\Models\ ").$modelo;
        $obj=new $instancia;
        $mes = date('m');
        $retVal = ($t=='h') ? 'fecha_nacimiento' : 'fecha' ;
        $tmp = $obj::whereMonth($retVal,$mes);
        $data = [
            'data'=>$tmp->get(),
            'mes'=>$tmp->first()
        ];
        return $data;
    }
    public function TotalAsistencia()
    {
        // $asistencia = Asistencias::select('department', Db::raw('SUM(price) as total_sales'))
        //                          ->groupBy('idhermano')
        // return $data;
        $t_hermanos = 'luismayta_coordinacion_hermanos';
        $t_asistencias = 'luismayta_coordinacion_asistencias';
        $asistencias = Hermanos::select('nombres',DB::raw('count("a.estado") as asistencia'),DB::raw('count("f.estado") as faltas'));

        //$asistencias->join($t_asistencias.' as a', 'a.idhermano', '=', $t_hermanos.'.id');
        $asistencias->leftJoin("{$t_asistencias} as f", function ($join) use($t_hermanos) {
            $join->on($t_hermanos.'.id', '=', 'f.idhermano')
                ->where('f.estado', '=', 'F');
        });
        $asistencias->leftJoin("{$t_asistencias} as a", function ($join) use($t_hermanos) {
            $join->on($t_hermanos.'.id', '=', 'a.idhermano')
                ->where('a.estado', '=', 'A');
        });
        $asistencias->where('nombres','Lucy')->groupBy("{$t_hermanos}.id");
        dd($asistencias->get());
        return 'por hacer';
    }
}