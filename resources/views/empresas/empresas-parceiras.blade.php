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
    <section class="slide">
        <div class="container">

            <div class="col md-12">
                <h1>EMPRESAS PARCEIRAS</h1></p>
            </div>

        </div>

            @forelse( $data as $empresa)

                <div class="container padding-30">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <img class="img-thumbnail img-circle" src="{{url('assets/uploads/imgs-empresas/')}}/{{$empresa->logo_img}}" alt="{{$empresa->nome}}">
                        </div>
                        <div class="col-md-8">

                            <div class="vertical">

                                <ul class="list-unstyled">
                                    <li><h2><strong>{{$empresa->nome}}</strong></h2></li>
                                    <li><h3>{{$empresa->cidade}} - {{$empresa->uf}}</h3></li>
                                    <li><h3>Endereço: {{$empresa->rua}}</h3></li>
                                    <li><h3>Telefone: {{$empresa->telefone}}</h3></li>
                                    <li><h3>Whatsapp: {{$empresa->celular}}</h3></li>
                                </ul>
                            </div>


                        </div>
                    </div>
                </div>

                <div >

            @empty
                <tr>
                    <td colspan="500">Nenhum registro cadastrado!</td>
                </tr>
            @endforelse


            </div>


    </section>




@endsection