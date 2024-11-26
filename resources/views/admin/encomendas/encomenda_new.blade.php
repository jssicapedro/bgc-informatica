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
        <h1>Criar uma nova encomenda</h1>
    </div>
    <form action="{{ route('encomenda.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
                    <label for="custo" class="form-label">Valor:</label>
                    <input type="number" class="form-control" id="custo" name="custo" value="{{ old('custo') }}" step="0.01" min="0">
                </div>
            </div>
            <div class="morada">
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-submit">Add encomenda</button>
    </form>
</div>
@endsection