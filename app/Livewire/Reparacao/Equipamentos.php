<?php

namespace App\Livewire\Reparacao;

use App\Models\Equipamento;
use Livewire\Component;

use App\Models\Equipamento as EquipamentoModel;

class Equipamentos extends Component
{

    public $equipamento;

    public function onChange()
    {
        $equipamento = Equipamento::with('categoria')->find($this->equipamento);

        $this->dispatch('servicos-refresh', $equipamento->categoria->id);
    }

    public function render()
    {
        $equipamentos = EquipamentoModel::get();

        return view('livewire.reparacao.equipamento')
            ->with('equipamentos', $equipamentos);
    }
}
