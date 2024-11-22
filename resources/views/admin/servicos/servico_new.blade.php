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
                            {{ $categoria->nome }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="email">
            <label for="nome" class="form-label">Nome do Serviço:</label>
            <select class="form-control" id="nome" name="nome">
                <option value="">Selecione o serviço</option>
                @foreach(App\Models\Servico::LISTA_SERVICOS as $servico) <!-- Supondo que "nome" seja o enum no modelo -->
                    <option value="{{ $servico }}"
                            {{ old('nome') == $servico ? 'selected' : '' }}>
                        {{ $servico }} <!-- Exibindo as opções do enum -->
                    </option>
                @endforeach
            </select>
        </div>
            </div>
            <div class="email_tel">
                <div class="tel">
                    <label for="custo" class="form-label">Custo (€/h):</label>
                    <input type="number" class="form-control" id="custo" name="custo" value="{{ old('custo') }}" step="0.01" min="0">
                </div>
                <div class="tel">
                    <label for="estimativa" class="form-label">Estimativa (em minutos):</label>
                    <input type="number" class="form-control" id="estimativa" name="estimativa" value="{{ old('estimativa') }}" step="0.01" min="0">
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
