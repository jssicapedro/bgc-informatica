<?php

namespace App\Livewire\Reparacao;

use App\Models\Equipamento;
use App\Models\Rma;
use Livewire\Component;

use App\Models\Equipamento as EquipamentoModel;

class Equipamentos extends Component
{

    public $equipamento;
    public $rma;

    public function onChange()
    {
        $equipamento = Equipamento::with('categoria')->find($this->equipamento);

        $this->dispatch('servicos-refresh', $equipamento->categoria->id);
    }

    public function mount()
    {
        if(!is_null($this->rma)){
            $this->rma = Rma::find($this->rma);
            $this->equipamento = $this->rma->equipamento_id;
        }
    }

    public function render()
    {
        $equipamentos = EquipamentoModel::get();

        return view('livewire.reparacao.equipamento')
            ->with('equipamentos', $equipamentos);
    }
}
