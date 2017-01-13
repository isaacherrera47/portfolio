<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'ProyectoController@index');

//Rutas de permisos
Route::get('permisos/check','PermisoController@index');
Route::post('permisos/check','PermisoController@check');
Route::get('permisos/create','PermisoController@create');
Route::post('permisos/','PermisoController@store');
Route::delete('permisos/{permisos}','PermisoController@destroy');

Route::get('accesos/{accesos}','AccesoController@index');


Route::resource('proyectos','ProyectoController',['except'=> ['index','edit']]);