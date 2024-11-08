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
    <form action="#" method="POST" enctype="multipart/form-data">
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
                <div class="email">
                    <label for="equipamento_id" class="form-label">Equipamento a ser reparado:</label>
                    <input type="text" class="form-control" id="equipamento_id" name="equipamento_id" value="{{ old('equipamento_id') }}">
                </div>
                <div class="tel">
                    <label for="servico_id" class="form-label">Tipo de serviço:</label>
                    <input type="text" class="form-control" id="servico_id" name="servico_id" value="{{ old('servico_id') }}">
                </div>
                <div class="tel">
                    <label for="estado" class="form-label">Estado do serviço:</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="{{ old('estado') }}">
                </div>
            </div>
            <div class="email_tel">
                <div class="email">
                    <label for="descricaoProblema" class="form-label">Descrição do problema:</label>
                    <input type="text" class="form-control" id="descricaoProblema" name="descricaoProblema" value="{{ old('descricaoProblema') }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-submit">Add marca/modelo</button>
    </form>
</div>
@endsection