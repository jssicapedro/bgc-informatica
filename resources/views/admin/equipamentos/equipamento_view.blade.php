@extends('layout.layout')

@section('title', 'BGCInformatica')

<!-- css -->
@push('links')
<link rel="stylesheet" href="{{ asset('css/tabel_pag.css') }}">
@endpush

<!-- js -->
@push('scripts')
@endpush

@section('main')
<div class="container">
    <div class="pag_new">
        <h1>{{$equipamento->id .' - '. $equipamento->tipo}}</h1>
    </div>
    <div class="info">
        <div class="email_tel">
            <div class="email">
                <h3>Tipo</h3>
                <p>{{$equipamento->tipo}}</p>
            </div>
            <div class="tel">
                <h3>Numero de serie</h3>
                <p>{{$equipamento->numero_serie}}</p>
            </div>
        </div>
        <div class="nif">
            <h3>Descrição do equipamento</h3>
            <p>{{$equipamento->descricao}}</p>
        </div>
        <div class="morada">
            <h3>Este equipamento deu entrada a:</h3>
            <p>{{$equipamento->entrada}}</p>
        </div>
        <div class="morada">
            <h3>Resolução:</h3>
            <p>{{$equipamento->resolucao}}</p>
        </div>
        <div class="morada">
            <h3>O cliente levantou o equipamento a:</h3>
            <p>{{$equipamento->levantamento}}</p>
        </div>
        <div class="morada">
            <h3>QR Code:</h3>
            <p>{{$equipamento->qr}}</p>
        </div>
    </div>
</div>
@endsection