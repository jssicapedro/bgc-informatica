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
@endpush

@section('main')
<div class="container">
    <div class="pag_new pag_list">
        <a href="{{ route('reparacoes') }}">Voltar à listagem</a>
        <h1>Editar a reparação</h1>
    </div>
    <form action="{{ route('reparacao.update', $rma->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Equipamento -->
        <div class="mb-3">
            <label for="equipamento_id" class="form-label">Equipamento</label>
            <select name="equipamento_id" id="equipamento_id" class="form-control">
                @foreach($equipamentos as $equipamento)
                <option value="{{ $equipamento->id }}"
                    {{ $rma->equipamento_id == $equipamento->id ? 'selected' : '' }}>
                    {{ $equipamento->modelo->marca->nome }}, {{ $equipamento->modelo->nome }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Encomenda -->
        <div class="mb-3">
            <label for="encomenda_id" class="form-label">Encomenda</label>
            <select name="encomenda_id" id="encomenda_id" class="form-control" multiple>
                @foreach($encomendas as $encomenda)
                <option value="{{ $encomenda->id }}"
                    {{ $rma->encomenda_id == $encomenda->id ? 'selected' : '' }}>
                    {{ $encomenda->descricao }}, {{ $encomenda->custo }}€
                </option>
                @endforeach
            </select>
        </div>

        <!-- Data de Chegada -->
        <div class="mb-3">
            <label for="dataChegada" class="form-label">Data de Chegada</label>
            <input type="date" name="dataChegada" id="dataChegada" class="form-control"
                value="{{ $rma->dataChegada }}">
        </div>

        <!-- Data de Entrega -->
        <div class="mb-3">
            <label for="dataEntrega" class="form-label">Data de Entrega</label>
            <input type="date" name="dataEntrega" id="dataEntrega" class="form-control"
                value="{{ $rma->dataEntrega }}" disabled>
        </div>

        <!-- Checkbox para indicar se foi entregue -->
        <div class="form-check mb-3">
            <input type="checkbox" name="foi_entregue" id="foi_entregue" class="form-check-input"
                {{ $rma->dataEntrega ? 'checked' : '' }}>
            <label for="foi_entregue" class="form-check-label">RMA Entregue</label>
        </div>

        <!-- Horas Trabalhadas -->
        <div class="mb-3">
            <label for="horasTrabalho" class="form-label">Horas de Trabalho</label>
            <input type="number" name="horasTrabalho" id="horasTrabalho" class="form-control"
                value="{{ $rma->horasTrabalho }}">
        </div>

        <!-- Descrição do Problema -->
        <div class="mb-3">
            <label for="descricaoProblema" class="form-label">Descrição do Problema</label>
            <textarea name="descricaoProblema" id="descricaoProblema" class="form-control" rows="4">
            {{ $rma->descricaoProblema }}
            </textarea>
        </div>

        <!-- Total a Pagar -->
        <div class="mb-3">
            <label for="totalPagar" class="form-label">Total a Pagar</label>
            <input type="text" name="totalPagar" id="totalPagar" class="form-control"
                value="{{ $rma->totalPagar }}">
        </div>

        <!-- Botão de Submissão -->
        <button type="submit" class="btn btn-submit">Editar RMA</button>
    </form>
</div>
@endsection