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
        <a href="{{ route('orcamentos') }}">Voltar à listagem</a>
        <h1>Criar um novo orçamento</h1>
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
                    <label for="reparacao_id" class="form-label">A que reparação pertece:</label>
                    <input type="text" class="form-control" id="reparacao_id" name="reparacao_id" value="{{ old('reparacao_id') }}">
                </div>
                <div class="email">
                    <label for="valor" class="form-label">Valor:</label>
                    <input type="number" class="form-control" id="valor" name="valor" value="{{ old('valor') }}">
                </div>
                <div class="email">
                    <label for="dataEmissao" class="form-label">Data de emissão:</label>
                    <input type="number" class="form-control" id="dataEmissao" name="dataEmissao" value="{{ old('dataEmissao') }}">
                </div>
            </div>
            <div class="email_tel">
                <div class="email">
                    <label for="conclusao" class="form-label">Conclusão:</label>
                    <input type="text" class="form-control" id="conclusao" name="conclusao" value="{{ old('conclusao') }}">
                </div>
                <div class="email">
                    <label for="estado" class="form-label">Estado do orçamento:</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="{{ old('estado') }}">
                </div>
            </div>
            <div class="email_tel">
                <div class="email">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao') }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-submit">Add orçamento</button>
    </form>
</div>
@endsection