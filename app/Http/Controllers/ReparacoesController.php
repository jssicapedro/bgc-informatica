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
            'estado' => 'em processamento',
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


        return view('admin.rma.reparacao_view', compact('reparacao'));
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

        return view('admin.rma.reparacao_edit', compact('rma', 'servicos', 'tecnicos', 'equipamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RmaRequest $request, $id)
    {
        $validated = $request->validated();

        $rma = Rma::findOrFail($id);
        $rma->equipamento_id = $validated['equipamento_id'];
        $rma->tecnico_id = $validated['tecnico_id'];
        $rma->descricaoProblema = $validated['descricaoProblema'];
        $rma->estado = $validated['estado'];

        // Define a data de entrega se o estado for "completo" e a opção estiver selecionada
        if ($validated['estado'] === 'completo') {
            $rma->dataEntrega = now(); // Marca a data atual como a data de entrega
        } else {
            $rma->dataEntrega = null; // Reseta a data de entrega se o estado não for "completo"
        }

        $rma->save();

        // Atualiza os serviços relacionados ao RMA
        if (isset($validated['servico_id'])) {
            $rma->servicos()->sync($validated['servico_id']);
        }

        // Redirecionar com mensagem de sucesso
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
