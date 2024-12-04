@extends('layout.layout')

@section('title', 'BGCInformatica')

<!-- css -->
@push('links')
<link rel="stylesheet" href="{{ asset('css/tabel_pag.css') }}">
<link rel="stylesheet" href="{{ asset('css/pag_view.css') }}">
@endpush

<!-- js -->
@push('scripts')
@endpush

@section('main')
<div class="container">
    <div class="pag_new pag_list">
        <a href="{{ route('reparacoes') }}">Voltar à listagem</a>
        <h1>{{$reparacao->id .' - '. $reparacao->equipamento->modelo->marca->nome .', '. $reparacao->equipamento->modelo->nome .', '. $reparacao->equipamento->cliente->nome}}</h1>
    </div>
    <div class="info">
        <h2>Cliente</h2>
        <div class="email_tel">
            <div class="tel">
                <label>Cliente</label>
                <input type="text" class="form-control" value="{{ $reparacao->equipamento->cliente->nome }}" readonly>
            </div>
            <div class="tel">
                <label>NIF</label>
                <input type="text" class="form-control" value="{{ $reparacao->equipamento->cliente->nif }}" readonly>
            </div>
        </div>
        <hr>
        <h2>Informações do equipamento</h2>
        <div class="email_tel">
            <div class="email">
                <label>Equipamento</label>
                <input type="text" class="form-control" value="{{ $reparacao->equipamento->categoria->id }} - {{ $reparacao->equipamento->categoria->nome }}" readonly>
            </div>
            <div class="tel">
                <label>Marca e modelo</label>
                <input type="text" class="form-control" value="{{ $reparacao->equipamento->modelo->marca->nome }} - {{ $reparacao->equipamento->modelo->nome }}" readonly>
            </div>
        </div>
        <hr>
        <h2>Informações do Rma</h2>
        <div class="email_tel">
            <div class="email">
                <label>Tecnico responsável</label>
                <input type="text" class="form-control" value="{{ $reparacao->tecnico_responsavel->id }} - {{ $reparacao->tecnico_responsavel->nome }}" readonly>
            </div>
            <div class="email">
                <label>Descrição do problema</label>
                <input type="text" class="form-control" value="{{ $reparacao->descricaoProblema }}" readonly>
            </div>
        </div>
        <h3>Datas</h3>
        <div class="email_tel">
            <div class="email">
                <label>Data de chegada á loja</label>
                <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($reparacao->dataChegada)->format('d/m/Y') }}" readonly>
            </div>
            <div class="email">
                <label>Data de previsão da resolução</label>
                @if(!($reparacao->previsaoEntrega))
                <input type="text" class="form-control" value="Sem data de previsão" readonly>
            </div>
            @else
            <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($reparacao->previsaoEntrega)->format('d/m/Y') }}" readonly>
        </div>
        <div class="email">
            <label>Data de entrega ao cliente</label>
            @if(!($reparacao->dataEntrega))
            <input type="text" class="form-control" value="O cliente ainda não veio buscar o equipamento" readonly>
            @else
            <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($reparacao->dataEntrega)->format('d/m/Y') }}" readonly>
            @endif
        </div>
        @endif
    </div>
    <hr>
    <h2>Serviços prestados</h2>

    @if($reparacao->horasTrabalho > 0)
    <div class="email_tel">
        @foreach($servicos as $servico)
        <div class="email">
            <label for="servico_{{ $servico->id }}">
                {{ $servico->categoria->nome }} - {{ $servico->nome }} - {{ $servico->custo . '€/h' }}
            </label>
            <input type="text" name="horas_trabalho[{{ $servico->id }}]" placeholder="Horas de trabalho" class="form-control mt-1"
                value="{{ old('horas_trabalho.' . $servico->id, $reparacao->servicos->where('id', $servico->id)->first()->pivot->horas ?? '') }}h" readonly>
            <label for="">Total a pagar por {{ $servico->nome }}</label>
            <input type="text"
                value="€{{ number_format(($reparacao->servicos->where('id', $servico->id)->first()->pivot->horas ?? 0) * $servico->custo, 2, ',', '.') }}"
                class="form-control mt-1"
                readonly>
        </div>
        @endforeach
    </div>
    <h4>Total:</h4>
    <div class="email">
        <input type="text" class="form-control" value="€{{ $reparacao->custoServicos }}" readonly>
    </div>
    @else
    <p>Este rma ainda não foi iniciado</p>
    @endif

    <hr>
    <h2>Encomendas</h2>
    <div class="email_tel">
        @if ($reparacao->encomenda)
        <div class="email">
            <label>Encomendas associada</label>
            <input type="text" class="form-control" value="{{ $reparacao->encomenda->descricao }}" readonly>
        </div>
        <div class="email">
            <label>Custo da encomenda</label>
            <input type="text" class="form-control" value="€{{ $reparacao->encomenda->custo }}" readonly>
        </div>
        @else
        <p>Sem encomendas previstas.</p>
        @endif
    </div>
    <hr>
    <h2>Total a pagar pelo RMA</h2>
    <div class="email_tel">
        <div class="email">
            <label>Total a pagar</label>
            @if ($reparacao->estado == "completo")
            <input type="text" class="form-control" value="€{{ $reparacao->totalPagar }}" readonly>
            @else
            <p>Este rma ainda não foi finalizado.</p>
            @endif
        </div>
    </div>

    @if ($reparacao->estado == "completo")
    <div class="text-center mt-4">
        <button class="btn btn-primary" onclick="window.print()">Imprimir Fatura</button>
    </div>
    @endif
</div>
@endsection