<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar RMA</title>
    <link rel="stylesheet" href="{{ asset('css/rma.css') }}">
</head>

<body>

    <!-- Faixa de navegação -->
    <div class="navbar">
        <div class="navbar-left">
            <img src="{{ asset('img/nav/logotipo.png') }}" alt="Logotipo" class="logo">
            <h1>Consultar RMA</h1>
        </div>
        <div class="navbar-right">
            <a href="/" class="btn btn-secondary">Página Principal</a>
        </div>
    </div>

    <!-- Formulário para consulta do RMA -->
    <form method="POST" action="{{ route('consultar.rma') }}">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Seu Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome')}}" required>
            @error('nome')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Seu Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email')}}" required>
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="servico" class="form-label">Tipo de Serviço</label>
            <select name="servico" id="servico" class="form-control" required>
                <option value="">Selecione um serviço</option>
                @foreach($availableServicos as $servico)
                <option value="{{ $servico }}" {{ old('servico') == $servico ? 'selected' : '' }}>
                    {{ $servico }}
                </option>
                @endforeach
            </select>
            @error('servico')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Consultar RMA</button>
    </form>

    <!-- Exibe os detalhes do RMA -->
    @if($rma)
    <div class="card mt-4">
        <div class="card-body">
            <p class="card-text"><strong>Marca:</strong> {{ $rma->equipamento->modelo->marca->nome }}</p>
            <p class="card-text"><strong>Modelo:</strong> {{ $rma->equipamento->modelo->nome }}</p>
            <p class="card-text"><strong>Data de Chegada:</strong> {{ $rma->dataChegada }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ $rma->estado }}</p>
            <p class="card-text"><strong>Descrição do Problema:</strong> {{ $rma->descricaoProblema }}</p>
            <p class="card-text"><strong>Mensagem:</strong> {{ $mensagem }}</p>
        </div>
    </div>
    @elseif(isset($mensagem))
    <div class="alert alert-danger mt-4">
        {{ $mensagem }}
    </div>
    @endif

    <footer>
        <div class="info">
        <p> © Copyright 2024 BGC Informática. </p>
    </footer>   
</body>

</html>
