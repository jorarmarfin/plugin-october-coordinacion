<?php namespace LuisMayta\Coordinacion\Models;

use Model;

/**
 * Model
 */
class Tareas extends Model
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
    public $table = 'luismayta_coordinacion_tareas';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
