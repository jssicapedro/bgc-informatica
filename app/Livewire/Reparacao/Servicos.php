<?php

namespace App\Livewire\Reparacao;

use App\Models\Rma;
use App\Models\Servico;
use App\Models\Tecnico;
use Livewire\Attributes\On;
use Livewire\Component;

class Servicos extends Component
{

    public $show = false;
    public $servicos;
    public $tecnicos;
    public $rma;

    public $total = 0.0;
    public $horas = 0.0;
    private $timer = 0.0;

    public $servicos_selecionados = [];

    /* atualiza os serviços quando o equipamento é alterado */
    #[On('servicos-refresh')]
    public function refreshListaServicos($categoria)
    {
        $this->servicos = Servico::where('categoria_id', $categoria)->get();
        $this->tecnicos = Tecnico::get();

        $this->show = true;
    }

    /* altera os valores das horas */
    public function tempoChangeEvent($index, $id): void
    {
        $servico = Servico::find($id);

        $this->servicos_selecionados[$index]['custo'] = (float)number_format($servico->custo * $this->servicos_selecionados[$index]['horas'], 2, ',', '.');

        $this->horas = array_sum(array_column($this->servicos_selecionados, 'horas'));
        $this->total = "€ ". number_format(array_sum(array_column($this->servicos_selecionados, 'custo')), 2, ',', '.');

        /* dd($this->servicos_selecionados); */
    }


    /* edit - arranja info */
    public function mount(): void
    {

        if(!is_null($this->rma)){
            $this->rma = Rma::with('servicos', 'servicos.tecnico')->find($this->rma);
            $this->servicos = $this->rma->servicos;
            $this->servicos_selecionados = $this->rma->servicos;

            $total = 0;
            $horas = 0;

            foreach($this->servicos_selecionados as $key => $servico_selecionado)
            {
                $this->servicos_selecionados[$key]["horas"] = $servico_selecionado['pivot']['horas'];
                $this->servicos_selecionados[$key]["tecnico"] = $servico_selecionado['pivot']['tecnico_id'];
                $this->servicos_selecionados[$key]["custo"] = $servico_selecionado->custo*$servico_selecionado->pivot->horas;

                $horas += $this->servicos_selecionados[$key]["horas"];
                $total += (float) str_replace('€ ', '', $this->servicos_selecionados[$key]["custo"]);
            }

            $this->servicos_selecionados = $this->servicos_selecionados->toArray();
            $this->horas = $horas;
            $this->total = '€ '. number_format($total, 2, ',', '.');

            $this->tecnicos = Tecnico::get();
            $this->show = true;
        }
    }

    public function render()
    {
        return view('livewire.reparacao.servico');
    }
}
