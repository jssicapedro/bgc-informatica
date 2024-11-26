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
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <div class="info">
            <div class="email_tel">
                <!-- Campo para Equipamento -->
                <div class="email">
                    <label for="equipamento_id" class="form-label">Equipamento a ser reparado:</label>
                    <select class="form-control" id="equipamento_id" name="equipamento_id" required>
                        <option value="">Selecione o equipamento</option>
                        @foreach($equipamentos as $equipamento)
                        <option value="{{ $equipamento->id }}"
                            {{ (old('equipamento_id', $rma->equipamento_id) == $equipamento->id) ? 'selected' : '' }}>
                            {{ $equipamento->id }} - {{ $equipamento->modelo->nome }} - {{ $equipamento->modelo->marca->nome }}
                            (de {{ $equipamento->cliente->nome }})
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo para Tipo de Serviço -->
                <div class="email">
                    <label for="servico_id" class="form-label">Tipo de serviço:</label>
                    <select class="form-control" id="servico_id" name="servico_id[]" multiple required>
                        <option value="">Selecione o(s) serviço(s)</option>
                        @foreach($servicos as $servico)
                        <option value="{{ $servico->id }}"
                            {{ (old('servico_id') && in_array($servico->id, old('servico_id'))) || (isset($servicosSelecionados) && in_array($servico->id, $servicosSelecionados)) ? 'selected' : '' }}>
                            {{ $servico->id }} - {{ $servico->nome }} - {{ $servico->categoria->nome }}
                        </option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Segure a tecla Ctrl (ou Command no Mac) para selecionar múltiplos serviços.</small>
                </div>

                <!-- Campo para Técnico Responsável -->
                <div class="tel">
                    <label for="tecnico_id" class="form-label">Técnico responsável:</label>
                    <select class="form-control" id="tecnico_id" name="tecnico_id" required>
                        <option value="">Selecione o técnico</option>
                        @foreach($tecnicos as $tecnico)
                        <option value="{{ $tecnico->id }}"
                            {{ (old('tecnico_id', $rma->tecnico_id) == $tecnico->id) ? 'selected' : '' }}>
                            {{ $tecnico->id }} - {{ $tecnico->nome }} - {{ $tecnico->especialidade }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Campo para Descrição do Problema -->
            <div>
                <label for="descricaoProblema" class="form-label">Descrição do problema:</label>
                <textarea class="form-control" id="descricaoProblema" name="descricaoProblema" required>{{ old('descricaoProblema', $rma->descricaoProblema) }}</textarea>
            </div>
        </div>

        <!-- Botão de Submissão -->
        <button type="submit" class="btn btn-submit">Editar RMA</button>
    </form>
</div>
@endsection