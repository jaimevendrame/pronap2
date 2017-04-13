@extends('layouts.index')
@section('home')

<header class="header">
    <nav role="navigation" class="navbar navbar-default navbar-fixed-top navbar-inverse transparent ">
        <div class="container">

            <div class="navbar-header navbar-inner">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Navegação Responsiva</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand logo"><strong>PRONAP</strong></a>
            </div>

            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right menu">
                    <li><a onclick="$('#home').animatescroll({scrollSpeed:2000,easing:'easeOutBounce'});">Home</a></li>
                    <li><a onclick="$('#participar').animatescroll({scrollSpeed:2000,easing:'easeOutBounce'});">Como
                            Participar</a></li>
                    <li><a onclick="$('#cursos').animatescroll({scrollSpeed:2000,easing:'easeOutBounce'});">Cursos</a>
                    </li>
                    <li><a onclick="$('#certificado').animatescroll({scrollSpeed:2000,easing:'easeOutBounce'});">Certificados</a>
                    </li>
                    <li><a class="btn-menu add btn-enviar" href="" data-toggle="modal" data-target="#cadCandidato">CADASTRE-SE</a>
                    </li>
                    <li><a class="btn-menu" href="{{ url('/admin/login') }}">ENTRAR</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Final Menu -->
<div class="clear"></div>
<section id="home" class="slide text-center color-white">
    <div class=" container col-md-12">
        <h1 class="titulo-slide">Cadastra-se e concorra a bolsas de estudo e diversos prêmios.</h1>
        <p class="descricao-slide">Faça seu cadastro para ter acesso ao teste de lógica e assim
            concorrer a Bolsas de Estudos INTEGRAIS e PARCIAIS,
            SMARTPHONE, TABLET, SMARTWATCH , entre outros: (consulte a premiação em sua cidade)</p>
        <div class="col-md-6 text-right">
            <a class="btn-saiba-mais large"
               onclick="$('#pronap').animatescroll({scrollSpeed:2000,easing:'easeOutBounce'});">SAIBA MAIS SOBRE O
                PRONAP</a>
        </div>
        <div class="col-md-6 text-left">
            <a class="btn-saiba-mais add btn-enviar" data-toggle="modal" data-target="#cadCandidato"
               href="">CADASTRA-SE</a>
        </div>

    </div>
</section>
<!-- Final slide -->
<section id="pronap" class="slide background-color-white">
    <div class="container text-center col-md-12">
        <h1 class="titulo-slide"><strong>PRONAP</strong> </br> Programa Nacional de Apoio a Aprendizagem Profissional
        </h1>
        <div class="divider"></div>
        <p class="descricao-slide">O PRONAP é um programa de incentivo que foi desenvolvido para ajudar pessoas
            de todas as idades a se desenvolver profissionalmente através de cursos oferecidos
            por empresas parceiras do PRONAP em todo Brasil. As opções de cursos podem
            variar de acordo com as demandas identificadas em cada região. Os cursos
            oferecidos em parceria com PRONAP são gratuitos ou são oferecidos com bolsas
            parciais dependendo das parcerias estabelecidas em sua cidade.</p>

    </div>
</section>
<!--Final da section sobre-->

<section id="participar" class="slide background-parallax-detalhes color-white">
    <div class="container text-center col-md-12">
        <h1 class="titulo-slide">Como ganhar Bolsa Integral e concorrer a vários prêmios.</h1>
        <div class="divider"></div>
        <p class="descricao-slide">Infelizmente o programa não consegue atender a toda a demanda das cidades
            onde atua, então criamos um sistema de seleção de candidatos através de um rápido teste de lógica.
            Assim, para concorrer a uma bolsa de estudos e a diversos outros prêmios você precisa se cadastrar
            e responder a 9 perguntas de lógica, e os participantes que tiverem aproveitamento acima da média
            ganharão BOLSA DE ESTUDOS para um dos cursos oferecidos pelo programa e ainda concorrerão a vários
            prêmios que dependendo da sua cidade podem ser Smartphones, Tablet’s, Smartwatch (Relógios Android)
            entre outros.</p>
    </div>
</section>
<!--Final da section como ganhar-->
<section id="cursos" class="slide background-color-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <img class="img-responsive" src="{{url('assets/img/cursos.jpg')}}" alt="">
                </div>
                <div class="col-md-6">
                    <h1 class="titulo">Cursos disponíveis.</h1>
                    <div class="divider"></div>
                    <p class="descricao">Temos mais de 50 cursos para atender as mais diversas demandas do mercado,
                        para atender ao aluno que deseja iniciar na área de informática, como também o profissional
                        que deseja se especializar.
                        Cursos na área de informática e administrativos.</p>
                    <div class="text-center">
                        <button type="button" class="btn btn-danger btn-lg"
                                data-toggle="modal" data-target="#cursosDisponiveis">
                            <i class="fa fa-laptop" aria-hidden="true"></i>
                            Conheça nossos cursos
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<section class="slide safe background-parallax-slide color-black">
    <div class="container text-center col-md-12">
        <h1 class="titulo titulo2">Por que buscar qualificação.</h1>
        <div class="divider"></div>
        <div class="row">
            <div class="col-md-4">
                <div class="embed-container">
                    <iframe width="560" height="315"
                            src="https://www.youtube.com/embed/_PmLN50c0Tc"
                            frameborder="0" allowfullscreen>
                    </iframe>
                </div>

            </div>
            <div class="col-md-4">
                <div class="embed-container">
                    <iframe width="560" height="315"
                            src="https://www.youtube.com/embed/57hJi533mHk?list=PL0h8psU9l0B-Kw89fvt9aJ-wpPD0dUurd"
                            frameborder="0" allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="col-md-4">
                <div class="embed-container">
                    <iframe width="560" height="315"
                            src="https://www.youtube.com/embed/qxjHku-4Yz4"
                            frameborder="0" allowfullscreen>
                    </iframe>
                </div>
            </div>

        </div>


    </div>
</section>
<!--Final da videos-->


<section id="certificado" class="slide background-color-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <img class="img-responsive" src="{{url('assets/img/content-img-03.png')}}" alt="">
                </div>
                <div class="col-md-6">
                    <h1 class="titulo">Certificados</h1>
                    <div class="divider"></div>
                    <p class="descricao">Os Cursos Livres de formação continuada do PRONAP, tem base Legal no Decreto
                        Nº 5.154, 23 de Julho de 2004, Art. 1º e 3º e de acordo com as normas do Ministério da Educação
                        (MEC) pela Resolução CNE nº 04/09, Art. 11º. Válido em todo Território Nacional.</p>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="contato-form">
    <div class="container text-center ">
        <h1 class="titulo color-white">Contato</h1>
        <div class="divider"></div>
        <p class="descricao color-white">Entre em contato e tenha todas as suas dúvidas respondidas<br>
            Responderemos o mais rápido possível</p>
    </div>

    <div class="contato-form">
        <form class="especializati-form">
            <input type="text" name="nome" placeholder="Seu Nome">
            <input type="email" name="email" placeholder="Seu E-mail">
            <textarea name="descricao" placeholder="Sua mensagem"></textarea>

            <input type="submit" name="enviar" value="Enviar">
        </form>
    </div>
</section>
<!--Contato-->





<div class="video-background">
    <div class="video-foreground">
        <iframe src="https://www.youtube.com/embed/W0LHTWG-UmQ?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=W0LHTWG-UmQ"
                frameborder="0" allowfullscreen></iframe>
    </div>
</div>



@endsection



