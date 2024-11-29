<?php

namespace App\Http\Controllers;

use App\Models\Rma;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarioController extends Controller
{
    public function index()
    {
        // Recupera as entregas (RMA)
        $entregas = Rma::select('dataChegada', 'dataEntrega')->get();

        // Formatar as entregas para passar para o FullCalendar
        $eventos = $entregas->map(function ($entrega) {
            // Converte as datas para instâncias de Carbon
            $dataChegada = Carbon::parse($entrega->dataChegada); // Mantém a hora
            $dataEntrega = Carbon::parse($entrega->dataEntrega); // Mantém a hora

            // Retorna os dados no formato que o FullCalendar espera
            return [
                'title' => 'Rma',  // Título do evento
                'start' => $dataChegada->toIso8601String(), // Começo da entrega (com hora)
                'end' => $dataEntrega->toIso8601String(), // Fim da entrega (com hora)
            ];
        });

        // Passando os dados formatados para a view
        return view('admin.calendario', ['entregas' => $eventos]);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

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
