<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Servico;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request){
        $dispositivos = Categoria::all();
        $estimativas = Servico::all();

        // Dispositivo selecionado pelo cliente
        $dispositivoSelecionado = $request->input('dispositivo');

        $total = 0;

        if ($dispositivoSelecionado) {
            // Filtrar serviços baseados no dispositivo selecionado
            $servicos = Servico::where('categoria_id', $dispositivoSelecionado)->get();

            // Cálculo do total
            foreach ($servicos as $servico) {
                $total += ($servico->estimativa * $servico->custo);
            }

            $total += $encomendaCusto ?? 0;
        }
        return view('client.index', compact('dispositivos', 'estimativas'));
        
    }

}
