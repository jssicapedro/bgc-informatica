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
        $reparacoes = Rma::with('equipamento', 'equipamento.modelo', 'servicos', 'tecnicos', 'tecnico_responsavel')->paginate(5);
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
        $servicos = json_decode($request->input('servicos_data'), JSON_PRETTY_PRINT);
        $custoServicos = (float) str_replace('€ ', '', $request->input('custoServicos'));

        /* dd($request->toArray()); */

        $rma = Rma::create([
            'tecnico_id' => $request->input('tecnico_id'),
            'equipamento_id' => $request->equipamento_id,
            'descricaoProblema' => $request->descricaoProblema,
            'dataEntrega' => now(),
            'dataChegada' => now(),  // Adicionando o valor para 'dataChegada'
            'horasTrabalho' => $request->input('servicos_horas'),
            'custoServicos' => $custoServicos,
            'estado' => 'em processamento',
        ]);

        foreach ($servicos as $servico_id => $servico) {
            $rma->servicos()->attach($servico_id, [
                'tecnico_id' => $servico['tecnico'],
                'horas' => $servico['horas']
            ]);
        }

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
        $rma = Rma::with('servicos', 'tecnico_responsavel')->findOrFail($id);

        $equipamentos = Equipamento::all();
        $encomendas = Encomenda::all();
        $servicos = Servico::all();
        // Recupera os IDs dos serviços associados ao RMA
        $servicosSelecionados = $rma->servicos->pluck('id')->toArray();

        $tecnicos = Tecnico::all();

        $servicos_custo_total = 0;

        foreach ($rma->servicos as $servico) {
            $servicos_custo_total += $servico->custo;
        }



        return view('admin.rma.reparacao_edit', compact('rma', 'equipamentos', 'encomendas', 'servicos', 'servicosSelecionados', 'tecnicos', 'servicos_custo_total'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RmaRequest $request, $id)
    {
        // Recuperar o RMA pelo ID
        $rma = Rma::findOrFail($id);

        dd($rma->toArray());

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
        return redirect()->route('reparacoes')->with('success', 'RMA atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Rma::findOrFail($id)->delete();

        return redirect()->route('reparacoes')->with('success', 'RMA deleted successfully.');
    }
}
