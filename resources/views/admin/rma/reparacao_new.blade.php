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
                    <select class="form-control" id="equipamento_id" name="equipamento_id">
                        <option value="">Selecione o equipamento</option>
                        @foreach($equipamentos as $equipamento)
                        <option value="{{ $equipamento->id }}"
                            {{ old('equipamento_id') == $equipamento->id ? 'selected' : '' }}>
                            {{ $equipamento->id }} <!-- Exibindo id e nome da categoria -->
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="tel">
                    <label for="servico_id" class="form-label">Tipo de serviço:</label>
                    <select class="form-control" id="equipamento_id" name="equipamento_id">
                        <option value="">Selecione o serviço</option>
                        @foreach($servicos as $servico)
                        <option value="{{ $servico->id }}"
                            {{ old('servico_id') == $servico->id ? 'selected' : '' }}>
                            {{ $servico->id }} -  {{ $servico->NomeServico }} -  {{ $servico->descricao }}<!-- Exibindo id e nome da categoria -->
                        </option>
                        @endforeach
                    </select>
                </div>
                <!-- <div class="tel">
                    <label for="estado" class="form-label">Estado do serviço:</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="{{ old('estado') }}">
                </div> -->
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