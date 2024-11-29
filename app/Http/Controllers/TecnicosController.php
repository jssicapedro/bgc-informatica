<?php

namespace App\Http\Controllers;

use App\Http\Requests\TecnicoRequest;
use App\Models\Categoria;
use App\Models\Servico;
use App\Models\Tecnico;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TecnicosController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tecnicos = Tecnico::withTrashed()->paginate(5);
        return view('admin.tecnicos.tecnicos', compact('tecnicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tecnicos.tecnico_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TecnicoRequest $request)
    {
        Tecnico::create([
            'nome' => ucwords(strtolower($request->input('nome'))),
            'email' => $request->email,
            'telemovel' => str_replace(' ', '', $request->input('telemovel')),
            'especialidade' => $request->especialidade,
            'password' => $request->password,
        ]);

        return redirect()->route('tecnicos')->with('success', 'Tecnicos created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tecnico = Tecnico::findOrFail($id);

        return view('admin.tecnicos.tecnico_view', compact('tecnico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tecnico = Tecnico::findOrFail($id);

        return view('admin.tecnicos.tecnico_edit', compact('tecnico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TecnicoRequest $request, $id)
    {
        $tecnico = Tecnico::findOrFail($id);

        // Se o campo de senha estiver preenchido, faça o hash da nova senha
        $password = $request->input('password') ? Hash::make($request->input('password')) : $tecnico->password;

        $tecnico->update([
            'nome' => ucwords(strtolower($request->input('nome'))),
            'email' => $request->input('email'),
            'telemovel' => str_replace(' ', '', $request->input('telemovel')),
            'especialidade' => $request->input('especialidade'),
            'password' => $password,
        ]);

        return redirect()->route('tecnicos')->with('success', 'Tecnico updated successfully.');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encontre o técnico ou falhe com 404 se não encontrado
        $tecnico = Tecnico::findOrFail($id);
        
        // Soft delete do técnico (não remove fisicamente do banco, apenas marca como excluído)
        $tecnico->delete();
        
        return redirect()->route('tecnicos')->with('success', 'Técnico excluído com sucesso.');
    }
    
    /**
    * Restore the specified resource from storage.
    */
   public function restore($id)
   {
       // Recupera o técnico excluído (soft deleted)
       $tecnico = Tecnico::withTrashed()->findOrFail($id);

       // Restaura o técnico
       $tecnico->restore();

       return redirect()->route('tecnicos')->with('success', 'Técnico restaurado com sucesso.');
   }
}
