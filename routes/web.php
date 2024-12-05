<?php

use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EquipamentosController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ReparacoesController;
use App\Http\Controllers\OrcamentosController;
use App\Http\Controllers\EncomendasController;
use App\Http\Controllers\DividasController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\TecnicosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/servicos/{categoria_id}', [IndexController::class, 'getServicosPorCategoria'])->name('servicos.por_categoria');
Route::get('/consultar_rma', [IndexController::class, 'consultarRMA'])->name('consultar.rma');
Route::post('/consultar_rma', [IndexController::class, 'processarConsultaRMA'])->name('consultar.rma.processar');
Route::get('termos&condicoes', [IndexController::class, 'termosCondicoes'])->name('termosCondicoes');
Route::get('politica&privacidade', [IndexController::class, 'politicaPrivacidade'])->name('politicaPrivacidade');


Route::middleware('guest')->group(function () {
    Route::get('tecnico/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/calendario', [CalendarioController::class, 'index'])->name('calendario');


    /* CLIENTES */
    Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes');
    Route::get('/cliente/{id}', [ClientesController::class, 'show'])->name('cliente.show');
    Route::get('/novo-cliente', [ClientesController::class, 'create'])->name('cliente.new');
    Route::post('/novo-cliente/store', [ClientesController::class, 'store'])->name('cliente.store');
    Route::get('/ver-cliente/{id}', [ClientesController::class, 'edit'])->name('cliente.edit');
    Route::put('/ver-cliente/{id}/update', [ClientesController::class, 'update'])->name('cliente.update');
    Route::delete('/ver-cliente/{id}/delete', [ClientesController::class, 'destroy'])->name('cliente.destroy');
    Route::patch('/ver-cliente/{id}/restore', [ClientesController::class, 'restore'])->name('cliente.restore');

    // Em routes/web.php ou routes/api.php
    Route::get('/clientes/all', [ClientesController::class, 'getAllClientes']);




    /* EQUIPAMENTOS */
    Route::get('/equipamentos', [EquipamentosController::class, 'index'])->name('equipamentos');
    Route::get('/equipamento/{id}', [EquipamentosController::class, 'show'])->name('equipamento.show');
    Route::get('/novo-equipamento', [EquipamentosController::class, 'create'])->name('equipamento.new');
    Route::post('/novo-equipamento/store', [EquipamentosController::class, 'store'])->name('equipamento.store');
    Route::get('/ver-equipamento/{id}', [EquipamentosController::class, 'edit'])->name('equipamento.edit');
    Route::put('/ver-equipamento/{id}/update', [EquipamentosController::class, 'update'])->name('equipamento.update');
    Route::delete('/ver-equipamento/{id}/delete', [EquipamentosController::class, 'destroy'])->name('equipamento.destroy');
    Route::patch('/ver-equipamento/{id}/restore', [EquipamentosController::class, 'restore'])->name('equipamento.restore');

    /* MARCAS MODELOS */
    Route::get('/marcas-modelos', [MarcaController::class, 'index'])->name('marcas-modelos');
    Route::get('/marcas-modelos/novo', [MarcaController::class, 'create'])->name('marcamodelo.new');
    Route::post('/marcas-modelos/store', [MarcaController::class, 'store'])->name('marcamodelo.store');
    Route::get('/ver-marca-modelo/{id}', [MarcaController::class, 'edit'])->name('marcamodelo.edit');
    Route::put('/ver-marca-modelo/{id}/update', [MarcaController::class, 'update'])->name('marcamodelo.update');
    Route::delete('/ver-marca-modelo/{id}/delete', [MarcaController::class, 'destroy'])->name('marcamodelo.destroy');
    Route::patch('/ver-marca-modelo/{id}/restore', [MarcaController::class, 'restore'])->name('marcamodelo.restore');

    /* REPARACOES */
    Route::get('/reparacoes', [ReparacoesController::class, 'index'])->name('reparacoes');
    Route::get('/reparacoes/{id}', [ReparacoesController::class, 'show'])->name('reparacao.show');
    Route::get('/nova-reparacao', [ReparacoesController::class, 'create'])->name('reparacao.new');
    Route::post('/nova-reparacao/store', [ReparacoesController::class, 'store'])->name('reparacao.store');
    Route::get('/ver-reparacao/{id}', [ReparacoesController::class, 'edit'])->name('reparacao.edit');
    Route::put('/ver-reparacao/{id}/update', [ReparacoesController::class, 'update'])->name('reparacao.update');
    Route::delete('/reparacao/{id}/delete', [ReparacoesController::class, 'destroy'])->name('reparacao.destroy');
    Route::patch('/reparacao/{id}/restore', [ReparacoesController::class, 'restore'])->name('reparacao.restore');

    Route::get('/servicos/categoria/{categoriaId}', [ServicosController::class, 'getServicosPorCategoria']);

    /* ENCOMENDAS */
    Route::get('/encomendas', [EncomendasController::class, 'index'])->name('encomendas');
    Route::get('/encomenda/{id}', [EncomendasController::class, 'show'])->name('encomenda.show');
    Route::get('/nova-encomenda', [EncomendasController::class, 'create'])->name('encomenda.new');
    Route::post('/nova-encomenda/store', [EncomendasController::class, 'store'])->name('encomenda.store');
    Route::get('/ver-encomenda/{id}', [EncomendasController::class, 'edit'])->name('encomenda.edit');
    Route::put('/ver-encomenda/{id}/update', [EncomendasController::class, 'update'])->name('encomenda.update');
    Route::delete('/encomendas/{id}/delete', [EncomendasController::class, 'destroy'])->name('encomenda.destroy');
    Route::patch('/encomendas/{id}/restore', [EncomendasController::class, 'restore'])->name('encomenda.restore');

    /* SERVICOS */
    Route::get('/servicos', [ServicosController::class, 'index'])->name('servicos');
    Route::get('/servicos/{id}', [ServicosController::class, 'show'])->name('servico.show');
    Route::get('/novo-servico', [ServicosController::class, 'create'])->name('servico.new');
    Route::post('/novo-servico/store', [ServicosController::class, 'store'])->name('servico.store');
    Route::get('/ver-servico/{id}', [ServicosController::class, 'edit'])->name('servico.edit');
    Route::put('/ver-servico/{id}/update', [ServicosController::class, 'update'])->name('servico.update');
    Route::delete('/servicos/{id}/delete', [ServicosController::class, 'destroy'])->name('servicos.destroy');
    Route::patch('/servicos/{id}/restore', [ServicosController::class, 'restore'])->name('servicos.restore');

    /* CATEGORIAS */
    Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias');
    Route::get('/categorias/{id}', [CategoriasController::class, 'show'])->name('categoria.show');
    Route::get('/nova-categorias', [CategoriasController::class, 'create'])->name('categoria.new');
    Route::post('/nova-categorias/store', [CategoriasController::class, 'store'])->name('categoria.store');
    Route::get('/ver-categoria/{id}', [CategoriasController::class, 'edit'])->name('categoria.edit');
    Route::put('/ver-categoria/{id}/update', [CategoriasController::class, 'update'])->name('categoria.update');
    Route::delete('/categorias/{id}/delete', [CategoriasController::class, 'destroy'])->name('categorias.destroy');
    Route::patch('/categorias/{id}/restore', [CategoriasController::class, 'restore'])->name('categorias.restore');


    /* TECNICOS */
    Route::get('/tecnicos', [TecnicosController::class, 'index'])->name('tecnicos');
    Route::get('/tecnicos/{id}', [TecnicosController::class, 'show'])->name('tecnico.show');
    Route::get('/novo-tecnico', [TecnicosController::class, 'create'])->name('tecnico.new');
    Route::post('/novo-tecnico/store', [TecnicosController::class, 'store'])->name('tecnico.store');
    Route::get('/ver-tecnico/{id}', [TecnicosController::class, 'edit'])->name('tecnico.edit');
    Route::put('/ver-tecnico/{id}/update', [TecnicosController::class, 'update'])->name('tecnico.update');
    Route::delete('/tecnicos/{id}/delete', [TecnicosController::class, 'destroy'])->name('tecnico.destroy');
    Route::patch('/tecnicos/{id}/restore', [TecnicosController::class, 'restore'])->name('tecnico.restore');
});


Route::get("/dev/repair", [ReparacoesController::class, 'create']);
