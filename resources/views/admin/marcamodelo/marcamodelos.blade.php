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
        <h1>Marcas e Modelos</h1>
        <a href="">Nova Marca/Modelo</a>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th class="nome">Marca</th>
                    <th class="email">Modelo</th>
                    <th class="acoes">-</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marcasmodelos as $marcasmodelo)
                <tr>
                    <td>{{ $marcasmodelo->id }}</td>
                    <td>{{ $marcasmodelo->marca }}</td>
                    <td>{{ $marcasmodelo->modelo }}</td>
                    <td class="acoes btn">
                        <a href="{{ route('marcasmodelos.show', ['id' => $marcasmodelo->id]) }}">
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