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
                <h4>A QUANTIDADE DE PRÊMIOS DEPENDE DA QUANTIDADE DE PESSOAS CADASTRADAS EM SUA CIDADE.
                    AVISE SEUS AMIGOS, COMPARTILHE ESSA OPORTUNIDADE!
                    </h4>
                {{--(COMPARTILHAR NO FACEBOOK MARQUE SEUS AMIGOS)--}}
                <div class="form-group fb-like" data-href="http://pronap.info" data-width="550" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
            </div>
            <div class="container">
                <div class="col-md-10 col-lg-offset-1 ter-block">
                    <form id="form-premios" method="POST" action="/premios-pesquisa">
                        {{ csrf_field() }}
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="cep-cidade" name="cep"
                                       placeholder="Digite o seu CEP" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <input type="text" class="form-control" id="telefone-premio" name="telefone"
                                       placeholder="Digite seu Celular" onblur="tirarmascara();">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <button type="submit" class="btn btn-success">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container">

            @if(isset($alunos))

                @forelse($alunos as $aluno)
                    <div class="msg alert alert-info text-center">
                        <h4>Olá, <strong>{{$aluno->nome}}</strong>, com mais inscritos suas chances aumentam.</h4>
                        <br>
                        @if( isset($total_inscritos))
                            <h4>Até o momento temos <strong>{{$total_inscritos}}</strong> inscrito(s) em sua cidade</h4>
                            @endif
                    </div>
                 @empty
                    <div class="alert alert-warning text-center">
                        <h4>Você ainda não é cadastrado!</h4>
                        <a class=""data-toggle="modal" data-target="#cadCandidato">CADASTRE-SE</a>
                    </div>
                @endforelse
            @endif


            <div class="container padding-30">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed">
                            <tr>
                                <th>Qtde. Inscritos</th>
                                <th>Bolsas Integrais</th>
                                <th>Bolsas Parciais</th>
                                <th>Smartwatchs</th>
                                <th>Tablets</th>
                                <th>Smartphones</th>
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
                </div>
            </div>

    </section>




@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            //limpa formulário
            $("#form-premios").trigger("reset");

            //aplica mascára nos inputs
            $('#telefone-premio').mask('(00) 0 0000-0000');
            $('#cep-cidade').mask('00000-000');
        });

        function tirarmascara() {
            $("#telefone-premio").unmask();
        };



    </script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8&appId=316115088513380";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
@endsection