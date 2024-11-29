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
        <h1>Técnicos</h1>
        <a href="{{ route('tecnico.new') }}">Novo Técnico</a>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telemóvel</th>
                    <th>Especialidade</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tecnicos as $tecnico)
                <tr class="{{ $tecnico->trashed() ? 'text-danger' : '' }}">
                    <td>{{ $tecnico->id }}</td>
                    <td>{{ $tecnico->nome }}</td>
                    <td>{{ $tecnico->email }}</td>
                    <td>{{ $tecnico->telemovel }}</td>
                    <td>{{ $tecnico->especialidade }}</td>
                    <td>
                        <ul class="acoes btn">
                            <li>
                                <a href="{{ route('tecnico.show', ['id' => $tecnico->id]) }}">
                                    <span class="material-icons">
                                        visibility
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('tecnico.edit', ['id' => $tecnico->id]) }}">
                                    <span class="material-icons ">
                                        edit
                                    </span>
                                </a>
                            </li>
                            <!-- Exibição da opção de restaurar ou excluir dependendo se o técnico foi excluído -->
                            @if($tecnico->trashed())
                                <li>
                                    <!-- Restaura o técnico -->
                                    <form action="{{ route('tecnico.restore', ['id' => $tecnico->id]) }}" method="POST" style="display: inline;">
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
                                <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $tecnico->id }}">
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
                <div class="modal fade" id="deleteModal{{ $tecnico->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $tecnico->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $tecnico->id }}">Confirmar Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Tem certeza de que deseja apagar o técnico <strong>{{ $tecnico->nome }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('tecnico.destroy', $tecnico->id) }}" method="POST">
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
    {{ $tecnicos->links() }}
</div>
@endsection