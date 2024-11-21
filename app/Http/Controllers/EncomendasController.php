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
        $encomendas = Encomenda::all();
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
    public function show(string $id)
    {
        $encomenda = Encomenda::findOrFail($id);

        return view('admin.encomendas.encomenda_view', compact('encomenda'));
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
