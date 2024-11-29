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
<div class="container table_view">
    <div class="pag_new">
        <h1>Encomendas</h1>
        <a href="{{ route('encomenda.new') }}">Nova Encomenda</a>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Valor</th>
                    <th>Data do pedido</th>
                    <th>Data de Chegada</th>
                    <th>Descrição</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                @foreach($encomendas as $encomenda)
                <tr>
                    <td>{{ $encomenda->id }}</td>
                    <td>{{ $encomenda->custo }}</td>
                    <td>{{ \Carbon\Carbon::parse($encomenda->dataPedido)->format('d/m/Y') }}</td>
                    <td>{{ $encomenda->dataEntrega ? \Carbon\Carbon::parse($encomenda->dataEntrega)->format('d/m/Y') : 'A encomenda ainda não chegou' }}</td>
                    <td>{{ $encomenda->descricao }}</td>
                    <td class="acoes btn">
                        <a href="{{ route('encomenda.show', ['id' => $encomenda->id]) }}">
                            <span class="material-icons">
                                visibility
                            </span>
                        </a>
                        <a href="{{ route('encomenda.edit', ['id' => $encomenda->id]) }}">
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
    <!-- Links de paginação -->
    {{ $encomendas->links() }}
</div>
@endsection