<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipamentoRequest;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Equipamento;
use App\Models\Modelo;
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
        $equipamentos = Equipamento::with('cliente', 'modelo', 'categoria')->get();

//        dd($equipamentos->toArray());

        return view('admin.equipamentos.equipamentos')
            ->with('equipamentos', $equipamentos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $modelos = Modelo::all();
        $clientes = Cliente::all();

        return view('admin.equipamentos.equipamento_new')
        ->with([
            'categorias' => $categorias,
            'modelos' => $modelos,
            'clientes' => $clientes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipamentoRequest $request)
    {
        Equipamento::create([
            'categoria_id' => $request->categoria_id,
            'modelo_id' => $request->modelo_id,
            'cliente_id' => $request->cliente_id,
        ]);
/* 
        dd($request->toArray()); */

        return redirect()->route('equipamentos')->with('success', 'Equipamento created successfully.');
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
