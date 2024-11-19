<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Logotipo -->
            <a class="navbar-brand" href="{{ asset('/calendario') }}">
                <img src="{{ asset('img/nav/logotipo.png') }}" alt="Logotipo BGCInformatica">
            </a>

            <!-- Menu -->
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('clientes') }}">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('equipamentos') }}">Equipamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('marcasmodelos') }}">Marcas e Modelos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('reparacoes') }}">RMA's</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('encomendas') }}">Encomendas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('servicos') }}">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('categorias') }}">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('tecnicos') }}">Técnicos</a>
                    </li>

                    <!-- logout -->
                    <li class="nav-item">
                        <a>
                            <form action="{{ route('tecnico.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link" style="border: none; background: none;">Logout</button>
                            </form>
                        </a>
                    </li>
                    <!-- /logout -->
                </ul>
            </div>
        </div>
    </nav>
</header>