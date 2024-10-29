<?php

<<<<<<< Updated upstream
=======
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
>>>>>>> Stashed changes
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< Updated upstream
=======


Route::middleware('guest')->name('tecnico.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->name('tecnico.')->group(function (){
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/calendario', [CalendarioController::class, 'index'])->name('calendario');
    Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes');
    Route::get('/equipamentos', [EquipamentosController::class, 'index'])->name('equipamentos');
    Route::get('/marcasmodelos', [MarcaModelosController::class, 'index'])->name('marcasmodelos');
    Route::get('/reparacoes', [ReparacoesController::class, 'index'])->name('reparacoes');
    Route::get('/orcamentos', [OrcamentosController::class, 'index'])->name('orcamentos');
    Route::get('/encomendas', [EncomendasController::class, 'index'])->name('encomendas');
    Route::get('/dividas', [DividasController::class, 'index'])->name('dividas');
    Route::get('/servicos', [ServicosController::class, 'index'])->name('servicos');
    Route::get('/tecnicos', [TecnicosController::class, 'index'])->name('tecnicos');
});
>>>>>>> Stashed changes
