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
        <h1>Tecnicos</h1>
        <a href="">Novo Tecnico</a>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th class="nome">Nome</th>
                    <th class="email">Email</th>
                    <th class="tel">Telemóvel</th>
                    <th class="morada">Especialidade</th>
                    <th class="acoes">-</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tecnicos as $tecnico)
                <tr>
                    <td>{{ $tecnico->id }}</td>
                    <td>{{ $tecnico->nome }}</td>
                    <td>{{ $tecnico->email }}</td>
                    <td>{{ $tecnico->telemovel }}</td>
                    <td>{{ $tecnico->especialidade }}</td>
                    <td class="acoes btn">
                        <a href="{{ route('tecnico.show', ['id' => $tecnico->id]) }}">
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