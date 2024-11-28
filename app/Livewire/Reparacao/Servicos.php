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

        $this->servicos_selecionados[$id]['custo'] = ($this->servicos_selecionados[$id]['tempo']) ? "€ ". number_format($this->servicos->find($id)->custo * $this->servicos_selecionados[$id]['tempo'], 2, ',', '.') : 0;

        foreach($this->servicos_selecionados as $selecionado)
        {
            $total += ($this->servicos_selecionados[$id]['tempo']) ? (float) str_replace('€ ', '', $selecionado['custo']) : 0;
            $horas += ($this->servicos_selecionados[$id]['tempo']) ? $selecionado['tempo'] : 0;
        }

        $this->total = '€ '. number_format($total, 2, ',', '.');
        $this->horas = $horas;

        dd($this->servicos_selecionados);
    }
    public function render()
    {
        return view('livewire.reparacao.servico');
    }
}
