@extends('layout.layout')

@section('title', 'BGCInformatica')

<!-- css -->
@push('links')
<link rel="stylesheet" href="{{ asset('css/tabel_pag.css') }}">
<link rel="stylesheet" href="{{ asset('css/pag_view.css') }}">
@endpush

<!-- js -->
@push('scripts')
@endpush

@section('main')
<div class="container">
    <div class="pag_new pag_list">
        <a href="{{ route('clientes') }}">Voltar à listagem</a>
        <h1>{{$cliente->id .' - '. $cliente->nome}}</h1>
    </div>
    <div class="info">
        <div class="email_tel">
            <div class="email">
                <h3>Email</h3>
                <input type="text" class="form-control" value="{{$cliente->email}}" readonly>
            </div>
            <div class="tel">
                <h3>Telemovel</h3>
                <input type="text" class="form-control" value="{{$cliente->telemovel}}" readonly>
            </div>
        </div>
        <div class="nif">
            <h3>NIF</h3>
            <input type="text" class="form-control" value="{{$cliente->nif}}" readonly>
        </div>
        <div class="morada">
            <h3>Morada</h3>
            <input type="text" class="form-control" value="{{$cliente->morada}}" readonly>
        </div>
    </div>
</div>
@endsection