<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesApiController;
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


Route::get('clientes', [ClientesApiController::class, 'getAllClientes']);
Route::get('clientes/{id}',  [ClientesApiController::class, 'getCliente']);
Route::post('clientes', [ClientesApiController::class],'createCliente');
Route::put('clientes/{id}', [ClientesApiController::class],'updateCliente');
Route::delete('clientes/delete/{id}', [ClientesApiController::class], 'deleteCliente');