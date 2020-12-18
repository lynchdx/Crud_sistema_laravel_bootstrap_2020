<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('auth.login');
});




//2 maneras de haerlo 
/*
Route::get('/empleados', [EmpleadosController::class, 'index']);
// or
//Route::get('/empleados', 'App\Http\Controllers\EmpleadosController@index');

Route::get('/empleados/create', [EmpleadosController::class, 'create']);
*/

Route::resource('empleados', EmpleadosController::class);



















/*
Route::get('/empleados', function(){
    return view('empleados.index');
});


Route::get('/empleados/create', function(){
    return view('empleados.create');
});


Route::get('/empleados/edit', function(){
    return view('empleados.edit');
});


Route::get('/empleados/form', function(){
    return view('empleados.form');
});

*/







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
