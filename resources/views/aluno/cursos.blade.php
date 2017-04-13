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
                        <li><a onclick="$('#home').animatescroll({scrollSpeed:2000,easing:'easeOutBounce'});">Home</a>
                        </li>
                        <li><a onclick="$('#participar').animatescroll({scrollSpeed:2000,easing:'easeOutBounce'});">Como
                                Participar</a></li>
                        <li>
                            <a onclick="$('#cursos').animatescroll({scrollSpeed:2000,easing:'easeOutBounce'});">Cursos</a>
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
    <section class="slide">
        <div class="container">

            <div class="col md-12">
                <h1>CURSOS DISPONIVEIS</h1></p>
            </div>

            <div >
                <ul class="list">
                    <li><a href="">Mostrar todos</a></li>
                    <li>/</li>
                    <li><a href="">Operador de Computador</a></li>
                    <li>/</li>
                    <li><a href="">Designer Gráfico</a></li>
                    <li>/</li>
                    <li><a href="">Web Designer</a></li>
                    <li>/</li>
                    <li><a href="">Desenhista CAD</a></li>
                    <li>/</li>
                    <li><a href="">Programador</a></li>
                    <li>/</li>
                    <li><a href="">Desenvolvimento Jogos</a></li>
                </ul>
            </div>

        </div>
        <div class="container">

            <div class="">
                <div class="row">
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/windows.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/word2016.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/excel2016.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/powerpoint2016.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/access2016.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/corelx7.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/photoshopcs6.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/photoshopcs6projeto.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/indesign.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/illustratorcs6.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/3ds.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/html5.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/css.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/dreamweavercs6.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/flashcs6.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/fireworkscs6.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/fireworkscs6site.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/autocad2016basico.png')}}" alt="">
                        </div>
                    </article>
                    <article class="col-md-3 box-curso">
                        <div>
                            <img class="img-responsive" src="{{url('assets/img/cursos/autocad2016projcivil.png')}}" alt="">
                        </div>
                    </article>


                </div>
            </div>

        </div>
    </section>




@endsection