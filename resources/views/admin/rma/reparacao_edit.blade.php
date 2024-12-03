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
    // Exibe/oculta o campo "dataEntrega" com base no estado
    document.getElementById('estado').addEventListener('change', function() {
        const dataEntregaContainer = document.getElementById('dataEntregaContainer');
        if (this.value === 'completo') {
            dataEntregaContainer.style.display = 'block';
        } else {
            dataEntregaContainer.style.display = 'none';
        }
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
            <!-- Técnico Responsável -->
            <div class="email_tel">
                <div class="tel">
                    <label for="tecnico_id" class="form-label">Técnico responsável:</label>
                    <input type="text" value="{{ $rma->tecnico_responsavel->id }} - {{ $rma->tecnico_responsavel->nome }}" class="form-control mt-1" readonly>
                    <!-- Input oculto para enviar o tecnico_id -->
                    <input type="hidden" name="tecnico_id" value="{{ $rma->tecnico_responsavel->id }}">
                </div>
            </div>


            <!-- Equipamento -->
            <div class="row mb-3 mt-3">
                <div class="col-md-12">
                    <label for="equipamento_id" class="form-label">Equipamento:</label>
                    <input type="text" value="{{ $rma->equipamento->id }} - {{ $rma->equipamento->modelo->marca->nome }}, {{ $rma->equipamento->modelo->nome }} de {{ $rma->equipamento->cliente->nome }}" class="form-control mt-1" readonly>
                    <!-- Input oculto para enviar o equipamento_id -->
                    <input type="hidden" name="equipamento_id" value="{{ $rma->equipamento->id }}">
                </div>
            </div>

            <!-- Seleção do Tipo de Serviço (Checkboxes) -->
            <div class="row mb-3 mt-3">
                <div class="col-md-12">
                    <label for="servico_id" class="form-label">Tipo de Serviço:</label>
                    @foreach($servicos as $servico)
                    <div>
                        <input type="checkbox" name="servico_id[]" value="{{ $servico->id }}" id="servico_{{ $servico->id }}" class="form-check-input"
                            @if(in_array($servico->id, $rma->servicos->pluck('id')->toArray())) checked @endif>
                        <label for="servico_{{ $servico->id }}">
                            {{ $servico->categoria->nome }} - {{ $servico->nome }}
                        </label>
                        <!-- Horas de trabalho para cada serviço -->
                        <input type="number" name="horas_trabalho[{{ $servico->id }}]" placeholder="Horas de trabalho" class="form-control mt-1"
                            value="{{ old('horas_trabalho.' . $servico->id, $rma->servicos->where('id', $servico->id)->first()->pivot->horas_trabalho ?? '') }}">
                    </div>
                    @endforeach
                </div>
            </div>

            <div>
                <label for="descricaoProblema" class="form-label">Descrição do problema:</label>
                <input type="text" class="form-control" value="{{ $rma->descricaoProblema }}" id="descricaoProblema" name="descricaoProblema" required readonly>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado do RMA:</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="em reparação" {{ $rma->estado == 'em reparação' ? 'selected' : '' }}>Em reparação</option>
                    <option value="completo" {{ $rma->estado == 'completo' ? 'selected' : '' }}>Completo</option>
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
        </div>
        <button type="submit" class="btn btn-submit">Edit Rma</button>
    </form>
</div>
@endsection