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
                    <a href="../" class="navbar-brand logo"><strong>pronap.info</strong></a>
                </div>

                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right menu">
                        <li><a href="../#participar">Como Participar</a></li>
                        <li><a href="../#cursos">Cursos</a>
                        </li>
                        <li><a href="../#certificado">Certificados</a>
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
    <section class="slide2">
        <div class="container">
            <div class="col md-12">
                <h1>Cursos oferecidos pelo PRONAP</h1>
                <p class="descricao">(os cursos disponíveis em cada cidade podem variar de acordo com as demandas identificadas e parcerias realizadas)</p>
            </div>
            <div class="toolbar mb2 mt2">
                <button class="btnx fil-cat" data-rel="all">Mostrar todos</button>
                @foreach($pacotes as $pacote)
                <button class="btnx fil-cat" data-rel="{{$pacote->id}}">{{$pacote->nome}}</button>
                @endforeach
            </div>
        </div>
        <div class="container center-block">
            {{--<div style="clear:both;"></div>--}}
            <div id="portfolio">
                @forelse($data as $curso)
                    <div class="tile scale-anm all {{$curso->id_pacote}}">
                        <img class="img-responsive" src="{{url('assets/uploads/img-cursos/')}}/{{$curso->imagem}}" alt="{{$curso->imagem}}">
                        <div class="detalhe-sobre-projeto">
                            <h4 class="titulo-detalhe-projeto">{{$curso->nome}}</h4>

                            <p class="descricao-projeto">{{$curso->pacotenome}}</p>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="500"></td>
                    </tr>
                @endforelse
            </div>
        </div>
    </section>
    <div style="clear:both;"></div>

    <ul id="filters" class="clearfix">
        <li><span class="filter active" data-filter=".app, .card, .icon, .logo, .web">All</span></li>
        <li><span class="filter" data-filter=".app">App</span></li>
        <li><span class="filter" data-filter=".card">Card</span></li>
        <li><span class="filter" data-filter=".icon">Icon</span></li>
        <li><span class="filter" data-filter=".logo">Logo</span></li>
        <li><span class="filter" data-filter=".web">Web</span></li>
    </ul>

    <div id="portfoliolist">
        <div class="portfolio logo" data-cat="logo">
            <div class="portfolio-wrapper">
                <img src="img/portfolios/logo/5.jpg" alt="" />
                <div class="label">
                    <div class="label-text">
                        <a class="text-title">Bird Document</a>
                        <span class="text-category">Logo</span>
                    </div>
                    <div class="label-bg"> </div>
                </div>
            </div>
        </div>
        .........
    </div>


@endsection