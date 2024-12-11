@extends('layout.layout')

@section('title', 'BGCInformatica')

<!-- css -->
@push('links')
<link rel="stylesheet" href="{{ asset('css/tabel_pag.css') }}">
<link rel="stylesheet" href="{{ asset('css/formulario_pag.css') }}">
<link rel="stylesheet" href="{{ asset('css/pag_view.css') }}">
@endpush

<!-- js -->
@push('scripts')
<script>
    // Função para alternar a visibilidade de um elemento
    function toggleVisibility(elementId, condition) {
        document.getElementById(elementId).style.display = condition ? 'block' : 'none';
    }

    // Exibe/oculta o campo "dataEntrega" com base no estado
    document.getElementById('estado').addEventListener('change', function() {
        toggleVisibility('dataEntregaContainer', this.value === 'completo');
    });

    // Exibe/oculta o campo "encomendaDetails" com base na escolha de "encomenda"
    document.querySelectorAll('input[name="encomenda"]').forEach(input => {
        input.addEventListener('change', function() {
            toggleVisibility('encomendaDetails', this.value === 'sim');
        });
    });
</script>
@endpush

@section('main')
<div class="container">
    <div class="pag_new pag_list">
        <a href="{{ route('reparacoes') }}">Voltar à listagem</a>
        <h1>Editar a reparação</h1>
    </div>
    <form action=" {{ route('reparacao.update', $rma->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Aqui o método PATCH é necessário para edição -->
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <div class="info">
            <h2>Sobre o equipamento</h2>
            <!-- Equipamento -->
            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <label for="equipamento_id" class="form-label">Equipamento:</label>
                    <input type="text" value="{{ $rma->equipamento->id }} - {{ $rma->equipamento->modelo->marca->nome }}, {{ $rma->equipamento->modelo->nome }}" class="form-control mt-1" readonly>
                    <input type="hidden" name="equipamento_id" value="{{ $rma->equipamento->id }}">
                </div>
                <div class="col-md-6">
                    <label for="equipamento_id" class="form-label">Cliente:</label>
                    <input type="text" value="{{ $rma->equipamento->cliente->id }} - {{ $rma->equipamento->cliente->nome }}" class="form-control mt-1" readonly>
                    <input type="hidden" name="equipamento_id" value="{{ $rma->equipamento->id }}">
                </div>
            </div>
            <hr>
            <h2>RMA</h2>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado do RMA:</label>
                <select class="form-control is-invalid" id="estado" name="estado" required>
                    <option value="">Selecione um estado de RMA</option>
                    <option value="em reparação" {{ old('estado', $rma->estado ?? '') == 'em reparação' ? 'selected' : '' }}>Em reparação</option>
                    <option value="completo" {{ old('estado', $rma->estado ?? '') == 'completo' ? 'selected' : '' }}>Completo</option>
                </select>
            </div>
            <div class="mb-3" id="dataEntregaContainer" style="display: {{ $rma->estado == 'completo' ? 'block' : 'none' }};">
                <label class="form-label">O cliente veio buscar o equipamento hoje?</label>
                <div>
                    <input type="radio" id="entregaSim" name="dataEntrega" value="{{ now() }}" {{ $rma->dataEntrega ? 'checked' : '' }}>
                    <label for="entregaSim">Sim</label>
                </div>
                <div>
                    <input type="radio" id="entregaNao" name="dataEntrega" value="" {{ !$rma->dataEntrega ? 'checked' : '' }}>
                    <label for="entregaNao">Não</label>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <label for="tecnico_id" class="form-label">Técnico responsável:</label>
                    <input type="text" value="{{ $rma->tecnico_responsavel->id }} - {{ $rma->tecnico_responsavel->nome }}" class="form-control mt-1" readonly>
                    <input type="hidden" name="tecnico_id" value="{{ $rma->tecnico_responsavel->id }}">
                </div>
                <div class="col-md-6">
                    <label for="descricaoProblema" class="form-label">Descrição do problema:</label>
                    <input type="text" class="form-control" value="{{ $rma->descricaoProblema }}" id="descricaoProblema" name="descricaoProblema" required readonly>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <label for="servico_id" class="form-label">Tipo de Serviço:</label>
                
                @foreach($servicos as $servico)
                <div class="col">
                    <input type="checkbox" name="servico_id[]" value="{{ $servico->id }}" id="servico_{{ $servico->id }}" class="form-check-input"
                        @if(in_array($servico->id, $rma->servicos->pluck('id')->toArray())) checked @endif>
                    <label for="servico_{{ $servico->id }}">
                        {{ $servico->categoria->nome }} - {{ $servico->nome }}
                    </label>
                    <br>
                    <small>Número de horas do serviço</small>
                    <input type="number" name="horas_trabalho[{{ $servico->id }}]" placeholder="Horas de trabalho" class="form-control mt-1"
                        value="{{ old('horas_trabalho.' . $servico->id, $rma->servicos->where('id', $servico->id)->first()->pivot->horas ?? '') }}">
                </div>
                @endforeach
            </div>
            <hr>
            <h2>Encomenda</h2>
            @if($rma->encomenda_id)
            <!-- Se houver encomenda associada -->
            <div id="encomendaDetails" class="row mb-3 mt-3">
                <div class="col-md-6">
                    <label for="encomenda" class="form-label">Encomenda Associada:</label>
                    <input type="text" class="form-control" value="Encomenda #{{ $rma->encomenda->id }} - {{$rma->encomenda->descricao}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="encomenda" class="form-label">Custo:</label>
                    <input type="text" class="form-control" value="€{{ number_format($rma->encomenda->custo, 2, ',', '.') }}" readonly>
                </div>
                <!-- Campo escondido para encomenda já associada -->
                <input type="hidden" name="encomenda_id" value="{{ $rma->encomenda_id }}">
            </div>
            @else
            <!-- Se não houver encomenda associada, permitir a seleção de uma encomenda -->
            <div class="mb-3">
                <label class="form-label">Há alguma encomenda associada a este RMA?</label>
                <div>
                    <input type="radio" id="encomendaSim" name="encomenda" value="sim" {{ old('encomenda') == 'sim' ? 'checked' : '' }}>
                    <label for="encomendaSim">Sim</label>
                </div>
                <div>
                    <input type="radio" id="encomendaNao" name="encomenda" checked value="nao" {{ old('encomenda') == 'nao' ? 'checked' : '' }}>
                    <label for="encomendaNao">Não</label>
                </div>
            </div>
            <div id="encomendaDetails" style="display: {{ old('encomenda') == 'sim' ? 'block' : 'none' }};">
                <label for="encomenda" class="form-label">Selecione uma Encomenda:</label>
                <select class="form-control" id="encomenda" name="encomenda_id">
                    <option value="">Selecione uma encomenda</option>
                    @foreach($encomendas as $encomenda)
                    <option value="{{ $encomenda->id }}" {{ old('encomenda_id') == $encomenda->id ? 'selected' : '' }}>
                        Encomenda #{{ $encomenda->id }} - €{{ number_format($encomenda->custo, 2, ',', '.') }}
                    </option>
                    @endforeach
                </select>
            </div>
            @endif
        </div>
        <button type="submit" class="btn btn-submit">Edit Rma</button>
    </form>
</div>
@endsection