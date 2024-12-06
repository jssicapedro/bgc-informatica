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
        <h1>Reparações</h1>
        <a href="{{ route('reparacao.new') }}">Nova Reparação</a>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Equipamento</th>
                    <th>Cliente</th>
                    <th>Tipo de Serviço</th>
                    <th>Tecnico responsável</th>
                    <th>Estado</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reparacoes as $reparacao)
                <tr>
                    <td>{{ $reparacao->id }}</td>
                    <td>{{ $reparacao->equipamento->modelo->marca->nome }}, {{ $reparacao->equipamento->modelo->nome }}</td>
                    <td>{{ $reparacao->equipamento?->cliente?->nome ?? 'Cliente desconhecido' }}</td>
                    <td>
                        @if($reparacao->servicos->count() > 0)
                        @foreach($reparacao->servicos as $servico)
                        @if($reparacao->servicos->count() > 1)
                        {{ (isset($servico)) ? $servico->nome : 'Sem serviços' }} ,
                        @else
                        {{ (isset($servico)) ? $servico->nome : 'Sem serviços' }}
                        @endif
                        @endforeach
                        @else
                        Sem serviços
                        @endif
                    </td>
                    <td>
                        @if($reparacao->tecnicos->isEmpty())
                        Sem técnico
                        @else
                        {{ $reparacao->tecnico_responsavel->nome  }}
                        @endif
                    </td>
                    <td>{{ $reparacao->estado }}</td>
                    <td>
                        <ul class="acoes btn">
                            <li>
                                <a href="{{ route('reparacao.show', ['id' => $reparacao->id]) }}">
                                    <span class="material-icons">
                                        visibility
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reparacao.edit', ['id' => $reparacao->id]) }}">
                                    <span class="material-icons">
                                        edit
                                    </span>
                                </a>
                            </li>
                            @if($reparacao->trashed())
                            <li>
                                <!-- Restaura o técnico -->
                                <form action="{{ route('reparacao.restore', ['id' => $reparacao->id]) }}" method="POST" style="display: inline;">
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
                                <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $reparacao->id }}">
                                    <span class="material-icons">
                                        delete
                                    </span>
                                </button>
                            </li>
                            @endif
                        </ul>
                    </td>
                    <!-- Adicione outros campos relevantes -->
                </tr>

                <!-- Modal de confirmação -->
                <div class="modal fade" id="deleteModal{{ $reparacao->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $reparacao->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $reparacao->id }}">Confirmar Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Tem certeza de que deseja apagar a reparação do equipamento <strong>{{ $reparacao->equipamento?->modelo?->marca?->nome ?? 'Marca desconhecida' }},
                                    {{ $reparacao->equipamento?->modelo?->nome ?? 'Modelo desconhecido' }}</strong> de <strong>{{ $reparacao->equipamento?->cliente?->nome ?? 'Cliente desconhecido' }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('reparacao.destroy', $reparacao->id) }}" method="POST">
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
    {{ $reparacoes->links() }}
</div>
@endsection