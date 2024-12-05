<html lang="pt">

<head>
    <title> BGC Informática </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/nav/logotipo.png') }}" type="image/jpg">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">

</head>

<body>
    <!-- Navbar adaptada -->
    <div class="navbar">
        <div class="navbar-left">
            <img src="{{ asset('img/nav/logotipo.png') }}" alt="Logotipo" class="logo">
            <h1 class="nav-title">BGC Informática</h1>
        </div>
        <div class="navbar-right">
            <a href="#quemSomos">QUEM SOMOS</a>
            <a href="#servicos">SERVIÇOS</a>
            <a href="#orcamento">ORÇAMENTO</a>
            <a href="#contactos">CONTACTOS</a>
            <a class="rma" href="{{ route('consultar.rma') }}">CONSULTAR RMA</a>
        </div>
    </div>

    <div class="banner">
        <img class="bgc-image" src="{{asset('img/index/loja.jpg')}}" alt="Imagem">
    </div>

    <br>
    <br>

    <h1 id="qemSomos" class="titulo"> > Quem Somos? </h1>

    <br>
    <br>

    <div class="about">
        <div>
            <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
                electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                Aldus PageMaker including versions of Lorem Ipsum. </p>

            <img src="{{asset('img/nav/logotipo2.png')}}" alt="Logotipo">

        </div>

        <div>
            <img src="{{asset('img/index/abstrat.jpg')}}" alt="Escritorio">

            <p> It is a long established fact that a reader will be distracted by the readable content of a page when
                looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
                letters, as opposed to using 'Content here, content here', making it look like readable English. Many
                desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a
                search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved
                over the years, sometimes by accident, sometimes on purpose (injected humour and the like). </p>


        </div>
    </div>

    <br>
    <br>

    <hr class="hr1">

    <br>
    <br>

    <h1 id="servicos" class="titulo2"> > Serviços </h1>

    <br>
    <br>
    <br>

    <div class="container">
        <div class="galeria">
            <div class="row">
                <div class="imagem">
                    <img class="servico_img" src="{{asset('img/index/img.png')}}"
                        alt="">
                    <p class="legenda">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit vero totam officia,
                        optio tempore,
                        sint nemo ipsa odio dolorum sequi expedita repudiandae reprehenderit voluptatem quaerat.</p>
                </div>
                <div class="imagem">
                    <img class="servico_img" src="{{asset('img/index/img3.png')}}"
                        alt="">
                    <p class="legenda">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit vero totam officia,
                        optio tempore,
                        sint nemo ipsa odio dolorum sequi expedita repudiandae reprehenderit voluptatem quaerat.</p>
                </div>
                <div class="imagem">
                    <img class="servico_img" class="servico_img" src="{{asset('img/index/img.png')}}"
                        alt="">
                    <p class="legenda">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit vero totam officia,
                        optio tempore,
                        sint nemo ipsa odio dolorum sequi expedita repudiandae reprehenderit voluptatem quaerat.</p>
                </div>
            </div>
            <div class="row">
                <div class="imagem">
                    <img class="servico_img" src="{{asset('img/index/img3.png')}}"
                        alt="">
                    <p class="legenda">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit vero totam officia,
                        optio tempore,
                        sint nemo ipsa odio dolorum sequi expedita repudiandae reprehenderit voluptatem quaerat.</p>
                </div>
                <div class="imagem">
                    <img class="servico_img" src="{{asset('img/index/img.png')}}"
                        alt="">
                    <p class="legenda">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit vero totam officia,
                        optio tempore,
                        sint nemo ipsa odio dolorum sequi expedita repudiandae reprehenderit voluptatem quaerat.</p>
                </div>
                <div class="imagem">
                    <img class="servico_img" src="{{asset('img/index/img3.png')}}"
                        alt="">
                    <p class="legenda">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit vero totam officia,
                        optio tempore,
                        sint nemo ipsa odio dolorum sequi expedita repudiandae reprehenderit voluptatem quaerat.</p>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>

    <hr class="hr2">

    <br>
    <br>
    <br>

    <h1 id="produtos" class="titulo3"> > Produtos </h1>

    <br>
    <br>
    <br>

    <div class="container">
        <img class="products" src="{{asset('img/index/img5.jpg')}}" alt="Herd of horses">
        <img class="products" src="{{asset('img/index/img4.jpg')}}" alt="Baby Elephant">
        <img class="products" src="{{asset('img/index/img5.jpg')}}" alt="Koi Fish">
        <img class="products" src="{{asset('img/index/img4.jpg')}}" alt="Ibis Bird">
        <img class="products" src="{{asset('img/index/img5.jpg')}}" alt="Lemur">
        <img class="products" src="{{asset('img/index/img4.jpg')}}" alt="Berber Monkeys">
    </div>

    <br>
    <br>
    <br>

    <br>
    <br>

    <div>
        <img class="image2" src="{{asset('img/index/loja2.jpg')}}" alt="Imagem">
    </div>

    <br>
    <br>
    <br>


    <br>
    <br>
    <br>
    <h1 id="orcamento" class="titulo4"> > Orçamento </h1>
    <small class="small">Não incluindo taxas nem necessidade de encomendas</small>
    <br>
    <br>
    <br>

    <div class="container_or">
        <form action="{{ route('index') }}" method="GET">
            <div class="orcamento">
                <label for="dispositivo">Dispositivos</label>
                <select id="dispositivo" name="dispositivo" class="form-control">
                    <option>Escolha o Dispositivo</option>
                    @foreach($dispositivos as $dispositivo)
                    <option
                        value="{{ $dispositivo->id }}" {{ old('dispositivo->nome') == $dispositivo->id ? 'selected' : '' }}>
                        {{ $dispositivo->nome }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="orcamento">
                <label for="servico">Serviço</label>
                <select id="servico" name="servico" class="form-control">
                    <option value="{{ old('servico->nome') }}">Escolha o serviço para o seu problema</option>
                    <!-- A lista de serviços será populada dinamicamente via AJAX -->
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Calcular Orçamento</button>
        </form>

        <!-- Exibir o orçamento calculado -->
        @if(isset($total))
        <div class="orcamento">
            <h3>Orçamento estimado:</h3>
            <p>Total: €{{ number_format($total, 2) }}</p>
        </div>
        @endif
    </div>

    <br>
    <br>
    <br>

    <hr class="hr3">

    <br>
    <br>
    <br>

    <h1 id="contactos" class="titulo5"> > Contactos </h1>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4773.268331621087!2d-8.839642587073088!3d41.87734247112207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd25bfc6be0e8c57%3A0xee9d2604bf037558!2sBGCINFORM%C3%81TICA!5e1!3m2!1spt-PT!2spt!4v1732645811942!5m2!1spt-PT!2spt"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>

    <footer>
        <div class="info">
            <p>&#128231: bgc@gmail.com;</p>
            <p> &#128205: Rua da Vida, Localidade 8200-852;</p>
            <div class="time">
                <p>&#128338:</p>
                <p>Seg a Sex: 8:30-13:00 e das 14:30-18:30 <br> Sáb a Dom: Encerrados;</p>
            </div>
        </div>
        <p> © Copyright 2024 BGC Informática. </p>
    </footer>

    <!-- Incluir o jQuery (necessário para AJAX) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Quando o dispositivo for selecionado
            $('#dispositivo').on('change', function() {
                var dispositivoId = $(this).val(); // Pega o id do dispositivo selecionado

                if (dispositivoId) {
                    // Faz uma requisição AJAX para obter os serviços para o dispositivo selecionado
                    $.ajax({
                        url: '{{ url('servicos') }}/' + dispositivoId,
                        method: 'GET',
                        success: function(response) {
                            // Limpa o select de serviços
                            $('#servico').empty();

                            // Adiciona um item padrão
                            $('#servico').append('<option value="">Escolha o serviço para o seu problema</option>');

                            // Preenche o select de serviços com as opções retornadas
                            $.each(response, function(index, servico) {
                                $('#servico').append('<option value="' + servico.id + '">' + servico.nome + '</option>');
                            });
                        },
                        error: function(xhr) {
                            alert('Erro ao carregar os serviços!');
                        }
                    });
                } else {
                    // Se nenhum dispositivo for selecionado, limpa o select de serviços
                    $('#servico').empty();
                    $('#servico').append('<option value="">Escolha o serviço para o seu problema</option>');
                }
            });
        });
    </script>
</body>

</html>