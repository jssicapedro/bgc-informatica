<?php

namespace App\Livewire\Reparacao;

use App\Models\Servico;
use App\Models\Tecnico;
use Livewire\Attributes\On;
use Livewire\Component;

class Servicos extends Component
{

    public $show = false;
    public $servicos;
    public $tecnicos;

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
    public function render()
    {
        return view('livewire.reparacao.servico');
    }
}
