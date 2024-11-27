<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoRequest;
use App\Models\Categoria;
use App\Models\Servico;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicosController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicos = Servico::withTrashed()->with('categoria')->get();

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
            'nome' => ucfirst(strtolower($request->input('nome'))),
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
    public function show($id)
    {
        $servico = Servico::findOrFail($id);

        return view('admin.servicos.servico_view', compact('servico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        /* dd($servico = Servico::findOrFail($id)); */
        $servico = Servico::findOrFail($id);
        $categorias = Categoria::all();

        return view('admin.servicos.servico_edit', compact('servico', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicoRequest $request, $id)
    {
        $servico = Servico::findOrFail($id);

        // Atualize os campos
        $servico->categoria_id = $request->input('categoria_id');
        $servico->nome = ucfirst(strtolower($request->input('nome')));
        $servico->custo = $request->input('custo');
        $servico->estimativa = $request->input('estimativa');
        $servico->descricao = $request->input('descricao');

        // Salve as alterações
        $servico->save();

        return redirect()->route('servicos')->with('success', 'Servico updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       // Encontre o técnico ou falhe com 404 se não encontrado
       $servico = Servico::findOrFail($id);

       // Soft delete do técnico (não remove fisicamente do banco, apenas marca como excluído)
       $servico->delete();

       return redirect()->route('servicos')->with('success', 'Servico excluído com sucesso.');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        // Recupera o técnico excluído (soft deleted)
        $servico = Servico::withTrashed()->findOrFail($id);

        // Restaura o técnico
        $servico->restore();

        return redirect()->route('servicos')->with('success', 'Servico restaurado com sucesso.');
    }
}
