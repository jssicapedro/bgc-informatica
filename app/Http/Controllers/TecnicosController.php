<?php

namespace App\Http\Controllers;

use App\Http\Requests\TecnicoRequest;
use App\Models\Tecnico;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class TecnicosController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tecnicos=Tecnico::all();
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
            'nome' => $request->nome,
            'email' => $request->email,
            'telemovel' => $request->telemovel,
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
