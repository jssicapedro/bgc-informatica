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
                <div class="email_tel">
                    <div class="tel">
                        <label for="tecnico_id" class="form-label">Tecnico responsável:</label>
                        <select class="form-control @error('tecnico_id') is-invalid @enderror" id="tecnico_id" name="tecnico_id" required>
                            <option value="">Selecione o tecnico</option>
                            @foreach($tecnicos as $tecnico)
                                <option value="{{ $tecnico->id }}" @if($tecnico->id == $rma->tecnico_id) selected @endif
                                    {{ old('tecnico_id') == $tecnico->id ? 'selected' : '' }}>
                                    {{ $tecnico->id }} - {{ $tecnico->nome }} - {{ $tecnico->especialidade }}<!-- Exibindo id e nome da categoria -->
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <div class="col-md-12">
                        <livewire:reparacao.equipamentos :rma="$rma->id" />
                    </div>
                    <div class="col-md-12">
                        <livewire:reparacao.servicos :rma="$rma->id"/>
                    </div>
                </div>
                <div>
                    <label for="descricaoProblema" class="form-label">Descrição do problema:</label>
                    <input type="text" class="form-control" value="{{ $rma->descricaoProblema }}" id="descricaoProblema" name="descricaoProblema" required>
                </div>
            </div>
            <button type="submit" class="btn btn-submit">Edit Rma</button>
        </form>
    </div>
@endsection
