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
<div class="container">
    <div class="pag_new">
        <h1>Clientes</h1>
        <a href="{{ route('cliente.new') }}">Novo contato</a>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th class="nome">Nome</th>
                    <th class="email">Email</th>
                    <th class="tel">Telemóvel</th>
                    <th class="morada">Morada</th>
                    <th class="nif">NIF</th>
                    <th class="acoes">-</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telemovel }}</td>
                    <td>{{ $cliente->morada }}</td>
                    <td>{{ $cliente->nif }}</td>
                    <td class="acoes btn">
                        <a href="{{ route('cliente.show', ['id' => $cliente->id]) }}">
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection