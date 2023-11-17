<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuartoController;
use App\Http\Controllers\ReservaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//ROTAS SOLICITADAS NO teste PARA VERIFICAR OS QUARTOS DISPONÍVEIS    
Route::get('/quartos/disponivel', [QuartoController::class, 'listarDisponiveis']);
Route::get('/quartos/ocupados', [QuartoController::class, 'OcupadosPorData']);
//Rota para verificar as reservas de um cliente especifico 
Route::get('/reservas/{clienteId}', [ReservaController::class, 'reservasDoCliente']);

Route::post('/login', [AuthController::class, 'auth']);
