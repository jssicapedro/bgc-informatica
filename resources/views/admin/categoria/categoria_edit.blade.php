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
        <a href="{{ route('categorias') }}">Voltar à listagem</a>
        <h1>Editar a {{$categoria->nome}}</h1>
    </div>
    <form action="{{ route('categoria.update', $categoria->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="nome" class="form-label">Nome da nova categoria:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $categoria->nome) }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-submit">Add categoria</button>
    </form>
</div>
@endsection