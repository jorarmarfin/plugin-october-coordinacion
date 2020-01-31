<?php namespace LuisMayta\Coordinacion\Models;

use Model;
use Carbon\Carbon;

/**
 * Model
 */
class Hermanos extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'luismayta_coordinacion_hermanos';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    /**
     * Avatares
     */
    public $attachOne = [
        'foto' => 'System\Models\File'
    ];
    /**
     * Accessors
     */
    public function getNombreCompletoAttribute()
    {
        return $this->nombres.' '.$this->apellidos;
    }
    public function getNombrePilaAttribute()
    {
        $primer = explode(' ',$this->nombres);
        $segun = explode(' ',$this->apellidos);
        return $primer[0].' '.$segun[0];
    }
    public function getTMesAttribute()
    {
        $date  = Carbon::parse($this->fecha_nacimiento);
        switch ($date->month) {
            case 1:
               $mes = 'Enero';
                break;
            case 2:
               $mes = 'Febrero';
                break;
            case 3:
               $mes = 'Marzo';
                break;
            case 4:
               $mes = 'Abril';
                break;
            case 5:
               $mes = 'Mayo';
                break;
            case 6:
               $mes = 'Junio';
                break;
            case 7:
               $mes = 'Julio';
                break;
            case 8:
               $mes = 'Agosto';
                break;
            case 9:
               $mes = 'Setiembre';
                break;
            case 10:
               $mes = 'Octubre';
                break;
            case 11:
               $mes = 'Noviembre';
                break;
            case 12:
               $mes = 'Diciembre';
                break;
            
        }
        return $mes;
    }
    public function getTDiaAttribute()
    {
        $tmp = explode('-',$this->fecha_nacimiento);
        $fecha = date('Y')."-".$tmp[1]."-".$tmp[2];
        $dt = new Carbon($fecha);
        $carbon = Carbon::create();
        switch ($dt->format('D')) {
            case 'Mon':
               $dia = 'Lunes';
                break;
            case 'Tue':
               $dia = 'Martes';
                break;
            case 'Wed':
               $dia = 'Miercoles';
                break;
            case 'Thu':
               $dia = 'Jueves';
                break;
            case 'Fri':
               $dia = 'Viernes';
                break;
            case 'Sat':
               $dia = 'Sábado';
                break;
            case 'Sun':
               $dia = 'Domingo';
                break;
        }
        
        return $dia.' '.$dt->day;
    }
    public function getAsistenciaAttribute()
    {
        $carbon = new Carbon(); 
        $asistencia = Asistencias::select('estado')->where('idhermano',$this->id)->where('fecha',$carbon->format('Y-m-d'))->first();
        $retVal = (is_null($asistencia)) ? '---' : $asistencia->estado;
        return $retVal;
    }
    public function setFechaNacimientoAttribute($value)
    {
        $this->attributes['fecha_nacimiento'] = $value;
        $dt = new Carbon($value);
        $this->attributes['dia_nacimiento'] = $dt->format('d');
        $this->attributes['mes_nacimiento'] = $dt->format('m');
    }
    /**
     * Query Scope
     */
    public function scopeUltimoCumple($query)
    {
        $mes = date('m');
        return $query->whereMonth('fecha_nacimiento',$mes)->orderBy('dia_nacimiento','desc');
    }
    public function scopeBirthDays($query)
    {
        $date = date('y-m-d');
        return $query->whereDate('fecha_nacimiento','>=',$date)->orderBy('mes_nacimiento','asc')->orderBy('dia_nacimiento','asc');
    } 
}
