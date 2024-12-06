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
                    <td>
                        <ul class="acoes btn">
                            <li>
                                <a href="{{ route('encomenda.show', ['id' => $encomenda->id]) }}">
                                    <span class="material-icons">
                                        visibility
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('encomenda.edit', ['id' => $encomenda->id]) }}">
                                    <span class="material-icons">
                                        edit
                                    </span>
                                </a>
                            </li>
                            <!-- Exibição da opção de restaurar ou excluir dependendo se o técnico foi excluído -->
                            @if($encomenda->trashed())
                            <li>
                                <!-- Restaura o técnico -->
                                <form action="{{ route('encomenda.restore', ['id' => $encomenda->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn text-warning">
                                        <span class="material-icons">
                                            history
                                        </span>
                                    </button>
                                </form>
                            </li>
                            @else
                            <li>
                                <!-- Excluir técnico -->
                                <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $encomenda->id }}">
                                    <span class="material-icons">
                                        delete
                                    </span>
                                </button>
                            </li>
                            @endif
                        </ul>
                    </td>
                </tr>
                <!-- Modal de confirmação -->
                <div class="modal fade" id="deleteModal{{ $encomenda->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $encomenda->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $encomenda->id }}">Confirmar Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Tem certeza de que deseja apagar a encomenda?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('encomenda.destroy', $encomenda->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Apagar</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Links de paginação -->
    {{ $encomendas->links() }}
</div>
@endsection