<?php

use Carbon\Carbon;

Route::get('/asistencias/register/{idhermano}/{estado}','LuisMayta\Coordinacion\Components\ObtieneEntidades@RegistrarAsistencia' );
Route::get('test',function(){
    $fecha = '1982-01-28';
    $tmp = explode('-',$fecha);
    $fecha = date('Y')."-".$tmp[1]."-".$tmp[2];
    $carbon = Carbon::create();
    $dt = new Carbon($fecha);
    
    dd($dt->format('d'));
});