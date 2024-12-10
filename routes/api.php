<?php

use App\Http\Controllers\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('equipamento/{id}', [\App\Http\Controllers\EquipamentosController::class, 'buscarEquipamentoPorId']);
Route::get('servico', [\App\Http\Controllers\ServicosController::class, 'buscarServicos']);
Route::get('/servicos/{categoria_id}', [IndexController::class, 'getServicosPorCategoria'])->name('servicos.por_categoria');
