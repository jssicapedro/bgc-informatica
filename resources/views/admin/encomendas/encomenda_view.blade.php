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
        <h1>{{$encomenda->id .' - '. $encomenda->descricao}}</h1>
    </div>
    <div class="info">
        <div class="email_tel">
            <div class="email">
                <h3>Valor</h3>
                <p>{{$encomenda->valor}}</p>
            </div>
            <div class="tel">
                <h3>Data de pedido</h3>
                <p>{{$encomenda->dataPedido}}</p>
            </div>
            <div class="tel">
                <h3>Data de chegada</h3>
                <p>{{$encomenda->dataPedido}}</p>
            </div>
        </div>
        <div class="nif">
            <h3>Estado</h3>
            <p>{{$encomenda->estado}}</p>
        </div>
        <div class="morada">
            <h3>Descricao</h3>
            <p>{{$encomenda->descricao}}</p>
        </div>
    </div>
</div>
@endsection