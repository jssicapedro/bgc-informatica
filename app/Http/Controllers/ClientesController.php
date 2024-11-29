<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\ClienteRequest;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    use SoftDeletes;


    public function index()
    {
        $clientes = Cliente::paginate(5);
        return view('admin.cliente.cliente', compact('clientes'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cliente.cliente_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request)
    {
        Cliente::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telemovel' => str_replace(' ', '', $request->input('telemovel')),
            'nif' => str_replace(' ', '', $request->input('nif')),
            'morada' => $request->morada,
        ]);

        return redirect()->route('clientes')->with('success', 'Clientes created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('admin.cliente.cliente_view', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('admin.cliente.cliente_edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequest $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->update([
            'nome' => ucfirst(strtolower($request->input('nome'))),
            'email' => $request->email,
            'telemovel' => str_replace(' ', '', $request->input('telemovel')),
            'nif' => str_replace(' ', '', $request->input('nif')),
            'morada' => $request->morada,
        ]);

        return redirect()->route('clientes')->with('success', 'Cliente updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
