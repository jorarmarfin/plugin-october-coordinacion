<?php namespace LuisMayta\Coordinacion\Components;

use Cms\Classes\ComponentBase;
use LuisMayta\Coordinacion\Models\Reuniones;
use LuisMayta\Coordinacion\Models\Asistencias;

class DetalleEntidades extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'luismayta.coordinacion::lang.detalle_entidades.de_name',
            'description' => 'luismayta.coordinacion::lang.detalle_entidades.de_desc'
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
        
        $id = $this->param('id');
        
        return $obj::find($id);
    }
    public function Asistencias()
    {        
        $id = $this->param('id');
        
        $a = Asistencias::ResumenAsistencia($id,'A')->get();
        $f = Asistencias::ResumenAsistencia($id,'F')->get();
        $t = Asistencias::ResumenAsistencia($id,'T')->get();
        $j = Asistencias::ResumenAsistencia($id,'J')->get();
        return [
            'asistencias'=>$a->count(),
            'faltas'=>$f->count(),
            'tardanzas'=>$t->count(),
            'justificaciones'=>$j->count(),
        ];
    }
}