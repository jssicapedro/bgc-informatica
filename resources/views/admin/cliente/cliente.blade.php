@extends('layout.layout')

@section('title', 'BGCInformatica')

<!-- css -->
@push('links')
<link rel="stylesheet" href="{{ asset('css/tabel_pag.css') }}">
@endpush

<!-- js -->
@push('scripts')
<script>
    function printAllClients() {
        // Realiza a requisição AJAX para obter todos os clientes
        fetch("/clientes/all")
            .then(response => response.json()) // Converte a resposta para JSON
            .then(clientes => {
                // Cria o HTML da tabela com todos os clientes
                let tableHTML = `
                     <img src="{{ asset('img/nav/logotipo.png') }}" alt="Logotipo BGCInformatica">
                        <h1>Todos os Clientes</h1>
                        <table border="1" cellspacing="0" cellpadding="8">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                </tr>
                            </thead>
                            <tbody>
                    `;

                // Preenche a tabela com os dados de todos os clientes
                clientes.forEach(cliente => {
                    tableHTML += `
                            <tr>
                                <td>${cliente.id}</td>
                                <td>${cliente.nome}</td>
                                <td>${cliente.email}</td>
                                <td>${cliente.telefone}</td>
                            </tr>
                        `;
                });

                tableHTML += '</tbody></table>';

                // Abre a janela de impressão com a tabela gerada
                let printWindow = window.open('', '', 'height=600,width=800');
                printWindow.document.write('<html><head><title>Imprimir Todos os Clientes</title>');
                printWindow.document.write('<style>table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid #ddd; padding: 8px; text-align: left; } th { background-color: #f2f2f2; }</style>');
                printWindow.document.write('</head><body>');
                printWindow.document.write(tableHTML); // Insere a tabela com todos os clientes
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
            })
            .catch(error => console.error('Erro ao carregar os clientes:', error));
    }
</script>
@endpush

@section('main')
<div class="container table_view">
    <div class="pag_new">
        <h1>Clientes</h1>
        <div class="w-50 d-flex justify-content-end">
            <button onclick="printAllClients()" class="btn btn-secondary me-3">Imprimir Clientes</button>
            <a href="{{ route('cliente.new') }}">Novo cliente</a>
        </div>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telemóvel</th>
                    <th>Morada</th>
                    <th>NIF</th>
                    <th>-</th>
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
                    <td>
                        <ul class="acoes btn">
                            <li>
                                <a href="{{ route('cliente.show', ['id' => $cliente->id]) }}">
                                    <span class="material-icons">
                                        visibility
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cliente.edit', ['id' => $cliente->id]) }}">
                                    <span class="material-icons">
                                        edit
                                    </span>
                                </a>
                            </li>
                            @if($cliente->trashed())
                            <li>
                                <!-- Restaura o técnico -->
                                <form action="{{ route('cliente.restore', ['id' => $cliente->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn text-warning">
                                        <span class="material-icons">
                                            history
                                        </span>
                                    </button>
                                </form>
                            </li>
                            @else
                            <li>
                                <!-- Excluir técnico -->
                                <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $cliente->id }}">
                                    <span class="material-icons">
                                        delete
                                    </span>
                                </button>
                            </li>
                            @endif
                        </ul>
                    </td>
                </tr>

                <!-- Modal de confirmação -->
                <div class="modal fade" id="deleteModal{{ $cliente->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $cliente->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $cliente->id }}">Confirmar Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Tem certeza de que deseja apagar o cliente <strong>{{ $cliente->nome }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Apagar</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Links de paginação -->
    {{ $clientes->links() }}
</div>
@endsection