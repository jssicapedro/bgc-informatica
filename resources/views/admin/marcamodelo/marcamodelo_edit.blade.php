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
        <a href="{{ route('marcas-modelos') }}">Voltar à listagem</a>
        <h1>Editar os dados de {{$marca->nome}} , {{$modelo->nome}}</h1>
    </div>
    <form action="{{ route('marcamodelo.update', $modelo->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="marca" class="form-label">Marca:</label>
                    <input type="text" class="form-control" id="marca" name="marca" value="{{ $marca->nome }}">
                </div>
                <div class="email">
                    <label for="modelo" class="form-label">Modelo:</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $modelo->nome }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-submit">Editar marca/modelo</button>
    </form>
</div>
@endsection