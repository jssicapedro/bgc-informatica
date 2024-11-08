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
        <a href="{{ route('dividas') }}">Voltar à listagem</a>
        <h1>Criar uma nova divida</h1>
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
            <div class="nome_tel">
                <div class="nome">
                    <label for="reparacao_id" class="form-label">Esta divida pertence a que reparação?</label>
                    <input type="text" class="form-control" id="reparacao_id" name="reparacao_id" value="{{ old('reparacao_id') }}">
                </div>
            </div>
            <div>
                <div class="email">
                    <label for="valor" class="form-label">Valor:</label>
                    <input type="text" class="form-control" id="valor" name="valor" value="{{ old('valor') }}">
                </div>

            </div>
            <div class="tel_nif">
                <div class="tel">
                    <label for="dataEmissao" class="form-label">Data de emissão:</label>
                    <input type="number" class="form-control" id="dataEmissao" name="dataEmissao" value="{{ old('dataEmissao') }}">
                </div>
            </div>
        </div>
        <input style="display: none;" type="text" class="form-control" id="estado" name="estado" value="em processamento">
        <button type="submit" class="btn btn-submit">Add divida</button>
    </form>
</div>
@endsection