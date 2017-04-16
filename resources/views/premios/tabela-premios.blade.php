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
                <h1>QUANTIDADE PRÊMIOS DEPENDENDO DA QUANTIDADE DE PESSOAS CADASTRADAS</h1>
            </div>

        </div>


        <div class="container padding-30">
            <div class="col-md-12">
                <table class="table table-hover">
                    <tr>
                        <th>Qtde. Inscrintos</th>
                        <th>Bolsas Integrais</th>
                        <th>Bolsas Parciais</th>
                        <th>Smartwatchs</th>
                        <th>Tablets</th>
                        <th>Smartphons</th>
                    </tr>
                    @forelse( $data as $premio)
                        <tr>
                            <td>{{$premio->qtde_insc}}</td>
                            <td>{{$premio->qtde_bolsas_integrais}}</td>
                            <td>{{$premio->qtde_bolsas_parciais}}</td>
                            <td>{{$premio->qtde_smartwatch}}</td>
                            <td>{{$premio->qtde_tablets}}</td>
                            <td>{{$premio->qtde_smartphone}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="500">Nenhum registro cadastrado!</td>
                        </tr>
                    @endforelse

                </table>
            </div>

            <div>


            </div>


    </section>




@endsection