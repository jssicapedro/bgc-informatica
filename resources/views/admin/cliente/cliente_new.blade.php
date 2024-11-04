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
        <a href="{{ route('clientes') }}">Voltar à listagem</a>
        <h1>Criar um novo cliente</h1>
    </div>
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="info">
            <div class="email_tel">
                <div class="nome">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}">
                </div>
                <div class="email">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="tel">
                    <label for="tel" class="form-label">Telemóvel</label>
                    <input type="number" class="form-control" id="tel" name="tel" value="{{ old('tel') }}">
                </div>
            </div>
            <div class="nif">
                <label for="nif" class="form-label">NIF</label>
                <input type="number" class="form-control" id="nif" name="nif" value="{{ old('nif') }}">
            </div>
            <div class="morada">
                <label for="morada" class="form-label">Morada</label>
                <input type="text" class="form-control" id="morada" name="morada" value="{{ old('morada') }}">
            </div>
        </div>
    </form>
</div>
@endsection