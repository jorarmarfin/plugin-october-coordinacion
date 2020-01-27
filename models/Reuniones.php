<?php namespace LuisMayta\Coordinacion\Models;

use Model;
use Carbon\Carbon;

/**
 * Model
 */
class Reuniones extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;
    protected $guarded = [];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'luismayta_coordinacion_reuniones';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public function getTDiaAttribute()
    {
        $tmp = explode('-',$this->fecha);
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

    /**
     * Query Scope
     */
    public function scopeUltimaReunion($query,$tipo)
    {
        return $query->where('tipo',$tipo)->orderBy('fecha','desc');
    }
}
