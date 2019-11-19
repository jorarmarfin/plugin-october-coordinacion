<?php namespace LuisMayta\Coordinacion;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails() {
        return [
            'name'        => 'luismayta.coordinacion::lang.plugin.name',
            'description' => 'luismayta.coordinacion::lang.plugin.description',
            'author'      => 'Luis Mayta',
            'icon'        => 'icon-users',
            'homepage'    => 'https://github.com/skydiver/'
        ];
    }
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
}
