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
<a href="{{ route('servicos') }}">Voltar à listagem</a>
        <h1>{{$servico->id .' - '. $servico->categoria_id .' - '. $servico->NomeServico}}</h1>
    </div>
    <div class="info">
        <div class="email_tel">
            <div class="email">
                <h3>Categoria</h3>
                <input type="text" class="form-control" value="{{$servico->categoria_id}}">
            </div>
            <div class="tel">
                <h3>Tipo de Serviço</h3>
                <input type="text" class="form-control" value="{{$servico->NomeServico}}">
            </div>
        </div>
        <div class="nif">
            <h3>Custo por hora</h3>
            <input type="text" class="form-control" value="{{$servico->custo}}">
        </div>
        <div class="morada">
            <h3>Descrição</h3>
            <input type="text" class="form-control" value="{{$servico->descricao}}">
        </div>
    </div>
</div>
@endsection