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
        <h1>Marcas e Modelos</h1>
        <a href="{{ route('marcamodelo.new') }}">Nova Marca/Modelo</a>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                @foreach($modelos_with_marcas as $modelo_with_marca)
                <tr>
                    <td>{{ $modelo_with_marca->id }}</td>
                    <td>{{ $modelo_with_marca->marca->nome }}</td>
                    <td>{{ $modelo_with_marca->nome }}</td>
                    <td>
                        <ul class="acoes btn">
                            <li>
                                <a href="{{ route('marcamodelo.edit', ['id' => $modelo_with_marca->id]) }}">
                                    <span class="material-icons">
                                        edit
                                    </span>
                                </a>
                            </li>
                            @if($modelo_with_marca->trashed())
                            <li>
                                <form action="{{ route('marcamodelo.restore', ['id' => $modelo_with_marca->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn text-warning">
                                        <span class="material-icons">history</span>
                                    </button>
                                </form>
                            </li>
                            @else
                            <li>
                                <!-- Excluir técnico -->
                                <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $modelo_with_marca->id }}">
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
                <div class="modal fade" id="deleteModal{{ $modelo_with_marca->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $modelo_with_marca->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $modelo_with_marca->id }}">Confirmar Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Tem certeza de que deseja apagar o modelo <strong>{{ $modelo_with_marca->nome }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('marcamodelo.destroy', $modelo_with_marca->id) }}" method="POST">
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
    {{ $modelos_with_marcas->links() }}
</div>
@endsection