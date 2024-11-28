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
        <h1>Reparações</h1>
        <a href="{{ route('reparacao.new') }}">Nova Reparação</a>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Equipamento</th>
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
                    <td class="acoes btn">
                        <a href="{{ route('reparacao.show', ['id' => $reparacao->id]) }}">
                            <span class="material-icons">
                                visibility
                            </span>
                        </a>
                        <a href="{{ route('reparacao.edit', ['id' => $reparacao->id]) }}">
                            <span class="material-icons">
                                edit
                            </span>
                        </a>
                        <button form="reparacoes-delete" type="submit">
                                <span class="material-icons">
                                    delete
                                </span>
                        </button>
                    </td>
                    <!-- Adicione outros campos relevantes -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <form action="{{ route('reparacao.destroy', ['id' => $reparacao->id]) }}" name="reparacoes-delete" id="reparacoes-delete" method="POST">
        @method('DELETE')
        @csrf
    </form>
</div>
@endsection
