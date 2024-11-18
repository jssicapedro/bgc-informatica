<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
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
    public function store(Request $request)
    {
        Cliente::create([
            'name' => $request->name,
            'grandPrixName' => $request->grandPrixName,
            'comunName' => $request->comunName,
            'country' => $request->country,
            'firstGrandPrix' => $request->firstGrandPrix,
            'distance' => $request->distance,
            'length' => $request->length,
            'laps' => $request->laps,
            'info' => $request->info,
            'imgCircuts' => $imgCircutsName ?? null,
            'imgBanner' => $imgBannerName ?? null,
            'imgAbout' => $imgAboutName ?? null,
        ]);

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
