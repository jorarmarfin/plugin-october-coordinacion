<?php namespace LuisMayta\Coordinacion\Components;

use Carbon\Carbon;
use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
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
            ],
            'Paginacion' => [
                'title'             => 'Paginacion',
                'description'       => 'Inserte la cantidad de registros si desea paginar',
                'type'              => 'string',
            ],
            'CampoMes' => [
                'title'             => 'Campo de mes',
                'description'       => 'Inserte El campo de mes para buscar',
                'default'       => 'fecha',
                'type'              => 'string',
            ],
            'CampoOrden' => [
                'title'             => 'Campo Orden',
                'description'       => 'Campo por el cual ordenara',
                'default'       => 'id',
                'type'              => 'string',
            ],
            'Orden' => [
                'title'             => 'Orden',
                'description'       => 'Campo por el cual ordenara',
                'default'       => 'asc',
                'type'              => 'string',
            ],
        ];
    }

    public function Modelo()
    {
        $modelo = $this->property('Modelo');
        $instancia = trim("LuisMayta\Coordinacion\Models\ ").$modelo;
        $obj=new $instancia;

        $cnt = intval($this->property('Paginacion'));
        $campo_orden = $this->property('CampoOrden');
        $orden = $this->property('Orden');

        if ($cnt>0) {
            return $obj::orderBy($campo_orden,$orden)->paginate($cnt);
        } else {
            return $obj::orderBy($campo_orden,$orden)->get();
        }
    }
    public function ModeloPorMes()
    {
        $modelo = $this->property('Modelo');
        $instancia = trim("LuisMayta\Coordinacion\Models\ ").$modelo;
        $obj=new $instancia;
        $mes = date('m');

        $retVal = $this->property('CampoMes') ;
        $tmp = $obj::whereMonth($retVal,$mes);

        $o = $this->property('Orden');
        $tmp->OrderBy($o);

        $data = [
            'data'=>$tmp->get(),
            'mes'=>$tmp->first()
        ];
        return $data;
    }
    public function BirthDay()
    {
        $hermanos = Hermanos::BirthDays()->take(10)->get();
        return $hermanos;
    }
    public function TotalAsistencia()
    {
        $query = "select h.nombres,
        if(r1.cantidad is null,0,r1.cantidad) as asistencias,
        if(r2.cantidad is null,0,r2.cantidad) as faltas,
        if(r3.cantidad is null,0,r3.cantidad) as tardanzas,
        if(r4.cantidad is null,0,r4.cantidad) as justificaciones
        from luismayta_coordinacion_hermanos as h
        left join (
        select idhermano,estado,count(*) as cantidad
        from luismayta_coordinacion_asistencias 
        where estado='A'
        group by idhermano,estado
        ) as r1 on r1.idhermano=h.id
        left join (
        select idhermano,estado,count(*) as cantidad
        from luismayta_coordinacion_asistencias 
        where estado='F'
        group by idhermano,estado
        ) as r2 on r2.idhermano=h.id
        left join (
        select idhermano,estado,count(*) as cantidad
        from luismayta_coordinacion_asistencias 
        where estado='T'
        group by idhermano,estado
        ) as r3 on r3.idhermano=h.id
        left join (
        select idhermano,estado,count(*) as cantidad
        from luismayta_coordinacion_asistencias 
        where estado='J'
        group by idhermano,estado
        ) as r4 on r4.idhermano=h.id";

        $asistencias = DB::select($query);
        return $asistencias;
    }
    public function RegistrarAsistencia($idhermano,$estado)
    {
        $carbon = new Carbon(); 
        $asistencia = Asistencias::firstOrNew([
                        'fecha'=>$carbon->format('Y-m-d'),
                        'idhermano'=>$idhermano,
                    ]);
        $asistencia->estado=$estado;
        $asistencia->save();
        return Redirect::to('/asistencias/create');
    }
}