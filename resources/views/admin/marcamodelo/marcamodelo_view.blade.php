@extends('layout.layout')

@section('title', 'BGCInformatica')

<!-- css -->
@push('links')
<link rel="stylesheet" href="{{ asset('css/tabel_pag.css') }}">
@endpush

<!-- js -->
@push('scripts')
@endpush

@section('main')
<div class="container">
    <div class="pag_new">
        <h1>{{$marcamodelo->id .' - '. $marcamodelo->marca}}</h1>
    </div>
    <div class="info">
        <div class="email_tel">
            <div class="email">
                <h3>Marca</h3>
                <p>{{$marcamodelo->marca}}</p>
            </div>
        </div>
        <div class="email_tel">
            <div class="tel">
                <h3>Modelo</h3>
                <p>{{$marcamodelo->modelo}}</p>
            </div>
        </div>
    </div>
</div>
@endsection