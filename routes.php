<?php

use Carbon\Carbon;
use LuisMayta\Coordinacion\Models\Hermanos;

Route::get('/asistencias/register/{idhermano}/{estado}','LuisMayta\Coordinacion\Components\ObtieneEntidades@RegistrarAsistencia' );
Route::get('test',function(){
    $m = date('m');$d = date('d');
    //$hermanos = Hermanos::whereMonth('fecha_nacimiento','>=',$m)->whereDay('fecha_nacimiento',$d)->orderBy('mes_nacimiento','asc')->orderBy('dia_nacimiento','asc')->get();
    $hermanos = Hermanos::whereMonth('fecha_nacimiento','>=',$m)->orderBy('mes_nacimiento','asc')->orderBy('dia_nacimiento','asc')->get();
    dd($hermanos);
});