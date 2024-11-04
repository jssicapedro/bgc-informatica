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
        <h1>Orçamentos</h1>
        <a href="">Novo Orçamento</a>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th class="nome">Reparação_id</th>
                    <th class="email">Valor</th>
                    <th class="tel">Descrição</th>
                    <th class="morada">Data de Emissão</th>
                    <th class="nif">Estado</th>
                    <th class="acoes">-</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orcamentos as $orcamento)
                <tr>
                    <td>{{ $orcamento->id }}</td>
                    <td>{{ $orcamento->reparacao_id }}</td>
                    <td>{{ $orcamento->valor }}</td>
                    <td>{{ $orcamento->descricao }}</td>
                    <td>{{ $orcamento->dataEmissao }}</td>
                    <td>{{ $orcamento->estado }}</td>
                    <td class="acoes btn">
                        <a href="{{ route('orcamento.show', ['id' => $orcamento->id]) }}">
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