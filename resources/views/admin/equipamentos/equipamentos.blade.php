@extends('layout.layout')

@section('title', 'BGCInformatica')

<!-- css -->
@push('links')
<link rel="stylesheet" href="{{ asset('css/tabel_pag.css') }}">
@endpush

<!-- js -->
@push('scripts')
@vite(['resources/js/app.js', 'resources/css/app.css'])
@endpush

@section('main')
<div class="container">
    <div class="pag_new">
        <h1>Equipamentos</h1>
        <a href="{{ route('equipamento.new') }}">Novo Equipamento</a>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>N. Serie</th>
                    <th>Data de Entrada</th>
                    <th>Levantamento</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipamentos as $equipamento)
                <tr>
                    <td>{{ $equipamento->id }}</td>
                    <td>{{ $equipamento->tipo }}</td>
                    <td>{{ $equipamento->numero_serie }}</td>
                    <td>{{ $equipamento->entrada }}</td>
                    <td>{{ $equipamento->levantamento }}</td>
                    <td>{{ $equipamento->estado }}</td>
                    <td class="acoes btn">
                        <a href="{{ route('equipamento.show', ['id' => $equipamento->id]) }}">
                            <span class="material-icons">
                                visibility
                            </span>
                        </a>
                        <a href="">
                            <span class="material-icons">
                                edit
                            </span>
                        </a>
                        <a href="">
                            <span class="material-icons">
                                delete
                            </span>
                        </a>
                    </td>
                    <!-- Adicione outros campos relevantes -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection