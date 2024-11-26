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
    <hr>
    <div class="info">
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
            <div class="tel">
                <label>Cliente</label>
                <input type="text" class="form-control" value="{{ $reparacao->equipamento->cliente->nome }}" readonly>
            </div>
        </div>
        <hr>
        <h2>Informações do problema</h2>
        <div class="email_tel">
            <div class="email">
                <label>Descrição do problema</label>
                <input type="text" class="form-control" value="{{ $reparacao->descricaoProblema }}" readonly>
            </div>
        </div>
        <hr>
        <h2>Informações do rma</h2>
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
    <h2>Encomendas</h2>
    <div class="email_tel">
        <div class="email">
            <label>Encomendas previstas</label>
            @if ($reparacao->encomenda)
            <input type="text" class="form-control" value="{{ $reparacao->encomenda->descricao }}" readonly>
            <input type="text" class="form-control" value="{{ $reparacao->encomenda->custo }}€" readonly>
            @else
            <p>Sem encomendas previstas.</p>
            @endif
        </div>
    </div>
    <hr>
    <h2>Custos</h2>
    <div class="email_tel">
        <div class="email">
            <label>Total de horas de trabalho</label>
            @if ($reparacao->horasTrabalho)
            <input type="text" class="form-control" value="{{ $reparacao->horasTrabalho }}" readonly>
            @else
            <p>Este rma ainda não foi iniciado.</p>
            @endif
        </div>
        @if ($reparacao->estado == 'completo')
        <div class="email">
            <label>Total a pagar</label>
            @if ($reparacao->totalPagar)
            <input type="text" class="form-control" value="{{ $reparacao->totalPagar }}€" readonly>
            @else
            <p>Este rma ainda não foi finalizado.</p>
            @endif
        @endif
        </div>
    </div>
    <h2></h2>
</div>
</div>
@endsection