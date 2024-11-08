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
        <a href="{{ route('encomendas') }}">Voltar à listagem</a>
        <h1>Criar uma nova encomenda</h1>
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
                    <label for="valor" class="form-label">Valor:</label>
                    <input type="text" class="form-control" id="valor" name="valor" value="{{ old('valor') }}">
                </div>
                <div class="tel">
                    <label for="dataPedido" class="form-label">Data de pedido:</label>
                    <input type="date" class="form-control" id="dataPedido" name="dataPedido" value="{{ old('dataPedido') }}">
                </div>
                <div class="tel">
                    <label for="dataChegada" class="form-label">Data de chegada:</label>
                    <input type="date" class="form-control" id="dataChegada" name="dataChegada" value="{{ old('dataChegada') }}">
                </div>
            </div>
            <div class="nif">
                <label for="estado" class="form-label">Estado:</label>
                <input type="text" class="form-control" id="estado" name="estado" value="{{ old('estado') }}">
            </div>
            <div class="morada">
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-submit">Add encomenda</button>
    </form>
</div>
@endsection