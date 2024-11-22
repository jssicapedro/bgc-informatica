<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoRequest;
use App\Models\Categoria;
use App\Models\Servico;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class ServicosController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicos = Servico::with('categoria')->get();

        return view('admin.servicos.servicos', compact('servicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();  // Obtém todas as categorias
        return view('admin.servicos.servico_new', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicoRequest $request)
    {
        Servico::create([
            'categoria_id' => $request->categoria_id,
            'nome' => $request->nome,
            'custo' => $request->custo, 
            'estimativa' => $request->estimativa,
            'descricao' => $request->descricao,
        ]);

        /* dd($request->toArray()); */

        return redirect()->route('servicos')->with('success', 'Servico created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $servico = Servico::findOrFail($id);

        return view('admin.servicos.servico_view', compact('servico'));
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
