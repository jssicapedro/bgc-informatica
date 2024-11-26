<!DOCTYPE html>
<html lang="en">

<head>
  <title> BGC Informática </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css/index.css')}}">

</head>

<body>

  <div class="topnav">
    <a href="">QUEM SOMOS</a>
    <a href="">SERVIÇOS</a>
    <a href="">PRODUTOS</a>
    <a href="">ORÇAMENTO</a>
    <a href="">CONTACTOS</a>
  </div>

  <div class="banner">
    <img class="bgc-image" src="{{asset('img/index/img2 copy.jpg')}}" alt="Imagem">
  </div>

  <br>
  <br>

  <h1 class="titulo"> > Quem Somos? </h1>

  <br>
  <br>

  <div class="about">
    <div>
      <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>

      <img src="{{asset('img/nav/logotipo2.png')}}" alt="Logotipo">

    </div>

    <div>
      <img src="{{asset('img/index/abstrat.jpg')}}" alt="Escritorio">

      <p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). </p>



    </div>
  </div>

  <br>
  <br>

  <hr class="hr1">

  <br>
  <br>

  <h1 class="titulo2"> > Serviços </h1>

  <br>
  <br>
  <br>

  <div class="container">
    <div class="galeria">
      <div class="row">
        <div class="imagem">
          <img class="servico_img" src="{{asset('img/index/img.png')}}"
            alt="">
          <p class="legenda">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit vero totam officia, optio tempore,
            sint nemo ipsa odio dolorum sequi expedita repudiandae reprehenderit voluptatem quaerat.</p>
        </div>
        <div class="imagem">
          <img class="servico_img" src="{{asset('img/index/img3.png')}}"
            alt="">
          <p class="legenda">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit vero totam officia, optio tempore,
            sint nemo ipsa odio dolorum sequi expedita repudiandae reprehenderit voluptatem quaerat.</p>
        </div>
        <div class="imagem">
          <img class="servico_img" class="servico_img" src="{{asset('img/index/img.png')}}"
            alt="">
          <p class="legenda">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit vero totam officia, optio tempore,
            sint nemo ipsa odio dolorum sequi expedita repudiandae reprehenderit voluptatem quaerat.</p>
        </div>
      </div>
      <div class="row">
        <div class="imagem">
          <img class="servico_img" src="{{asset('img/index/img3.png')}}"
            alt="">
          <p class="legenda">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit vero totam officia, optio tempore,
            sint nemo ipsa odio dolorum sequi expedita repudiandae reprehenderit voluptatem quaerat.</p>
        </div>
        <div class="imagem">
          <img class="servico_img" src="{{asset('img/index/img.png')}}"
            alt="">
          <p class="legenda">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit vero totam officia, optio tempore,
            sint nemo ipsa odio dolorum sequi expedita repudiandae reprehenderit voluptatem quaerat.</p>
        </div>
        <div class="imagem">
          <img class="servico_img" src="{{asset('img/index/img3.png')}}"
            alt="">
          <p class="legenda">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit vero totam officia, optio tempore,
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

  <h1 class="titulo3"> > Produtos </h1>

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
    <img class="image2" src="{{asset('img/index/img1.jpg')}}" alt="Imagem">
  </div>

  <br>
  <br>
  <br>

  <h1 class="titulo4"> > Orçamento </h1>

  <br>
  <br>
  <br>

  <div class="container_or">
    <div class="orcamento">
      <label for=""> Dispositivos </label>
      <select>
        <option> Esolha o Dispositivo </option>
        @foreach($dispositivos as $dispositivo)
        <option> {{$dispositivo -> nome}} </option>
        @endforeach
      </select>
    </div>

    <div class="orcamento">
      <label for="problemas"> Problemas </label>
      <select id="problemas" name="problema" class="form-control">
        <option value=""> Escolha o serviço para o seu problema </option>
        @foreach(\App\Models\Servico::LISTA_SERVICOS as $problema)
        <option value="{{ $problema }}">{{ $problema }}</option>
        @endforeach
      </select>
    </div>

    <div class="orcamento">
      <label for="estimativas"> Estimativas (em minutos) </label>
      <select id="estimativas" name="estimativa" class="form-control">
        <option value=""> Escolha a estimativa de tempo pretendida </option>
        @foreach($estimativas as $estimativa)
        <option> {{$estimativa -> estimativa}} </option>
        @endforeach
      </select>
    </div>

    <!-- Exibir Total -->
    @if($dispositivoSelecionado)
    <h4>Dispositivo Selecionado: {{ $dispositivos->find($dispositivoSelecionado)->nome }}</h4>
    <h5>Total Estimado: {{ number_format($total, 2, ',', '.') }}€</h5>
    @endif

  </div>

  <br>
  <br>
  <br>

  <hr class="hr3">

  <br>
  <br>
  <br>

  <h1 class="titulo5"> > Contactos </h1>

  <br>
  <br>
  <br>

  <p class="contactos">&#128231: bgc@gmail.com;</p>
  <p class="contactos"> &#128205: Rua da Vida, Localidade 8200-852;</p>
  <p class="contactos"> &#128338: Seg a Sex: 8:30-13:00 às 14:30-18:30 Sáb a Dom: Encerrados;</p>

  <footer>
    <p> © Copyright 2024 BGC Informática. </p>
  </footer>

</body>

</html>