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
        <a href="">Nova Reparação</a>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th class="nome">Equipamento</th>
                    <th class="email">Tipo de Serviço</th>
                    <th class="tel">Estado</th>
                    <th class="acoes">-</th>
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