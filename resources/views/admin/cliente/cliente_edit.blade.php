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
        <a href="{{ route('clientes') }}">Voltar à listagem</a>
        <h1>Editar os dados do cliente {{$cliente->id}}</h1>
    </div>
    <form action="{{ route('cliente.update', $cliente->id) }}" method="POST" enctype="multipart/form-data">
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
            <div class="nome_tel">
                <div class="nome">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $cliente->nome }}">
                </div>
                <div class="email">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $cliente->email }}">
                </div>
               
            </div>
            <div class="tel_nif">
                <div class="tel">
                    <label for="telemovel" class="form-label">Telemóvel:</label>
                    <input type="number" class="form-control" id="telemovel" name="telemovel" value="{{ $cliente->telemovel }}">
                </div>
                <div class="nif">
                    <label for="nif" class="form-label">NIF:</label>
                    <input type="number" class="form-control" id="nif" name="nif" value="{{ $cliente->nif }}">
                </div>
            </div>
            <div class="morada">
                <label for="morada" class="form-label">Morada:</label>
                <input type="text" class="form-control" id="morada" name="morada" value="{{ $cliente->morada }}">
            </div>
        </div>
        <button type="submit" class="btn btn-submit">Editar cliente</button>
    </form>
</div>
@endsection