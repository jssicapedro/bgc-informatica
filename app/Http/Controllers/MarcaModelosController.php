<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarcaModeloRequest;
use App\Models\MarcaModelo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class MarcaModelosController extends Controller
{
    use SoftDeletes;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcasmodelos=MarcaModelo::all();
        return view('admin.marcamodelo.marcamodelos', compact('marcasmodelos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.marcamodelo.marcamodelo_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarcaModeloRequest $request)
    {
        MarcaModelo::create([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
        ]);

        return redirect()->route('marcasmodelos')->with('success', 'MarcasModelos created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        # como é pouca informação não se viu necessidade de ter uma página propria para visualizar os detalhes da marca modelo, se posteriormente se adicionar descrição, peço e outros dados do modelo ai sim ser´necessário
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
