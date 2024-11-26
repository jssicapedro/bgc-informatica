<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Servico;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $dispositivos = Categoria::all();
        /* $estimativas = Servico::all(); */

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
                $total = ($servico->estimativa/60) * $servico->custo;
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
}
