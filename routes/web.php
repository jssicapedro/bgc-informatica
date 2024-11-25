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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.index');
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
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

    /* EQUIPAMENTOS */
    Route::get('/equipamentos', [EquipamentosController::class, 'index'])->name('equipamentos');
    Route::get('/equipamento/{id}', [EquipamentosController::class, 'show'])->name('equipamento.show');
    Route::get('/novo-equipamento', [EquipamentosController::class, 'create'])->name('equipamento.new');
    Route::post('/novo-equipamento/store', [EquipamentosController::class, 'store'])->name('equipamento.store');
    Route::get('/ver-equipamento/{id}', [EquipamentosController::class, 'edit'])->name('equipamento.edit');
    Route::put('/ver-equipamento/{id}/update', [EquipamentosController::class, 'update'])->name('equipamento.update');

    /* MARCAS MODELOS */
    Route::get('/marcas-modelos', [MarcaController::class, 'index'])->name('marcas-modelos');
    Route::get('/marcas-modelos/novo', [MarcaController::class, 'create'])->name('marcamodelo.new');
    Route::post('/marcas-modelos/store', [MarcaController::class, 'store'])->name('marcamodelo.store');
    Route::get('/ver-marca-modelo/{id}', [MarcaController::class, 'edit'])->name('marcamodelo.edit');
    Route::put('/ver-marca-modelo/{id}/update', [MarcaController::class, 'update'])->name('marcamodelo.update');

    /* REPARACOES */
    Route::get('/reparacoes', [ReparacoesController::class, 'index'])->name('reparacoes');
    Route::get('/reparacoes/{id}', [ReparacoesController::class, 'show'])->name('reparacao.show');
    Route::get('/nova-reparacao', [ReparacoesController::class, 'create'])->name('reparacao.new');
    Route::post('/nova-reparacao/store', [ReparacoesController::class, 'store'])->name('reparacao.store');

    /* ENCOMENDAS */
    Route::get('/encomendas', [EncomendasController::class, 'index'])->name('encomendas');
    Route::get('/encomenda/{id}', [EncomendasController::class, 'show'])->name('encomenda.show');
    Route::get('/nova-encomenda', [EncomendasController::class, 'create'])->name('encomenda.new');
    Route::post('/nova-encomenda/store', [EncomendasController::class, 'store'])->name('encomenda.store');
    Route::get('/ver-encomenda/{id}', [EncomendasController::class, 'edit'])->name('encomenda.edit');
    Route::put('/ver-encomenda/{id}/update', [EncomendasController::class, 'update'])->name('encomenda.update');

    /* SERVICOS */
    Route::get('/servicos', [ServicosController::class, 'index'])->name('servicos');
    Route::get('/servicos/{id}', [ServicosController::class, 'show'])->name('servico.show');
    Route::get('/novo-servico', [ServicosController::class, 'create'])->name('servico.new');
    Route::post('/novo-servico/store', [ServicosController::class, 'store'])->name('servico.store');

    /* CATEGORIAS */
    Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias');
    Route::get('/categorias/{id}', [CategoriasController::class, 'show'])->name('categoria.show');
    Route::get('/nova-categorias', [CategoriasController::class, 'create'])->name('categoria.new');
    Route::post('/nova-categorias/store', [CategoriasController::class, 'store'])->name('categoria.store');

    /* TECNICOS */
    Route::get('/tecnicos', [TecnicosController::class, 'index'])->name('tecnicos');
    Route::get('/tecnicos/{id}', [TecnicosController::class, 'show'])->name('tecnico.show');
    Route::get('/novo-tecnico', [TecnicosController::class, 'create'])->name('tecnico.new');
    Route::post('/novo-tecnico/store', [TecnicosController::class, 'store'])->name('tecnico.store');
});


Route::get("/dev/repair", [ReparacoesController::class, 'create']);
