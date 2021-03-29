<?php

use Carbon\Carbon;
use LuisMayta\Coordinacion\Models\Hermanos;

Route::get('/asistencias/register/{idhermano}/{estado}','LuisMayta\Coordinacion\Components\ObtieneEntidades@RegistrarAsistencia' );

Route::prefix('api/v1')->group(function () {
    
    Route::get('grupo','LuisMayta\Coordinacion\Controllers\GrupoOracionController@getGrupo' );

    Route::get('hermanos','LuisMayta\Coordinacion\Controllers\HermanosController@getHermanos' );
    Route::get('hermanos-cumple-mes','LuisMayta\Coordinacion\Controllers\HermanosController@getCumpleMes' );
    Route::get('hermanos-cumples','LuisMayta\Coordinacion\Controllers\HermanosController@getCumpleanos' );
    
});
Route::get('/asistencias/register/{idhermano}/{estado}','LuisMayta\Coordinacion\Components\ObtieneEntidades@RegistrarAsistencia' );
Route::get('test',function(){
    $m = date('m');$d = date('d');
    //$hermanos = Hermanos::whereMonth('fecha_nacimiento','>=',$m)->whereDay('fecha_nacimiento',$d)->orderBy('mes_nacimiento','asc')->orderBy('dia_nacimiento','asc')->get();
    //$hermanos = Hermanos::whereMonth('fecha_nacimiento','>=',$m)->orderBy('mes_nacimiento','asc')->orderBy('dia_nacimiento','asc')->get();
    dd('test');
});
