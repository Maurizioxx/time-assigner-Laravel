<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\HoraActividadController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/todos', ActividadController::class . '@index')->middleware('auth')->name('todos');

Route::post('/todos', ActividadController::class . '@store'); //invocar el metodo para guardar una actividad


Route::post('/asignar-horas', HoraActividadController::class. '@store')->name('asignar-horas');//invocar el metodo para asignar tiempo

Route::get('/consultar-tiempo', [ActividadController::class, 'consultarTiempo'])->middleware('auth')->name('tiempo.show');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
