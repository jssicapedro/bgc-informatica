@extends('layout.layoutLogin')

@section('title', 'BGCInformatica')


@push('links')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush


@push('scripts')
@endpush

@section('main')
<div class="div-logotipo">
    <img src="{{ asset('img/nav/logotipo2.png') }}" alt="Logotipo">
</div>
<div class="div-form">
    <form method="POST" action="{{ route('tecnico.login.submit') }}">
        @csrf
        @if(session('fail'))
            <div class="alert alert-danger">{{ session('fail') }}</div>
        @endif
        <div class="div-label">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="div-label">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit">Entrar</button>
    </form>
</div>

@endsection