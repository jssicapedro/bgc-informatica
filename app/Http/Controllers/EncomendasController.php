<?php

namespace App\Http\Controllers;

use App\Http\Requests\EncomendaRequest;
use App\Models\Encomenda;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class EncomendasController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $encomendas = Encomenda::paginate(5);
        return view('admin.encomendas.encomendas', compact('encomendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.encomendas.encomenda_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EncomendaRequest $request)
    {
        Encomenda::create([
            'custo' => $request->custo,
            'dataPedido' => now()->toDateString(),
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('encomendas')->with('success', 'Encomenda created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $encomenda = Encomenda::findOrFail($id);

        return view('admin.encomendas.encomenda_view', compact('encomenda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $encomenda = Encomenda::findOrFail($id);

        return view('admin.encomendas.encomenda_edit', compact('encomenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EncomendaRequest $request, $id)
    {
        // Encontre a encomenda
        $encomenda = Encomenda::findOrFail($id);

        // Atualiza os campos que podem ser editados
        $encomenda->custo = $request->input('custo');
        $encomenda->descricao = $request->input('descricao');

        // Verifica se a checkbox 'dataEntrega' foi marcada
        if ($request->has('dataEntrega') && $request->input('dataEntrega') == 'yes') {
            // Se a checkbox estiver marcada, define a data de entrega para o momento atual
            $encomenda->dataEntrega = now(); // 'now()' pega a data e hora atual
        }

        // Salve as alterações
        $encomenda->save();

        return redirect()->route('encomendas')->with('success', 'Encomenda updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
