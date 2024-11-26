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
        <a href="{{ route('tecnicos') }}">Voltar à listagem</a>
        <h1>{{$tecnico->id .' - '. $tecnico->nome}}</h1>
    </div>
    <div class="info">
        <div class="email_tel">
            <div class="email">
                <h3>Email</h3>
                <p>{{$tecnico->email}}</p>
            </div>
            <div class="tel">
                <h3>Telemovel</h3>
                <p>{{$tecnico->telemovel}}</p>
            </div>
        </div>
        <div class="esp">
            <h3>Especialidade</h3>
            <p>{{$tecnico->especialidade}}</p>
        </div>
    </div>
</div>
@endsection