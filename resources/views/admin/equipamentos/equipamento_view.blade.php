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
        <a href="{{ route('equipamentos') }}">Voltar à listagem</a>
        <h1>{{$equipamento->id .' - '. $equipamento->modelo->nome . ' de ' . $equipamento->cliente?->nome}}</h1>
    </div>
    <div class="info">
        <div class="email_tel">
            <div class="email">
                <h3>Categoria</h3>
                <input type="text" class="form-control" value="{{ $equipamento->categoria->id }} - {{ $equipamento->categoria->nome }}" readonly>
            </div>
        </div>
        <div class="nif">
            <div class="tel">
                <h3>Marca e modelo</h3>
                <input type="text" class="form-control" value="{{ $equipamento->modelo->marca->nome }} - {{ $equipamento->modelo->nome }}" readonly>
            </div>
        </div>
        <div class="nif">
            <div class="tel">
                <h3>Cliente</h3>
                <input type="text" class="form-control" value="{{ $equipamento->cliente?->nome }}" readonly>
            </div>
        </div>
    </div>
</div>
@endsection