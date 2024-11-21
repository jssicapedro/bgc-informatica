<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Equipamento;
use App\Models\MarcaModelo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class EquipamentosController extends Controller
{
    use SoftDeletes;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Carregar todos os equipamentos
        $equipamentos = Equipamento::with(['categoria'])->get();

        // Verifique os dados carregados
        /* dd($equipamentos); */ 

        return view('admin.equipamentos.equipamentos', compact('equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.equipamentos.equipamento_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $equipamento = Equipamento::findOrFail($id);

        return view('admin.equipamentos.equipamento_view', compact('equipamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
