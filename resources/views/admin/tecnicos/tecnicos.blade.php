@extends('layout.layout')

@section('title', 'BGCInformatica')

<!-- css -->
@push('links')
<link rel="stylesheet" href="{{ asset('css/tabel_pag.css') }}">
@endpush

<!-- js -->
@push('scripts')
@vite(['resources/js/app.js', 'resources/css/app.css'])
<script>
    $('#confirmDeleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Botão que acionou o modal
        var tecnicoId = button.data('id'); // Pega o ID do técnico
        var actionUrl = '{{ route('tecnico.destroy', ':id') }}'; // Nova URL de exclusão
        actionUrl = actionUrl.replace(':id', tecnicoId); // Substitui :id pelo ID real do técnico

        var form = $('#deleteForm');
        form.attr('action', actionUrl); // Atualiza a URL de ação do formulário
    });
</script>
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
                                <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="{{ $tecnico->id }}">
                                    <span class="material-icons text-danger">delete</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </td>
                    <!-- Adicione outros campos relevantes -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>





<!-- Modal de Confirmação -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão de {{ $tecnico->nome }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza de que deseja excluir este técnico? Esta ação não pode ser desfeita.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form id="deleteForm" action="{{ route('tecnico.destroy', $tecnico->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')  <!-- Força o método DELETE -->
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection