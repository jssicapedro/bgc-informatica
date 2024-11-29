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
        <h1>Serviços</h1>
        <a href="{{ route('servico.new') }}">Novo Serviço</a>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Nome do serviço</th>
                    <th>Custo</th>
                    <th>Estimativa (minutos)</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                @foreach($servicos as $servico)
                <tr>
                    <td>{{ $servico->id }}</td>
                    <td>{{ $servico->categoria->nome }}</td>
                    <td>{{ $servico->nome }}</td>
                    <td>{{ $servico->custo }}€/h</td>
                    <td>{{ $servico->estimativa }}</td>
                    <td>
                        <ul class="acoes btn">
                            <li>
                                <a href="{{ route('servico.show', ['id' => $servico->id]) }}">
                                    <span class="material-icons">
                                        visibility
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('servico.edit', ['id' => $servico->id]) }}">
                                    <span class="material-icons">
                                        edit
                                    </span>
                                </a>
                            </li>
                            @if($servico->trashed())
                            <li>
                                <form action="{{ route('servicos.restore', ['id' => $servico->id]) }}" method="POST" style="display: inline;">
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
                                <!-- Excluir servico -->
                                <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $servico->id }}">
                                    <span class="material-icons">
                                        delete
                                    </span>
                                </button>
                            </li>
                            @endif
                        </ul>
                    </td>
                </tr>
                <!-- Modal de confirmação para exclusão -->
                <div class="modal fade" id="deleteModal{{ $servico->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $servico->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $servico->id }}">Confirmar Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Tem certeza de que deseja apagar o serviço <strong>{{$servico->nome}}</strong> de <strong>{{$servico->categoria->nome}}</strong>?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST">
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
        {{ $servicos->links() }}
</div>
@endsection