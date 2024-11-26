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
        <a href="{{ route('equipamentos') }}">Voltar à listagem</a>
        <h1>Criar um novo equipamento</h1>
    </div>
    <form action=" {{route('equipamento.store')}} " method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <div class="info">
            <div class="email">
                <label for="categoria_id" class="form-label">Categoria:</label>
                <select class="form-control" id="categoria_id" name="categoria_id">
                    <option value="">Selecione a categoria</option>
                    @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->id }} - {{ $categoria->nome }} <!-- Exibindo id e nome da categoria -->
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="email">
                <label for="modelo_id" class="form-label">Marca e modelo:</label>
                <select class="form-control" id="modelo_id" name="modelo_id">
                    <option value="">Selecione a marca e o modelo</option>
                    @foreach($modelos as $modelo)
                    <option value="{{ $modelo->id }}"
                        {{ old('modelo_id') == $modelo->id ? 'selected' : '' }}>
                        {{ $modelo->id }} - {{ $modelo->marca->nome}} - {{ $modelo->nome }} <!-- Exibindo id e nome da categoria -->
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="email">
                <label for="cliente_id" class="form-label">Cliente:</label>
                <select class="form-control" id="cliente_id" name="cliente_id">
                    <option value="">Selecione o cliente</option>
                    @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}"
                        {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->id }} - {{ $cliente->nome }} <!-- Exibindo id e nome da categoria -->
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-submit">Add equipamento</button>
    </form>
</div>
@endsection