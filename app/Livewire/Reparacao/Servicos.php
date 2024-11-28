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

    public $servicos_selecionados = [];

    #[On('servicos-refresh')]
    public function refreshListaServicos($categoria)
    {
        $this->servicos = Servico::where('categoria_id', $categoria)->get();
        $this->tecnicos = Tecnico::get();

        $this->show = true;
    }

    public function tempoChangeEvent($id): void
    {
        $total = 0;
        $horas = 0;

        $this->servicos_selecionados[$id]['custo'] = ($this->servicos_selecionados[$id]['horas']) ? number_format($this->servicos->find($id)->custo * $this->servicos_selecionados[$id]['horas']) : 0;

        foreach($this->servicos_selecionados as $servico_selecionado)
        {
            $total += ($this->servicos_selecionados[$id]['horas']) ? (float) str_replace('€ ', '', $servico_selecionado['custo']) : 0;
            $horas += ($this->servicos_selecionados[$id]['horas']) ? $servico_selecionado['horas'] : 0;
        }

        $this->total = '€ '. number_format($total, 2, ',', '.');
        $this->horas = $horas;
    }

    public function mount()
    {
        if(!is_null($this->rma)){
            $this->rma = Rma::with('servicos', 'servicos.tecnico')->find($this->rma);
            $this->servicos = $this->rma->servicos;
            $this->servicos_selecionados = $this->rma->servicos->toArray();

            $total = 0;
            $horas = 0;

            foreach($this->servicos_selecionados as $servico_selecionado)
            {
                $this->servicos_selecionados[$servico_selecionado['id']]['horas'] = $servico_selecionado['pivot']['horas'];
                $this->servicos_selecionados[$servico_selecionado['id']]['tecnico'] = $servico_selecionado['pivot']['tecnico_id'];
                $this->servicos_selecionados[$servico_selecionado['id']]['custo'] = '€ '. number_format(($servico_selecionado['custo']*$servico_selecionado['pivot']['horas']), 2, ',', '.');

                $total = (float) str_replace('€ ', '', $this->servicos_selecionados[$servico_selecionado['id']]['custo']);
                $horas += $this->servicos_selecionados[$servico_selecionado['id']]['horas'];
            }

            $this->total = '€ '. number_format($total, 2, ',', '.');
            $this->horas = $horas;

            $this->tecnicos = Tecnico::get();
            $this->show = true;
        }
    }

    public function render()
    {
        return view('livewire.reparacao.servico');
    }
}
