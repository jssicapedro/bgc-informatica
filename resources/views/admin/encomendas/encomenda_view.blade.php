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
        <a href="{{ route('encomendas') }}">Voltar à listagem</a>
    </div>
    <div class="pag_new">
        <h1>{{$encomenda->id .' - '. $encomenda->descricao}}</h1>
    </div>
    
    <div class="info">
        <div class="email_tel">
            <div class="email">
                <h3>Custo</h3>
                <input type="text" class="form-control" value="{{$encomenda->custo}}" readonly>
            </div>
        </div>
        <div class="email_tel">
            <div class="tel">
                <h3>Data de pedido</h3>
                <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($encomenda->dataPedido)->format('d/m/Y') }}" readonly>
            </div>
            </div>
        <div class="email_tel">
            <div class="tel">
                <h3>Data de entrega</h3>
                <input type="text" class="form-control"  value="{{ $encomenda->dataEntrega ? \Carbon\Carbon::parse($encomenda->dataEntrega)->format('d/m/Y') : 'A encomenda ainda não chegou' }}" readonly>
            </div>
        </div>
        <div class="morada">
            <h3>Descricao</h3>
            <input type="text" class="form-control" value="{{$encomenda->descricao}}" readonly>
        </div>
    </div>
</div>
@endsection