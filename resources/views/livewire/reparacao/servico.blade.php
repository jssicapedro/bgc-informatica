<div>
    @if($show)
        <section class="rma-servicos container-fluid mt-3" wire:transition>
            <header class="mt-2 pt-1 pb-1 pl-1 pr-1">
                <h4>Serviços</h4>
                <hr />
            </header>
            <div class="row mt-2 mb-2">
                @foreach($servicos as $servico)
                    <div class="col-md-3 mt-2">
                        <label for="equipamento_id" class="form-label">{{ $servico->nome }}</label>
                    </div>
                    <div class="col-md-3 mt-2">
                        <select class="form-control" wire:model="servicos_selecionados.{{ $servico->id }}.tecnico">
                            <option value="">Selecione o Técnico</option>
                            @foreach($tecnicos as $tecnico)
                                <option value="{{ $tecnico->id }}">{{ $tecnico->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mt-2">
                        <input class="form-control" type="text" placeholder="Tempo de serviço (h)"  wire:change="tempoChangeEvent({{ $servico->id }})" wire:model="servicos_selecionados.{{ $servico->id }}.tempo"/>
                    </div>
                    <div class="col-md-2 mt-2">
                        <input class="form-control" type="text" value="€ {{ $servico->custo }} por hora" placeholder="Custor por serviço (h)"  disabled/>
                    </div>
                    <div class="col-md-2 mt-2">
                        <input class="form-control" type="text" wire:model="servicos_selecionados.{{ $servico->id }}.custo" placeholder="Total por serviço (€)"  disabled/>
                    </div>
                @endforeach
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-md-4 offset-6 mt-2 pt-1 text-end">
                    <strong>Total de horas trabalhadas</strong>
                </div>
                <div class="col-md-2 mt-2">
                    <input class="form-control text-end" type="text" wire:model="horas" placeholder="Total de horas trabalhadas"  disabled />
                </div>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-md-4 offset-6 mt-2 pt-1 text-end">
                    <strong>Total a pagar por serviços</strong>
                </div>
                <div class="col-md-2 mt-2">
                    <input class="form-control text-end" type="text" wire:model="total" placeholder="Total a pagar por serviços (€)"  disabled />
                </div>
            </div>
            <input type="hidden" name="servicos_data" value="{{ json_encode($servicos_selecionados) }}" />
            <input type="hidden" name="servicos_total" value="{{ $total }}" />
            <input type="hidden" name="servicos_horas" value="{{ $horas }}" />
        </section>
    @endif
</div>
