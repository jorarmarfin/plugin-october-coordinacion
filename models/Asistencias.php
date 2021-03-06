<?php namespace LuisMayta\Coordinacion\Models;

use Model;

/**
 * Model
 */
class Asistencias extends Model
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
    public $table = 'luismayta_coordinacion_asistencias';

    protected $guarded = [];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    /**
     * Relations
     */
    public $belongsTo = [
        'hermano' => ['LuisMayta\Coordinacion\Models\Hermanos','key' => 'idhermano']
    ];
    /**
     * Scopes
     */
    public function scopeResumenAsistencia($query,$id,$estado)
    {
        $date = date('Y');
        return $query->where('idhermano',$id)->whereYear('fecha',$date)->where('estado',$estado);
    }
}
