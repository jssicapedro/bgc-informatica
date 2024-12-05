<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Rma;
use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $dispositivos = Categoria::all();
        /* $estimativas = Servicos::all(); */

        // Inicializa a variável total
        $total = 0; // Garantir que a variável sempre exista
        $availableServicos = []; // Lista de serviços para cada categoria

        // Verifica se há um dispositivo e serviço selecionado
        if ($request->has('dispositivo') && $request->has('servico')) {
            $dispositivo_id = $request->input('dispositivo');
            $servico_id = $request->input('servico');

            // Recupera a categoria (dispositivo) selecionada
            $dispositivo = Categoria::find($dispositivo_id);

            // Recupera os serviços que pertencem à categoria selecionada
            $availableServicos = Servico::where('categoria_id', $dispositivo_id)->get();

            // Recupera o serviço selecionado, e verifica se ele pertence à categoria do dispositivo
            $servico = Servico::where('categoria_id', $dispositivo_id)
                ->where('id', $servico_id)
                ->first();

            if ($dispositivo && $servico) {
                // Calcula o total com base no serviço selecionado
                $total = ($servico->estimativa / 60) * $servico->custo;
            }
        }

        // Retorna a view com os dispositivos, serviços e o total calculado
        return view('client.index', compact('dispositivos', 'total', 'availableServicos'));
    }

    public function getServicosPorCategoria($categoria_id)
    {
        // Recupera os serviços para a categoria selecionada
        $servicos = Servico::where('categoria_id', $categoria_id)->get();

        // Retorna os serviços como JSON
        return response()->json($servicos);
    }

    public function consultarRMA(Request $request)
    {
        $rma = null;
        $mensagem = null;

        // Lista de serviços disponíveis, que vem de LISTA_SERVICOS
        $availableServicos = Servico::LISTA_SERVICOS;

        // Se o formulário for enviado, buscamos o RMA baseado nos dados fornecidos
        if ($request->isMethod('POST')) {
            $request->validate([
                'nome' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'servico' => 'required|in:' . implode(',', Servico::LISTA_SERVICOS),
            ]);

            // Realizamos a consulta com o JOIN adequado
            $rma = Rma::with(['equipamento.modelo.marca'])
                ->whereHas('equipamento.cliente', function ($query) use ($request) {
                    $query->where('nome', $request->input('nome'))
                        ->where('email', $request->input('email'));
                })
                ->where('servico', $request->input('servico'))
                ->first();

            // Se o RMA for encontrado, definimos a mensagem apropriada
            if ($rma) {
                $mensagem = $rma->estado === 'completo'
                    ? 'Já pode vir buscar o seu equipamento'
                    : 'O seu equipamento ainda está em manutenção';
            } else {
                $mensagem = 'RMA não encontrado. Verifique os dados informados.';
            }
        }

        // Retorna a view com as variáveis necessárias
        /* return view('client.consultar_rma', compact('rma', 'mensagem', 'availableServicos')); */


        return view('client.consultar_rma', [
            'rma' => $rma,
            'mensagem' => $mensagem,
            'availableServicos' => $availableServicos,
            'oldInput' => session()->getOldInput(),
        ]);
    }

    public function processarConsultaRMA(Request $request)
    {
        $rma = null;
        $mensagem = null;
        $availableServicos = Servico::LISTA_SERVICOS; // Lista de serviços disponíveis

        // Verifica se o formulário foi enviado via POST
        if ($request->isMethod('POST')) {
            // Validação dos dados do formulário
            $request->validate([
                'nome' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'servico' => 'required|in:' . implode(',', Servico::LISTA_SERVICOS), // Verifica se o serviço está na lista
            ]);

            // Log para depuração (verificando os dados recebidos)
            Log::info('Processando RMA com os dados:', [
                'nome' => $request->input('nome'),
                'email' => $request->input('email'),
                'servico' => $request->input('servico')
            ]);

            // Consulta o RMA baseado no nome, email e serviço
            try {
                $rma = Rma::with([
                    'equipamento.modelo.marca',  // Relacionamento com o modelo e marca do equipamento
                    'equipamento.cliente',  // Relacionamento com os dados do cliente
                    'rmaServico.servico' // Relacionamento com a tabela rma_servico
                ])
                    ->whereHas('equipamento.cliente', function ($query) use ($request) {
                        // Verifica o nome e email do cliente
                        $query->where('nome', $request->input('nome'))
                            ->where('email', $request->input('email'));
                    })
                    ->whereHas('rmaServico', function ($query) use ($request) {
                        // Verifica se o serviço está presente na tabela rma_servico
                        $query->whereHas('servico', function ($query) use ($request) {
                            $query->where('nome', $request->input('servico'));
                        });
                    })
                    ->first();
            } catch (\Exception $e) {
                Log::error('Erro ao buscar RMA:', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Ocorreu um erro ao processar a consulta.');
            }

            // Verifica se o RMA foi encontrado
            if ($rma) {
                // Se o RMA está "completo", mostra a mensagem correspondente
                $mensagem = $rma->estado === 'completo'
                    ? 'Já pode vir buscar o seu equipamento.'
                    : 'O seu equipamento ainda está em manutenção.';
            } else {
                // Se o RMA não foi encontrado
                $mensagem = 'RMA não encontrado. Verifique os dados informados.';
            }
        }
        // Retorna a view com os dados necessários
        return view('client.consultar_rma', compact('rma', 'mensagem', 'availableServicos'));
    }
}