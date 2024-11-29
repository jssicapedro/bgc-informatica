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
        <h1>Categorias</h1>
        <a href="{{ route('categoria.new') }}">Nova Categoria</a>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr class="{{ $categoria->trashed() ? 'text-danger' : '' }}">
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nome }}</td>
                    <td>
                        <ul class="acoes btn">
                            <li>
                                <a href="{{ route('categoria.edit', $categoria->id) }}">
                                    <span class="material-icons">
                                        edit
                                    </span>
                                </a>
                            </li>
                            @if($categoria->trashed())
                                <li>
                                    <form action="{{ route('categorias.restore', ['id' => $categoria->id]) }}" method="POST" style="display: inline;">
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
                                    <!-- Excluir categoria -->
                                    <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $categoria->id }}">
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
                <div class="modal fade" id="deleteModal{{ $categoria->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $categoria->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $categoria->id }}">Confirmar Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Tem certeza de que deseja apagar a categoria <strong>{{ $categoria->nome }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
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
    {{ $categorias->links() }}
</div>
@endsection