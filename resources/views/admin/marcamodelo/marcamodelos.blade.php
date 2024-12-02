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
                    <td class="acoes btn">
                        <a href="{{ route('marcamodelo.edit', ['id' => $modelo_with_marca->id]) }}">
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
    <!-- Links de paginação -->
    {{ $modelos_with_marcas->links() }}
</div>
@endsection
