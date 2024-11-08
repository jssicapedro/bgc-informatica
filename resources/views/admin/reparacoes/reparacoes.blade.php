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
<div class="container">
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
                    <th>Estado</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reparacoes as $reparacao)
                <tr>
                    <td>{{ $reparacao->id }}</td>
                    <td>{{ $reparacao->equipamento_id }}</td>
                    <td>{{ $reparacao->servico_id }}</td>
                    <td>{{ $reparacao->estado }}</td>
                    <td class="acoes btn">
                        <a href="{{ route('reparacao.show', ['id' => $reparacao->id]) }}">
                            <span class="material-icons">
                                visibility
                            </span>
                        </a>
                        <a href="">
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
</div>
@endsection