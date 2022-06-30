<?php

use App\Http\Controllers\ClientesApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('clientes', [ClientesApiController::class, 'getAllClientes']);
Route::get('clientes/{id}',  [ClientesApiController::class, 'getCliente']);
Route::post('clientes', [ClientesApiController::class],'createCliente');
Route::put('clientes/{id}', [ClientesApiController::class],'updateCliente');
Route::delete('clientes/{id}', [ClientesApiController::class, 'deleteCliente']);