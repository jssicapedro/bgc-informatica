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
    <form action=" {{ route('reparacao.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
                    <select class="form-control" id="tecnico_id" name="tecnico_id" required>
                        <option value="">Selecione o tecnico</option>
                        @foreach($tecnicos as $tecnico)
                            <option value="{{ $tecnico->id }}"
                                {{ old('tecnico_id') == $tecnico->id ? 'selected' : '' }}>
                                {{ $tecnico->id }} - {{ $tecnico->nome }} - {{ $tecnico->especialidade }}<!-- Exibindo id e nome da categoria -->
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col-md-12">
                    <livewire:reparacao.equipamentos />
                </div>
                <div class="col-md-12">
                    <livewire:reparacao.servicos />
                </div>
            </div>
            <div>
                <label for="descricaoProblema" class="form-label">Descrição do problema:</label>
                <textarea class="form-control" id="descricaoProblema" name="descricaoProblema" value="{{ old('descricaoProblema') }}" required></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-submit">Add Rma</button>
    </form>
</div>
@endsection

