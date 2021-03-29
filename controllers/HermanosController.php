<?php namespace LuisMayta\Coordinacion\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use LuisMayta\Coordinacion\Models\Hermanos;

class HermanosController extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('LuisMayta.Coordinacion', 'main-menu-item');
    }
    public function getHermanos()
    {
        $h = Hermanos::orderBy('nombres','asc')->get(); 
        foreach ($h as $key => $item) {
            
            $imagen = (isset($item->foto)) ? $item->foto->getPath() : 'noimagen.jpg' ;
            //$h->imagen = $imagen;
        }
        return $h;
    }
    public function getCumpleMes()
    {
        $h = Hermanos::UltimoCumple()->get(); 
        foreach ($h as $key => $item) {
            
            $imagen = (isset($item->foto)) ? $item->foto->getPath() : 'noimagen.jpg' ;
            //$h->imagen = $imagen;
        }
        return $h;
    }
    public function getCumpleanos()
    {
        $h = Hermanos::OrderBy('fecha_orden','asc')->get();
        return $h;
    }
}
