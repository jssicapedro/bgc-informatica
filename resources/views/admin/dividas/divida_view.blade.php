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
        <h1>{{$divida->id .' - '. $divida->valor .' - '. $divida->estado}}</h1>
    </div>
    <div class="info">
        <div class="email_tel">
            <div class="email">
                <h3>Valor</h3>
                <p>{{$divida->valor}}</p>
            </div>
            <div class="tel">
                <h3>Descricao</h3>
                <p>{{$divida->descricao}}</p>
            </div>
        </div>
        <div class="nif">
            <h3>Data</h3>
            <p>{{$divida->dataEmissao}}</p>
        </div>
        <div class="morada">
            <h3>Estado</h3>
            <p>{{$divida->estado}}</p>
        </div>
    </div>
</div>
@endsection