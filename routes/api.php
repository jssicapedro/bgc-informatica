<?php

use App\Http\Controllers\EquipamentosController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ServicosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/servicos/{categoria_id}', [IndexController::class, 'getServicosPorCategoria'])->name('servicos.por_categoria');
Route::get('/orcamento/{categoria}/{servico}', [ServicosController::class, 'calculaOrcamento'])->name('servicos.por_categoria');
Route::get('equipamento/{id}', [EquipamentosController::class, 'buscarEquipamentoPorId']);
Route::get('servico', [ServicosController::class, 'buscarServicos']);
