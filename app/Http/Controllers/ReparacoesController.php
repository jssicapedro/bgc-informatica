<?php

namespace App\Http\Controllers;

use App\Models\Reparacoe;
use Illuminate\Http\Request;

class ReparacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reparacoes=Reparacoe::all();
        return view('admin.rma.reparacoes', compact('reparacoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rma.reparacao_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reparacao = Reparacoe::findOrFail($id);

        return view('admin.rma.reparacao_view', compact('reparacao'));
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
