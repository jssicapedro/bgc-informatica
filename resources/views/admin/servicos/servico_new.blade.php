@extends('layout.layout')

@section('title', 'BGCInformatica')

<!-- css -->
@push('links')
<link rel="stylesheet" href="{{ asset('css/tabel_pag.css') }}">
<link rel="stylesheet" href="{{ asset('css/formulario_pag.css') }}">
<link rel="stylesheet" href="{{ asset('css/pag_view.css') }}">
@endpush

<!-- js -->
@push('scripts')
@endpush

@section('main')
<div class="container">
    <div class="pag_new pag_list">
        <a href="{{ route('servicos') }}">Voltar à listagem</a>
        <h1>Criar um novo serviço</h1>
    </div>
    <form action="{{ route('servico.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <div class="info">
            <div class="email_tel">
                <div class="email">
                    <label for="categoria_id" class="form-label">Pertence a que categoria?</label>
                    <select class="form-control" id="categoria_id" name="categoria_id">
                        <option value="">Selecione a categoria</option>
                        @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->id }} - {{ $categoria->categoria }} <!-- Exibindo id e nome da categoria -->
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="email">
            <label for="NomeServico" class="form-label">Nome do Serviço:</label>
            <select class="form-control" id="NomeServico" name="NomeServico">
                <option value="">Selecione o serviço</option>
                @foreach(App\Models\Servico::NOMESERVICO as $nomeServico) <!-- Supondo que "NOMESERVICO" seja o enum no modelo -->
                    <option value="{{ $nomeServico }}" 
                            {{ old('NomeServico') == $nomeServico ? 'selected' : '' }}>
                        {{ $nomeServico }} <!-- Exibindo as opções do enum -->
                    </option>
                @endforeach
            </select>
        </div>
            </div>
            <div class="email_tel">
                <div class="tel">
                    <label for="custo" class="form-label">Custo:</label>
                    <input type="number" class="form-control" id="custo" name="custo" value="{{ old('custo') }}" step="0.01" min="0">
                </div>
            </div>
            <div class="tel">
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-submit">Add serviço</button>
    </form>
</div>
@endsection