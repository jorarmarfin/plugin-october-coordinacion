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
}
