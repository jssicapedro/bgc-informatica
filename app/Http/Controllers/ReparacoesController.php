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
        $reparacoes = Rma::with('equipamento', 'equipamento.modelo', 'servicos', 'tecnicos', 'tecnico_responsavel')->withTrashed()->paginate(5);
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
        // Recupera os dados do formulário
        $servicos = $request->input('servico_id');
        $dataChegada = now();  // Data atual para o campo dataChegada
        $tecnicoId = $request->input('tecnico_id'); // Recupera o técnico selecionado
        

        // Cria o RMA
        $rma = Rma::create([
            'tecnico_id' => $tecnicoId,  // Certifique-se de associar o técnico
            'equipamento_id' => $request->input('equipamento_id'),
            'descricaoProblema' => $request->input('descricaoProblema'),
            'dataChegada' => $dataChegada,  // Preenche com a data atual
            'previsaoEntrega' => $request->input('previsaoEntrega'),
            'estado' => $request->input('estado'),
            'totalPagar' => 0.00,
        ]);


        // Associa os serviços ao RMA com o técnico responsável
        foreach ($servicos as $servicoId) {
            $rma->servicos()->attach($servicoId, ['tecnico_id' => $tecnicoId]);  // Passa o tecnico_id
        }

        return redirect()->route('reparacoes')->with('success', 'RMA created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reparacao = Rma::findOrFail($id);
        $servicos = $reparacao->servicos; // Apenas serviços associados ao RMA

        return view('admin.rma.reparacao_view', compact('reparacao', 'servicos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rma = Rma::findOrFail($id); // Carregar o RMA pelo ID
        $servicos = $rma->servicos; // Apenas serviços associados ao RMA
        $tecnicos = Tecnico::all();
        $equipamentos = Equipamento::all();
        $encomendas = Encomenda::whereDoesntHave('rma')->get();

        return view('admin.rma.reparacao_edit', compact('rma', 'servicos', 'tecnicos', 'equipamentos', 'encomendas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RmaRequest $request, $id)
    {
        $validated = $request->validated();

        $rma = Rma::findOrFail($id);

        // Atualizar os campos básicos do RMA
        $rma->equipamento_id = $validated['equipamento_id'];
        $rma->tecnico_id = $validated['tecnico_id'];
        $rma->descricaoProblema = $validated['descricaoProblema'];
        $rma->estado = $validated['estado'];

        // Atualizar data de entrega conforme o estado
        $rma->dataEntrega = $validated['estado'] === 'completo' ? now() : null;

        // Atualizar o ID da encomenda, se fornecido
        if (isset($validated['encomenda_id']) && $validated['encomenda_id']) {
            $rma->encomenda_id = $validated['encomenda_id'];
        }

        // Sincronizar serviços e calcular total de horas e custo dos serviços
        $totalHoras = 0;
        $totalCustoServicos = 0;

        if (isset($validated['servico_id'])) {
            foreach ($validated['servico_id'] as $servicoId) {
                $horas = $validated['horas_trabalho'][$servicoId] ?? 0; // Horas enviadas no request
                $servico = Servico::find($servicoId);

                if ($servico) {
                    $rma->servicos()->syncWithoutDetaching([$servicoId => ['horas' => $horas]]);
                    $totalHoras += $horas;
                    $totalCustoServicos += $horas * $servico->custo;
                }
            }
        }

        $rma->horasTrabalho = $totalHoras;
        $rma->custoServicos = $totalCustoServicos;
        $rma->totalPagar = (float) $totalCustoServicos;

        if (isset($rma->encomenda_id)) {
            $encomenda = Encomenda::find($rma->encomenda_id);
            if ($encomenda) {
                $rma->totalPagar += (float) $encomenda->custo;
            }
        }
        

        $rma->save();

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

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        // Recupera o técnico excluído (soft deleted)
        $rma = Rma::withTrashed()->findOrFail($id);

        // Restaura o técnico
        $rma->restore();

        return redirect()->route('reparacoes')->with('success', 'Reparação restaurada com sucesso.');
    }
}
