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
        <h1>Editar os dados do equipamento de {{$equipamento->cliente?->nome}}</h1>
    </div>
    <form action="{{ route('equipamento.update', $equipamento->id) }}" method="POST" enctype="multipart/form-data">
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
            <div class="nif">
                <label for="categoria_id" class="form-label">Categoria:</label>
                <select class="form-control" id="categoria_id" name="categoria_id">
                    <option class="fw-bold" value="{{$equipamento->categoria->id}}" selected>
                        {{ $equipamento->categoria->id }} - {{ $equipamento->categoria->nome }}
                    </option>
                    @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        {{ old('categoria_id', $equipamento->categoria->id) == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->id }} - {{ $categoria->nome }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="nif">
                <label for="modelo_id" class="form-label">Marca e modelo:</label>
                <select class="form-control" id="modelo_id" name="modelo_id">
                    <option class="fw-bold" value="{{ $equipamento->modelo->id }}" selected>
                        {{ $equipamento->modelo->id }} - {{ $equipamento->modelo->marca->nome }} - {{ $equipamento->modelo->nome }}
                    </option>
                    @foreach($modelos as $modelo)
                    <option value="{{ $modelo->id }}"
                        {{ old('modelo_id', $equipamento->modelo->id) == $modelo->id ? 'selected' : '' }}>
                        {{ $modelo->id }} - {{ $modelo->marca->nome }} - {{ $modelo->nome }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="nif">
                <label for="cliente_id" class="form-label">Cliente:</label>
                <select class="form-control" id="cliente_id" name="cliente_id">
                    <option class="fw-bold" value="{{ $equipamento->cliente?->id }}" selected>
                        {{ $equipamento->cliente?->id }} - {{ $equipamento->cliente?->nome }}
                    </option>
                    @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}"
                        {{ old('cliente_id', $equipamento->cliente?->id) == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->id }} - {{ $cliente->nome }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-submit">Editar equipamento</button>
    </form>
</div>
@endsection