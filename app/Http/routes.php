<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/admin/contrato/pdf',['uses'=>'ContratoController@contratoPdf','as'=>'contratoPdf']);
    Route::get('/admin/evento/sinfilmador',['uses'=>'EventoController@sinFilmador','as'=>'sinFilmador']);
    Route::get('/admin/evento/confilmador',['uses'=>'EventoController@conFilmador','as'=>'conFilmador']);
    Route::get('/admin/evento/cliente',['uses'=>'EventoController@clientes','as'=>'clientes']);
    Route::post('/admin/evento/filmador',['uses'=>'EventoController@actualizarFilmador','as'=>'actualizarFilmador']);
    Route::get('/admin/evento/proximos',['uses'=>'EventoController@eventoProximo','as'=>'eventoProximo']);
    Route::get('/admin/evento/pasados',['uses'=>'EventoController@eventoPasado','as'=>'eventoPasado']);
    Route::get('/admin/evento/hoy',['uses'=>'EventoController@eventoHoy','as'=>'eventoHoy']);
    Route::get('/reset/password',['uses'=>'UserController@getResetPassword','as'=>'getResetPassword']);
    Route::put('/reset/password',['uses'=>'UserController@postResetPassword','as'=>'postResetPassword']);
    Route::get("/admin/usuario/{id}/contratos",['uses'=>'UserController@userContracts','as'=>'userContracts'])->where(["id"=>"[0-9]+"]);
    Route::get("/admin/cliente/{id}/contratos",['uses'=>'ClienteController@clientContracts','as'=>'clientContracts'])->where(["id"=>"[0-9]+"]);
    Route::group(['prefix'=>'admin','middleware'=>['role:administrador']],function(){
        Route::resource('evento','EventoController');
        Route::resource('usuario','UserController');
        Route::resource('cliente','ClienteController');
        Route::resource('contrato','ContratoController');
        Route::resource('pago','PagoController');
        Route::resource('paquete','PaqueteController');
        Route::resource('filmador','FilmadorController');
        Route::resource('compromiso','CompromisoController');
        Route::resource('reporte','ReporteController');
    });
    Route::group(['prefix'=>'admin'],function(){
        Route::resource('evento','EventoController');
        Route::resource('contrato','ContratoController');
        Route::resource('usuario','UserController');
    });
    Route::get('api','EventoController@api');
});

/*
App::missing(function($exception) {
    return View::make('home');
});
*/



