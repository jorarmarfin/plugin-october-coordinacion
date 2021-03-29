<?php namespace LuisMayta\Coordinacion\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use LuisMayta\Coordinacion\Models\GrupoOracion;

class GrupoOracionController extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('LuisMayta.Coordinacion', 'main-menu-item');
    }
    public function getGrupo()
    {
        $g = GrupoOracion::first();
        return $g;
    }
}
