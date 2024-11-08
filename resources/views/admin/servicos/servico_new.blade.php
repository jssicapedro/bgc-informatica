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
        <a href="{{ route('servicos') }}">Voltar à listagem</a>
        <h1>Criar um novo serviço</h1>
    </div>
    <form action="#" method="POST" enctype="multipart/form-data">
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
                    <label for="tipo" class="form-label">Tipo de serviço:</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="{{ old('tipo') }}">
                </div>
                <div class="email">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="{{ old('estado') }}">
                </div>
            </div>
            <div class="email_tel">
                <div class="tel">
                    <label for="dataInicio" class="form-label">Data de inicio:</label>
                    <input type="date" class="form-control" id="dataInicio" name="dataInicio" value="{{ old('dataInicio') }}">
                </div>
                <div class="tel">
                    <label for="conslusaoExpectada" class="form-label">Data de conclusão espectada:</label>
                    <input type="date" class="form-control" id="conslusaoExpectada" name="conslusaoExpectada" value="{{ old('conslusaoExpectada') }}">
                </div>
                <div class="tel">
                    <label for="conclusao" class="form-label">Data de conclusão:</label>
                    <input type="date" class="form-control" id="conclusao" name="conclusao" value="{{ old('conclusao') }}">
                </div>
            </div>
            <div class="tel">
                    <label for="descricao" class="form-label">Descricao:</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao') }}">
                </div>
        </div>
        <button type="submit" class="btn btn-submit">Add marca/modelo</button>
    </form>
</div>
@endsection