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
        <h1>Encomendas</h1>
        <a href="">Nova Encomenda</a>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th class="nome">Valor</th>
                    <th class="email">Data do pedido</th>
                    <th class="tel">Data de Chegada</th>
                    <th class="morada">Estado</th>
                    <th class="nif">Descrição</th>
                    <th class="acoes">-</th>
                </tr>
            </thead>
            <tbody>
                @foreach($encomendas as $encomenda)
                <tr>
                    <td>{{ $encomenda->id }}</td>
                    <td>{{ $encomenda->valor }}</td>
                    <td>{{ $encomenda->dataPedido }}</td>
                    <td>{{ $encomenda->dataChegada }}</td>
                    <td>{{ $encomenda->estado }}</td>
                    <td>{{ $encomenda->descricao }}</td>
                    <td class="acoes btn">
                        <a href="{{ route('encomenda.show', ['id' => $encomenda->id]) }}">
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