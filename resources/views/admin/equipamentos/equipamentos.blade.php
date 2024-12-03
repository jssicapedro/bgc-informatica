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
        <h1>Equipamentos</h1>
        <a href="{{ route('equipamento.new') }}">Novo Equipamento</a>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca Modelo</th>
                    <th>Cliente</th>
                    <th>Categoria</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipamentos as $equipamento)
                <tr>
                    <td>{{ $equipamento->id }}</td>
                    <td>
                        {{ $equipamento->modelo->marca->nome }},
                        {{ $equipamento->modelo->nome }}
                    <td>
                        {{ $equipamento->cliente->nome }}
                    </td>
                    <td>{{ $equipamento->categoria->nome }}</td>
                    <td>
                        <ul class="acoes btn">
                            <li>
                                <!--  <a href="{{ route('equipamento.show', ['id' => $equipamento->id]) }}">
                                <span class="material-icons">
                                    visibility
                                </span>
                            </a> -->
                            </li>
                            <li>
                                <a href="{{ route('equipamento.edit', ['id' => $equipamento->id]) }}">
                                    <span class="material-icons">
                                        edit
                                    </span>
                                </a>
                            </li>
                            @if($equipamento->trashed())
                            <li>
                                <!-- Restaura o técnico -->
                                <form action="{{ route('equipamento.restore', ['id' => $equipamento->id]) }}" method="POST" style="display: inline;">
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
                                <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $equipamento->id }}">
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
                <div class="modal fade" id="deleteModal{{ $equipamento->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $equipamento->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $equipamento->id }}">Confirmar Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Tem certeza de que deseja apagar o técnico <strong>{{ $equipamento->modelo->marca->nome }}, {{ $equipamento->modelo->nome }}</strong> do cliente <strong>{{ $equipamento->cliente->nome }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('equipamento.destroy', $equipamento->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Apagar</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismisApagas="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Links de paginação -->
    {{ $equipamentos->links() }}
</div>
@endsection