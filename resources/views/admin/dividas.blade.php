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
        <h1>Dividas</h1>
        <a href="">Nova Divida</a>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th class="nome">Reparação</th>
                    <th class="email">Valor</th>
                    <th class="tel">Descrição</th>
                    <th class="morada">Data de Emissão</th>
                    <th class="nif">Estado</th>
                    <th class="acoes">-</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dividas as $divida)
                <tr>
                    <td>{{ $divida->id }}</td>
                    <td>{{ $divida->reparacao_id }}</td>
                    <td>{{ $divida->valor }}</td>
                    <td>{{ $divida->descricao }}</td>
                    <td>{{ $divida->dataEmissao }}</td>
                    <td>{{ $divida->estado }}</td>
                    <td class="acoes btn">
                        <a href="">
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