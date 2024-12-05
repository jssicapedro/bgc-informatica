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
        $modelos_with_marcas = Modelo::with('marca')->withTrashed()->paginate(5);

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

        if (!$marca->save()) {
            DB::rollback();
            return redirect()->back()->withErrors($marca->errors())->withInput();
        }

        $modelo = new Modelo();
        $modelo->marca_id = $marca->id;
        $modelo->nome = ucfirst($request->input('modelo'));

        if (!$modelo->save()) {
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
    public function edit($id)
    {
        $modelo = Modelo::findOrFail($id);
        $marca = $modelo->marca;
        return view('admin.marcamodelo.marcamodelo_edit', compact('marca', 'modelo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MarcaModeloRequest $request, string $id)
    {
        // Encontre o Modelo
        $modelo = Modelo::findOrFail($id);
        // Atualize o nome do Modelo
        $modelo->nome = ucfirst($request['modelo']);

        // Encontre a Marca relacionada ao Modelo
        $marca = $modelo->marca;
        // Atualize o nome da Marca
        $marca->nome = ucfirst($request['marca']);

        // Salve os dados
        $modelo->save();
        $marca->save();

        return redirect()->route('marcas-modelos')->with('success', 'Marca e modelo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Busca o modelo pelo ID e garante que ele existe
        $modelo = Modelo::findOrFail($id);

        // Exclui apenas o modelo
        $modelo->delete();

        return redirect()->route('marcas-modelos')->with('success', 'Marca e modelo excluído com sucesso.');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $modelo = Modelo::withTrashed()->findOrFail($id);

        // Restaura o modelo
        $modelo->restore();

        return redirect()->route('marcas-modelos')->with('success', 'Marca e modelo restaurado com sucesso.');
    }
}
