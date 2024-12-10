<!DOCTYPE html>
<html lang="en">

<head>
    <title> BGC Informática </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/nav/logotipo.png') }}" type="image/jpg">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">

</head>

<body>
    <!-- Navbar adaptada -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="navbar-left">
            <img src="{{ asset('img/nav/logotipo.png') }}" alt="Logotipo" class="logo">
            <h1 class="nav-title">BGC Informática</h1>
        </div>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" aria-label="Toggle navigation" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-right collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-flex">
                    <a class="nav-link me-3" href="#quemSomos">QUEM SOMOS</a>
                </li>
                <li class="nav-item d-flex">
                    <a class="nav-link me-3" href="#servicos">SERVIÇOS</a>
                </li>
                <li class="nav-item d-flex">
                    <a class="nav-link me-3" href="#orcamento">ORÇAMENTO</a>
                </li>
                <li class="nav-item d-flex">
                    <a class="nav-link me-3" href="#contactos">CONTACTOS</a>
                </li>
                <li class="nav-item d-flex">
                    <a class="nav-link rma me-3" href="{{ route('consultar.rma') }}">CONSULTAR RMA</a>
                </li>
        </div>
    </nav>


    <div class="banner">
        <img class="bgc-image" src="{{asset('img/index/loja.jpg')}}" alt="Imagem">
    </div>


    <br>
    <br>

    <h1 id="quemSomos" class="titulo"> > Quem Somos? </h1>

    <br>
    <br>

    <div class="about">
        <div>
            <p> Somos uma loja especializada na venda de equipamentos e consumíveis informáticos, bem como na prestação de serviços de reparação e manutenção de dispositivos tecnológicos. Localizados na Avenida Manuel Xavier, nº 2, estamos ao seu dispor desde 2009, com o compromisso de oferecer soluções de qualidade, tanto para empresas como para clientes individuais.
                Ao longo dos anos, temos consolidado uma sólida reputação no mercado, pautando-nos por valores que são a base do nosso trabalho: rigor, experiência, atenção, dedicação e confiança. Estes princípios guiam todas as nossas ações, desde a escolha dos produtos que comercializamos até à forma como prestamos suporte técnico, garantindo sempre o melhor atendimento e a máxima satisfação dos nossos clientes. </p>

            <img src="{{asset('img/nav/logotipo.png')}}" alt="Logotipo">

        </div>

        <div>
            <img src="{{asset('img/index/images.png')}}" alt="Escritorio">

            <p> Seja para o seu negócio ou para o seu uso pessoal, temos as melhores opções e um serviço especializado para assegurar que os seus equipamentos informáticos funcionem de forma eficaz e segura. Estamos prontos para atender às suas necessidades, oferecendo a atenção personalizada que cada cliente merece, com a experiência e o conhecimento necessários para proporcionar soluções rápidas e eficientes.
                Conte connosco para as suas necessidades informáticas. O nosso compromisso com a excelência está refletido no serviço que prestamos, com a confiança de quem sabe que, desde 2009, estamos aqui para ajudar a otimizar e manter o seu equipamento sempre em ótimo estado. </p>


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
                    <div class="tamanhoImagem">
                        <img class="servico_img" src="{{asset('img/index/servicos1.jpg')}}"
                            alt="">
                    </div>
                    <p class="title"> <b> Venda de equipamentos informáticos e periféricos </b> </p>
                    <p class="legenda"> Disponibilizamos uma ampla gama de equipamentos e acessórios informáticos de alta qualidade para melhorar a sua experiência tecnológica. </p>
                </div>
                <div class="imagem">
                    <div class="tamanhoImagem">
                        <img class="servico_img" src="{{asset('img/index/servicos2.jpg')}}"
                            alt="">
                    </div>
                    <p class="title"> <b> Venda de equipamentos em primeira e segunda mão </b> </p>
                    <p class="legenda"> Oferecemos equipamentos novos e usados, como monitores, impressoras, ratos e pen drives, com preços acessíveis e garantia de qualidade. </p>
                </div>
                <div class="imagem">
                    <div class="tamanhoImagem">
                        <img class="servico_img" class="servico_img" src="{{asset('img/index/servicos3.jpg')}}"
                            alt="">
                    </div>
                    <p class="title"> <b> Encomendas em 24h </b> </p>
                    <p class="legenda"> Garantimos a entrega de equipamentos em até 24 horas, para que você tenha o que precisa com rapidez. </p>
                </div>
            </div>
            <div class="row">
                <div class="imagem">
                    <div class="tamanhoImagem">
                        <img class="servico_img" src="{{asset('img/index/servicos4.jpg')}}"
                            alt="">
                    </div>
                    <p class="title"> <b> Venda de consumíveis </b> </p>
                    <p class="legenda"> Temos uma variedade de consumíveis, como toners, cartuchos e cabos, das melhores marcas para garantir o bom funcionamento dos seus dispositivos. </p>
                </div>
                <div class="imagem">
                    <div class="tamanhoImagem">
                        <img class="servico_img" src="{{asset('img/index/servicos5.jpg')}}"
                            alt="">
                    </div>
                    <p class="title"> <b> Reparação de Equipamentos Informáticos </b> </p>
                    <p class="legenda"> Realizamos reparações rápidas e eficientes em computadores, laptops e impressoras, com diagnóstico preciso e consertos de qualidade. </p>
                </div>
                <div class="imagem">
                    <div class="tamanhoImagem">
                        <img class="servico_img" src="{{asset('img/index/servicos6.jpg')}}"
                            alt="">
                    </div>
                    <p class="title"> <b> Apoio a empresas </b> </p>
                    <p class="legenda"> Oferecemos serviços de instalação de redes, software de faturação e equipamentos informáticos, proporcionando soluções completas para o bom funcionamento da sua empresa. </p>
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


    <h1 id="produtos" class="titulo3"> > Parceiros BGC </h1>

    <br>
    <br>
    <br>

    <div class="container">
        <!--Imagens não podem ter mais de 200px de width ou serem quadradas. Ex: 500*500, penso que seja isso. Algo relacionado com width desformata o grid -->
        <img class="products" src="{{asset('img/index/prod1.png')}}" alt="Herd of horses">
        <img class="products" src="{{asset('img/index/prod2.png')}}" alt="Baby Elephant">
        <img class="products" src="{{asset('img/index/prod3.png')}}" alt="Koi Fish">
    </div>

    <br>
    <br>
    <br>

    <br>
    <br>
    <hr class="hr1">
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
    <h1 id="orcamento" class="titulo4"> > Orçamento</h1>
    <div class="container_or">
        <form action="{{ route('index') }}" method="GET">
            <div class="orcamento-row">
                <div class="orcamento-item">
                    <label for="dispositivo">Dispositivo</label>
                    <select id="dispositivo" name="dispositivo" class="form-control">
                        <option>Escolha o Dispositivo</option>
                        @foreach($dispositivos as $dispositivo)
                        <option value="{{ $dispositivo->id }}" {{ old('dispositivo->nome') == $dispositivo->id ? 'selected' : '' }}>
                            {{ $dispositivo->nome }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="orcamento-item">
                    <label for="servico">Serviço</label>
                    <select id="servico" name="servico" class="form-control">
                        <option value="{{ old('servico->nome') }}">Escolha o serviço para o seu problema</option>
                    </select>
                </div>
                <div class="orcamento-item">
                    <button type="submit" class="btn btn-primary">Calcular</button>
                </div>
            </div>
        </form>
        @if(isset($total))
        <div class="orcamento-result">
            <h3>Orçamento estimado:</h3>
            <p>Total: €{{ number_format($total, 2) }}</p>
        </div>
        @endif
    </div>
    <small class="small">Não incluindo taxas nem necessidade de encomendas</small>
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
        <div class="termos_politicas">
            <a href="{{ route('termosCondicoes') }}" target="_blank" rel="noopener noreferrer">Termos & Condições</a>
            <a href="{{ route('politicaPrivacidade') }}" target="_blank" rel="noopener noreferrer">Politica & Privacidade</a>
        </div>
        <p> © Copyright 2024 BGC Informática. </p>
    </footer>

    <!-- Incluir o jQuery (necessário para AJAX) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Quando o dispositivo for selecionado
            $('#dispositivo').on('change', function() {
                var dispositivoId = $(this).val(); // Pega o id do dispositivo selecionado

                if (dispositivoId) {
                    // Faz uma requisição AJAX para obter os serviços para o dispositivo selecionado
                    $.ajax({
                        url: '/api/servicos/' + dispositivoId,
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