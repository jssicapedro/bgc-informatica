<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();

        return view('admin.categoria.categoria', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categoria.categoria_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        Categoria::create([
            'nome' => $request->nome,
        ]);

        return redirect()->route('categorias')->with('success', 'Categoria created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // visto que contem apenas um campo, não se viu necessidade de criar o show
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('admin.categoria.categoria_edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, $id)
    {
        // Atualizar a categoria
        $categoria = Categoria::findOrFail($id);
        $categoria->nome = ucfirst(strtolower($request->input('nome')));
        $categoria->save();

        // Redirecionar com mensagem de sucesso
        return redirect()->route('categorias')->with('success', 'Categoria atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
