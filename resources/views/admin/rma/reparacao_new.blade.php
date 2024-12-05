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
        <h1>Criar uma nova reparação</h1>
    </div>
    <form action="{{ route('reparacao.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        <div class="info">
            <!-- Seleção do Técnico Responsável -->
            <div class="email_tel">
                <div class="tel">
                    <label for="tecnico_id" class="form-label">Técnico responsável:</label>
                    <select class="form-control" id="tecnico_id" name="tecnico_id" required>
                        <option value="">Selecione o técnico</option>
                        @foreach($tecnicos as $tecnico)
                        <option value="{{ $tecnico->id }}" {{ old('tecnico_id') == $tecnico->id ? 'selected' : '' }}>
                            {{ $tecnico->id }} - {{ $tecnico->nome }} - {{ $tecnico->especialidade }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Seleção do Equipamento -->
            <div class="row mb-3 mt-3">
                <div class="col-md-12">
                    <label for="equipamento_id" class="form-label">Equipamento:</label>
                    <select class="form-control" id="equipamento_id" name="equipamento_id" required>
                        <option value="">Selecione o equipamento</option>
                        @foreach($equipamentos as $equipamento)
                        <option value="{{ $equipamento->id }}" {{ old('equipamento_id') == $equipamento->id ? 'selected' : '' }}>
                            {{ $equipamento->modelo->marca->nome }}, {{ $equipamento->modelo->nome }} de <strong>{{ $equipamento->cliente->nome }}</strong>
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Seleção do Tipo de Serviço (Checkboxes) -->
            <div class="row mb-3 mt-3">
                <div class="col-md-12">
                    <label for="servico_id" class="form-label">Tipo de Serviço:</label>
                    @foreach($servicos as $servico)
                    <div>
                        <input type="checkbox" name="servico_id[]" value="{{ $servico->id }}" id="servico_{{ $servico->id }}" class="form-check-input">
                        <label for="servico_{{ $servico->id }}">
                            {{ $servico->categoria->nome }} - {{ $servico->nome }} - €{{ number_format($servico->custo, 2, ',', '.') }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Descrição do Problema -->
            <div>
                <label for="descricaoProblema" class="form-label">Descrição do problema:</label>
                <textarea class="form-control" id="descricaoProblema" name="descricaoProblema" required>{{ old('descricaoProblema') }}</textarea>
            </div>

            <input type="hidden" name="estado" value="em processamento">

            <button type="submit" class="btn btn-submit">Criar RMA</button>
        </div>
    </form>
</div>
@endsection