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
                    <td class="acoes btn">
                        <a href="{{ route('servico.show', ['id' => $servico->id]) }}">
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
