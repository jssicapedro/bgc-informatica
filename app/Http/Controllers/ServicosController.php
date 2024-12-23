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
        $servicos = Servico::withTrashed()->with('categoria')->paginate(5);

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

        return redirect()->route('servicos')->with('success', 'Servicos created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $servico = Servico::with('categoria')->findOrFail($id);
        
        return view('admin.servicos.servico_view', compact('servico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        /* dd($servico = Servicos::findOrFail($id)); */
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

        return redirect()->route('servicos')->with('success', 'Servicos updated successfully.');
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

        return redirect()->route('servicos')->with('success', 'Servicos excluído com sucesso.');
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

        return redirect()->route('servicos')->with('success', 'Servicos restaurado com sucesso.');
    }

    public function buscarServicos(Request $request)
    {
        $categoria = $request->query('categoria', null);

        if ($categoria) {
            $servicos = Servico::where('categoria_id', $categoria)->get();
        } else {
            $servicos = Servico::all();
        }
        return response()->json([
            'servicos' => $servicos
        ], 200);
    }

    public function getServicosPorCategoria($categoriaId)
    {
        // Verifique se a categoria existe antes de tentar buscar os serviços
        $categoria = Categoria::find($categoriaId);

        if ($categoria) {
            $servicos = Servico::where('categoria_id', $categoriaId)->get();
            return response()->json(['servicos' => $servicos]);
        } else {
            return response()->json(['servicos' => []]);
        }
    }

    public function calculaOrcamento(Request $request, $categoria, $servico)
    {
        // Recupera a categoria (dispositivo) selecionada
        $categoria = Categoria::find($categoria);

        // Recupera os serviços que pertencem à categoria selecionada
        $servico = Servico::find($servico);

        // Recupera o serviço selecionado, e verifica se ele pertence à categoria do dispositivo
        if ($categoria && $servico) {
            // Calcula o total com base no serviço selecionado
            $total = ($servico->estimativa / 60) * $servico->custo;
        }

        return response()->json([
            'total' => $total
        ]);
    }
}
