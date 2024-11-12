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
                    <label for="tipo" class="form-label">Tipo:</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="{{ old('tipo') }}">
                </div>
                <div class="tel">
                    <label for="numero_serie" class="form-label">Número de serie:</label>
                    <input type="text" class="form-control" id="numero_serie" name="numero_serie" value="{{ old('numero_serie') }}">
                </div>
                <div class="tel">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao') }}">
                </div>
            </div>
            <div class="nif">
                <label for="entrada" class="form-label">Deu entrada a:</label>
                <input type="date" class="form-control" id="entrada" name="entrada" value="{{ old('entrada') }}">
            </div>
            <div class="morada">
                <label for="resolucao" class="form-label">Resolução:</label>
                <input type="text" class="form-control" id="resolucao" name="resolucao" value="{{ old('resolucao') }}">
            </div>
            <div class="morada">
                <label for="levantamento" class="form-label">O cliente levantou o equipamento a:</label>
                <input type="text" class="form-control" id="levantamento" name="levantamento" value="{{ old('levantamento') }}">
            </div>
            <div class="morada">
                <label for="qr" class="form-label">QR Code:</label>
                <input type="text" class="form-control" id="qr" name="qr" value="{{ old('qr') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-submit">Add equipamento</button>
    </form>
</div>
@endsection