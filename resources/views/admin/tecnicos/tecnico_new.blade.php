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
        <a href="{{ route('tecnicos') }}">Voltar à listagem</a>
        <h1>Criar um novo técnico</h1>
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
                    <label for="nome" class="form-label">Nome do técnico:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}">
                </div>
                <div class="email">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="email">
                    <label for="telemovel" class="form-label">Numero de telemóvel:</label>
                    <input type="text" class="form-control" id="telemovel" name="telemovel" value="{{ old('telemovel') }}">
                </div>
            </div>
            <div class="email_tel">
                <div class="email">
                    <label for="especialidade" class="form-label">Especialidade:</label>
                    <input type="text" class="form-control" id="especialidade" name="especialidade" value="{{ old('especialidade') }}">
                </div>
            </div>
            <div class="tel">
                <label for="password" class="form-label">Palavra-pass:</label>
                <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-submit">Add técnico</button>
    </form>
</div>
@endsection