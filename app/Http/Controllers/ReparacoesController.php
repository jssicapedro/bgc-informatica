<?php

namespace App\Http\Controllers;

use App\Http\Requests\RmaRequest;
use App\Models\Cliente;
use App\Models\Encomenda;
use App\Models\Equipamento;
use App\Models\Rma;
use App\Models\RmaServico;
use App\Models\Servico;
use App\Models\Tecnico;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class ReparacoesController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reparacoes = Rma::with('equipamento', 'equipamento.modelo', 'servicos', 'tecnicos')->get();
        $tecnicos = Tecnico::all();

        return view('admin.rma.reparacoes')
            ->with([
                'reparacoes' => $reparacoes,
                'tecnicos' => $tecnicos
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipamentos = Equipamento::get();
        $servicos = Servico::all();
        $tecnicos = Tecnico::all();

        return view('admin.rma.reparacao_new', compact('equipamentos', 'servicos', 'tecnicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RmaRequest $request)
    {
        $rma = Rma::create([
            'equipamento_id' => $request->equipamento_id,
            'descricaoProblema' => $request->descricaoProblema,
            'dataEntrega' => now(),
            'dataChegada' => now(),  // Adicionando o valor para 'dataChegada'
            'horasTrabalho' => 0,
            'estado' => 'em processamento',
        ]);

        // Criar o serviço na tabela 'rma_servico'
        RmaServico::create([
            'rma_id' => $rma->id,
            'servico_id' => $request->servico_id,
            'tecnico_id' => $request->tecnico_id,
        ]);

        return redirect()->route('reparacoes')->with('success', 'RMA created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reparacao = Rma::findOrFail($id);


        return view('admin.rma.reparacao_view', compact('reparacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rma = Rma::findOrFail($id);
        $equipamentos = Equipamento::all();
        $encomendas = Encomenda::all();
        $servicos = Servico::all();
        // Recupera os IDs dos serviços associados ao RMA
        $servicosSelecionados = $rma->servicos->pluck('id')->toArray();

        $tecnicos = Tecnico::all();

        return view('admin.rma.reparacao_edit', compact('rma', 'equipamentos', 'encomendas', 'servicos', 'servicosSelecionados', 'tecnicos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RmaRequest $request, $id)
    {
        // Recuperar o RMA pelo ID
        $rma = Rma::findOrFail($id);

        // Atualizar os dados do RMA usando os dados validados do RmaRequest
        $rma->update([
            'equipamento_id' => $request->input('equipamento_id'),
            'servico_id' => $request->input('servico_id'),
            'tecnico_id' => $request->input('tecnico_id'),
            'descricaoProblema' => $request->input('descricaoProblema'),
            'horasTrabalho' => $request->input('horasTrabalho'),
        ]);

        // O campo totalPagar será atualizado automaticamente, se configurado no evento `saving` do modelo

        // Redirecionar de volta com mensagem de sucesso
        return redirect()->route('rma.index')->with('success', 'RMA atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
