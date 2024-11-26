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
    </div>
    <div class="pag_new">
        <h1>{{$encomenda->id .' - '. $encomenda->descricao}}</h1>
    </div>
    <form action="{{ route('encomenda.update', $encomenda->id) }}" method="POST" enctype="multipart/form-data">
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
            <div class="email_tel">
                <div class="email">
                    <h3>Custo</h3>
                    <input type="text" class="form-control" name="custo" value="{{$encomenda->custo}}">
                </div>
            </div>
            <div class="email_tel">
                <div class="tel">
                    <h3>Data de pedido</h3>
                    <input type="text" class="form-control" name="dataPedido" value="{{ \Carbon\Carbon::parse($encomenda->dataPedido)->format('d/m/Y') }}" readonly>
                </div>

                <div class="tel">
                    <h3>Data de entrega</h3>
                    <div class="d-flex gap-3 align-items-center">
                        <input class="form-check-input mt-0" type="checkbox" name="dataEntrega" value="yes">
                        <label for="dataEntrega">A encomenda já chegou</label>
                    </div>
                </div>
            </div>
            <div class="morada">
                <h3>Descricao</h3>
                <input type="text" class="form-control" name="descricao" value="{{$encomenda->descricao}}">
            </div>
        </div>
        <button type="submit" class="btn btn-submit">Editar encomenda</button>
    </form>
</div>
@endsection