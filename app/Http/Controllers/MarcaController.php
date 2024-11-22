<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarcaModeloRequest;
use App\Models\Marca;
use App\Models\Modelo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarcaController extends Controller
{
    use SoftDeletes;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modelos_with_marcas = Modelo::with('marca')->get();

        return view('admin.marcamodelo.marcamodelos')
            ->with(['modelos_with_marcas' => $modelos_with_marcas]);
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
        DB::beginTransaction();

        $marca = new Marca();
        $marca->nome = ucfirst($request->input('marca'));

        if(!$marca->save())
        {
            DB::rollback();
            return redirect()->back()->withErrors($marca->errors())->withInput();
        }

        $modelo = new Modelo();
        $modelo->marca_id = $marca->id;
        $modelo->nome = ucfirst($request->input('modelo'));

        if(!$modelo->save())
        {
            DB::rollBack();
            return redirect()->back()->withErrors($modelo->errors())->withInput();
        }

        DB::commit();

        return redirect()->route('marcas-modelos')->with('success', 'MarcasModelos created successfully.');
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
