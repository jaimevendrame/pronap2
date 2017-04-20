@extends('layouts.index')
@section('head_script_cursos')
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <link rel="stylesheet" href="{{url('assets/portifolio/css/normalize.css')}}">
    <link rel="stylesheet" href="{{url('assets/portifolio/css/layout.css')}}">

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>a
    <![endif]-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('assets/portifolio/js/jquery.mixitup.min.js')}}"></script>
    <script type="text/javascript">
        $(function () {

            var filterList = {

                init: function () {

                    // MixItUp plugin
                    // http://mixitup.io
                    $('#portfoliolist').mixItUp({
                        selectors: {
                            target: '.portfolio',
                            filter: '.filter'
                        },
                        load: {
                            filter: '@foreach($pacotes as $pacote).{{$pacote->id}},@endforeach .bode'
                        }
                    });

                }

            };

            // Run the show!
            filterList.init();


        });
    </script>
@endsection

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
    <div class="clear"></div>


    <section class="slide">
        <div class="container">

            <div class="col md-12 text-left">
                <h2><strong>{{$data->nome}}</strong></h2></p>
            </div>

        </div>   <hr>
        <div class="container">

            <div class="container padding-30">
                <div class="col-md-12 text-left">
                    <div class="col-md-4">
                        <img class="img-thumbnail" src="{{url('assets/uploads/img-cursos/')}}/{{$data->imagem}}" alt="{{$data->nome}}">
                    </div>

                    <div class="col-md-8 text-left">
                            <ul class="list-unstyled">
                                <li><h2><strong>Sobre o {{$data->nome}}:</strong></h2></li>
                                <li><h3>{{$data->descricao}}</h3></li>
                                <li><h2>Objetivo do curso:</h2></li>
                                <li><h3>{{$data->objetivo}}</h3></li>
                            </ul>
                    </div>
                </div>
            </div>
    </section>
    </div><!-- container -->
@endsection