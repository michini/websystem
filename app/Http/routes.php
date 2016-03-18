<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

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
    Route::group(['prefix'=>'admin','middleware'=>'isAdmin'],function(){
        Route::resource('evento','EventoController');
        Route::resource('usuario','UserController');
        Route::resource('cliente','ClienteController');
        Route::resource('contrato','ContratoController');
        Route::resource('pago','PagoController');
    });
    Route::get('api','EventoController@api');
});

Route::get('ver',function(){
    echo Carbon\Carbon::now()->subDays(5)->diffForHumans();
});


