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
                    <a class="navbar-brand logo"
                       onclick="$('#home').animatescroll({scrollSpeed:2000,easing:'easeOutBounce'});"><strong>pronap.info</strong></a>
                    {{--<a href="#" class="navbar-brand logo"><strong>pronap.info</strong></a>--}}
                </div>

                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right menu">

                        <li><a onclick="$('#participar').animatescroll({scrollSpeed:2000,easing:'easeOutBounce'});">Como
                                Participar</a></li>
                        <li>
                            <a onclick="$('#cursos').animatescroll({scrollSpeed:2000,easing:'easeOutBounce'});">Cursos</a>
                        </li>
                        <li><a onclick="$('#certificado').animatescroll({scrollSpeed:2000,easing:'easeOutBounce'});">Certificados</a>
                        </li>
                        <li><a href="/premios">Prêmios</a>
                        </li>
                        <li><a href="/empresas">Empresas Parceiras</a>
                        </li>
                        <li><a class="btn-menu add btn-enviar" href="" data-toggle="modal" data-target="#cadCandidato">CADASTRE-SE</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Final Menu -->
    <div class="clear"></div>
    <section id="home" class="slide text-center background-parallax-slide">
        <div class=" container col-md-12">
            <h1 class="titulo-slide">Cadastre-se e concorra a bolsas de estudo e diversos prêmios.</h1>
            <p class="descricao-slide">Faça seu cadastro para ter acesso ao teste seletivo e
                concorra a Bolsas de Estudo INTEGRAIS e PARCIAIS,
                SMARTPHONES, TABLETS, SMARTWATCHS (<a href="/premios">consulte a premiação</a>)</p>
            <div class="col-md-6 col-sm-12">
                <a class="btn-saiba-mais large"
                   onclick="$('#pronap').animatescroll({scrollSpeed:2000,easing:'easeOutBounce'});">SAIBA MAIS SOBRE O
                    PRONAP</a>
            </div>
            <div class="col-md-6 col-sm-12 btn-cad">
                <a class="btn-saiba-mais add btn-enviar" data-toggle="modal" data-target="#cadCandidato"
                   href="">CADASTRE-SE</a>
            </div>

        </div>
    </section>
    <!-- Final slide -->
    <section id="pronap" class="slide background-color-white">
        <div class="container text-center col-md-12">
            <h1 class="titulo-slide"><strong>PRONAP</strong> </br> Programa Nacional de Apoio a Aprendizagem
                Profissional
            </h1>
            <div class="divider"></div>
            <p class="descricao-slide">O Programa Nacional de Apoio a Aprendizagem Profissional distribui,
                através de empresas parceiras em todo Brasil, BOLSAS DE ESTUDO e diversos outros incentivos
                e premiações para ajudar pessoas de todas as idades a se preparar para o mercado de trabalho
                e assim disponibilizar mão de obra qualificada para atender as demandas das cidades onde atua
                e dessa maneira encurtar o caminho entre os participantes do projeto e as melhores oportunidades
                de emprego e renda, mudando a realidade social de quem participa do projeto.</p>

        </div>
    </section>
    <!--Final da section sobre-->

    <section id="participar" class="slide background-parallax-detalhes color-white">
        <div class="container text-center col-md-12">
            <h1 class="titulo-slide">Como ganhar Bolsa de Estudos e concorrer a vários prêmios.</h1>
            <div class="divider"></div>
            <p class="descricao-slide">Para concorrer às bolsas de estudo e vários prêmios você precisa
                se cadastrar e responder a um teste seletivo com apenas 5 perguntas objetivas. Quem obter
                resultados acima da média receberá as bolsas disponíveis para sua cidade e também concorre
                aos prêmios de incentivo.<br>
                Para se cadastrar clique aqui:<br><br
            </p>            <a class="btn-saiba-mais add btn-enviar"
                               data-toggle="modal" data-target="#cadCandidato"
                               href="">CADASTRE-SE</a>
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
                        <p class="descricao-slide">Temos mais de 50 cursos para atender as mais diversas demandas do
                            mercado,
                            para atender ao aluno que deseja iniciar na área de informática, como também o profissional
                            que deseja se especializar.
                            Cursos na área de informática, administrativos e inglês.</p>
                        <div class="text-center">
                            <a type="button" class="btn btn-danger btn-lg" href="/cursos-disponiveis">
                                <i class="fa fa-laptop" aria-hidden="true"></i>
                                Conheça nossos cursos
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>


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
                        <p class="descricao-slide">O PRONAP oferece cursos de formação continuada que tem
                            base Legal no Decreto Nº 5.154, 23 de Julho de 2004, Art. 1º e 3º e de acordo
                            com as normas do Ministério da Educação (MEC) pela Resolução CNE nº 04/09, Art.
                            11º. Válido em todo Território Nacional.</p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="contato-form">
        <div class="container text-center ">
            <h1 class="titulo color-white">Contato</h1>
            <div class="divider"></div>
            <p class="descricao-slide color-white">Entre em contato e tenha todas as suas dúvidas respondidas<br>
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





    {{--<div class="video-background">--}}
    {{--<div class="video-foreground">--}}
    {{--<iframe src="https://www.youtube.com/embed/W0LHTWG-UmQ?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=W0LHTWG-UmQ"--}}
    {{--frameborder="0" allowfullscreen></iframe>--}}
    {{--</div>--}}
    {{--</div>--}}



@endsection



