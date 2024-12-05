<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-2">
        <div class="container">
            <!-- Logotipo -->
            <a class="navbar-brand" href="{{ asset('/calendario') }}">
                <img src="{{ asset('img/nav/logotipo.png') }}" alt="Logotipo BGCInformatica">
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clientes') }}">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('equipamentos') }}">Equipamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('marcas-modelos') }}">Marcas e Modelos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reparacoes') }}">RMA's</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('encomendas') }}">Encomendas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('servicos') }}">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categorias') }}">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tecnicos') }}">Técnicos</a>
                    </li>

                    <!-- logout -->
                    <li class="nav-item">
                        <a class="nav-link">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" style="border: none; background: none;">Logout</button>
                            </form>
                        </a>
                    </li>
                    <!-- /logout -->
                </ul>
            </div>
        </div>
    </nav>
</header>