<?php

use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EquipamentosController;
use App\Http\Controllers\MarcaModelosController;
use App\Http\Controllers\ReparacoesController;
use App\Http\Controllers\OrcamentosController;
use App\Http\Controllers\EncomendasController;
use App\Http\Controllers\DividasController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\TecnicosController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.index');
});


Route::middleware('guest')->name('tecnico.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->name('tecnico.')->group(function (){
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/calendario', [CalendarioController::class, 'index'])->name('calendario');

    /* CLIENTES */
    Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes');
    Route::get('/cliente{id}', [ClientesController::class, 'show'])->name('cliente.show');
    Route::get('/clientenovo', [ClientesController::class, 'create'])->name('cliente.new');

    /* EQUIPAMENTOS */
    Route::get('/equipamentos', [EquipamentosController::class, 'index'])->name('equipamentos');
    Route::get('/equipamento{id}', [EquipamentosController::class, 'show'])->name('equipamento.show');

    /* MARCAS MODELOS */
    Route::get('/marcasmodelos', [MarcaModelosController::class, 'index'])->name('marcasmodelos');
    Route::get('/marcasmodelos{id}', [MarcaModelosController::class, 'show'])->name('marcasmodelos.show');

    /* REPARACOES */
    Route::get('/reparacoes', [ReparacoesController::class, 'index'])->name('reparacoes');
    Route::get('/reparacoes{id}', [ReparacoesController::class, 'show'])->name('reparacao.show');

    /* ORCAMENTOS */
    Route::get('/orcamentos', [OrcamentosController::class, 'index'])->name('orcamentos');
    Route::get('/orcamento{id}', [OrcamentosController::class, 'show'])->name('orcamento.show');

    /* ENCOMENDAS */
    Route::get('/encomendas', [EncomendasController::class, 'index'])->name('encomendas');
    Route::get('/encomenda{id}', [EncomendasController::class, 'show'])->name('encomenda.show');

    /* DIVIDAS */
    Route::get('/dividas', [DividasController::class, 'index'])->name('dividas');
    Route::get('/dividas{id}', [DividasController::class, 'show'])->name('dividas.show');

    /* SERVICOS */
    Route::get('/servicos', [ServicosController::class, 'index'])->name('servicos');
    Route::get('/servicos{id}', [ServicosController::class, 'show'])->name('servicos.show');

    /* TECNICOS */
    Route::get('/tecnicos', [TecnicosController::class, 'index'])->name('tecnicos');
    Route::get('/tecnicos{id}', [TecnicosController::class, 'show'])->name('tecnico.show');

});
