<?php

namespace App\Http\Controllers;

use App\Models\Rma;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarioController extends Controller
{
    public function index()
    {
        $rmas = Rma::with('equipamento.cliente')
            ->select('id', 'dataChegada', 'equipamento_id', 'dataEntrega', 'descricaoProblema')
            ->get();

        $events = [];

        foreach ($rmas as $rma) {
            if ($rma->dataChegada) {
                // Formatar a data de chegada e data de entrega

                $rmaId = $rma->id;
                $startDate = Carbon::parse($rma->dataChegada)->format('Y-m-d');
                $endDate = $rma->dataEntrega ? Carbon::parse($rma->dataEntrega)->format('Y-m-d') : null;

                // Montar o título do evento com nome do cliente, marca e modelo
                $clienteNome = $rma->equipamento->cliente ? $rma->equipamento->cliente->nome : 'Cliente desconhecido';
                $marca = $rma->equipamento->modelo->marca->nome ?? 'Marca desconhecida';
                $modelo = $rma->equipamento->modelo->nome ?? 'Modelo desconhecido';

                // Criar o título com as informações do cliente, marca e modelo
                $title = "{$clienteNome} - {$marca} - {$modelo}";

                // Adicionar o evento ao array, sem agrupar
                $events[] = [
                    'id' => $rmaId,
                    'title' => $title,
                    'start' => $startDate,
                    'end' => $endDate,
                ];
            }
        };

        // Converter o array associativo para um índice numérico para o FullCalendar
        $events = array_values($events);

        /* dd($events); */

        // Retorna a view com os dados
        return view('admin.calendario', compact('events'));
    }
}
