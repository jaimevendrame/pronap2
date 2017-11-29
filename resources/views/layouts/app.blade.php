<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin.css') }}"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        header, main, footer {
            padding-left: 300px;
        }
        @media only screen and (max-width : 992px) {
            header, main, footer {
                padding-left: 0;
            }
        }
        main {
            margin: 0px 10px 0px 10px;
        }
    </style>
    <script>

        function limitaTextarea(valor) {
            quant = 155; /* Total de caracteres */
            total = valor.length;

            if(total <= quant) {
                resto = quant - total;
                document.getElementById('cont').innerHTML = resto;
            } else {
                document.getElementById('texto').value = valor.substr(0,quant);
            }
        }
    </script>

</head>

<body>
<div id="app">

    <ul id="dropdown1" class="dropdown-content">
        <li><a href="#!">Perfil</a></li>
        <li><a href="#!">Configurações</a></li>
        <li class="divider"></li>
        @if (!Auth::guest())
            <li><a href="#!">{{ Auth::user()->email }}</a></li>
        @endif

    </ul>
    <header>
        <nav class="light-blue accent-3">
            <div class="nav-wrapper">
                <div class="row">
                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
                    <div class="col s10 m11 l11">
                        <a href="/home" class="breadcrumb"><i class=" tiny material-icons">home</i> Home</a>
                        @if(!empty($brand))
                            @for ($i = 0; $i < count($brand); $i++)
                                <a href="#!" class="breadcrumb">{{ $brand[$i] }}</a>
                            @endfor


                        @endif
                    </div>
                    <div class="col s2 m1 l1">
                        <a href="{{ env('URL_ADMIN_LOGOUT') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ env('URL_ADMIN_LOGOUT') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>



                </div>

            </div>
        </nav>
        <ul id="slide-out" class="side-nav fixed  blue darken-3 z-depth-5">
            <nav class="blue darken-4">
                <div class="container">
                    <!-- Branding Image -->
                    <a class="brand-logo" href="{{ url('/home') }}"><i class="large material-icons">whatshot</i>
                        {{--{{ config('app.name', 'O Sistema') }}--}} PRONAC
                    </a>
                </div>
            </nav>
            <li>
                <div class="userView">
                    <div class="background">
                        <img src="{{ asset('admin/images/office.jpg') }}">
                    </div>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <a href="#!name"><span class="white-text name">Anonimo</span></a><li>
                    @else
                        <div class="row">
                            <div class="col  s4 m4 l4">
                                <img class="circle avatar" src="{{ asset('admin/images/user_default.jpg') }}">
                            </div>
                            <div class="col col s8 m8 l8">
                                <a class="dropdown-button" href="#!" data-activates="dropdown1">
                                    <span class="white-text name">{{ Auth::user()->name }}
                                        <i class="material-icons right">arrow_drop_down</i>
                                    </span>
                                </a>
                            </div>
                        </div>

                    @endif

                </div>
            </li>
            {{--<li>--}}
            {{--<form>--}}
            {{--<div class="input-field">--}}
            {{--<input id="myInput" name="myInput" type="search" required>--}}
            {{--<label class="label-icon" for="search"><i class="material-icons">search</i></label>--}}
            {{--<i class="material-icons">close</i>--}}
            {{--</div>--}}
            {{--</form>--}}
            {{--</li>--}}

            <ul class="collapsible white-text" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header"><i class="material-icons">dashboard</i>Dashboard</div>
                    <div class="collapsible-body blue"><span></span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">settings_applications</i>Configurações</div>
                    <div class="collapsible-body blue">
                        <span>
                            <ul>
                                <li><a class="white-text" href="/admin/campanhas">Campanhas</a></li>
                                <li><a class="white-text" href="/admin/pacote">Pacotes</a></li>
                                <li><a class="white-text" href="/admin/cursos">Cursos</a></li>
                            </ul>
                        </span>
                    </div>
                </li>

                <li>
                    <div class="collapsible-header"><i class="material-icons">people</i>Leads</div>
                    <div class="collapsible-body blue"><span>
                            <ul>
                                <li><a class="white-text" href="/admin/leads">Geral</a></li>
                                <li><a class="white-text" href="/admin/leads/foracampanha/">Orfãos</a></li>
                                @forelse($campanhas as $campanha)
                                    <li><a class="white-text" href="/admin/leads/campanha/{{$campanha->ibge}}">{{$campanha->title}}</a></li>
                                @empty
                                @endforelse

                            </ul>
                        </span></div>
                </li>
                {{--<li><a class="white-text" href="/admin/leads">Leads</a></li>--}}

                {{--<li>--}}
                    {{--<div class="collapsible-header active"><i class="material-icons">person</i>Usuário</div>--}}
                    {{--<div class="collapsible-body blue">--}}
                            {{--<span>--}}
                                {{--<ul>--}}
                                    {{--<li><a class="white-text" href="/admin/role">Funções</a></li>--}}
                                    {{--<li><a class="white-text" href="/admin/permission">Permissões</a></li>--}}
                                    {{--<li><a class="white-text" href="/admin/permissionrole">Permissões Funções</a></li>--}}
                                    {{--<li><a class="white-text" href="/user">Usuário</a></li>--}}
                                    {{--<li><a class="white-text" href="/admin/userrole">Usuário Funções</a></li>--}}
                                {{--</ul>--}}
                            {{--</span>--}}
                    {{--</div>--}}
                {{--</li>--}}

                <li>
                    <div class="collapsible-header"><i class="material-icons">play_for_work</i>Matriculas</div>
                    <div class="collapsible-body blue"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
            </ul>

        </ul>
    </header>


    <main>


        <div>
            @yield('content')
        </div>



    </main>
</div>

<!-- Scripts -->
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/date.format.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.mask.js') }}"></script>


<script>


    $(document).ready(function(){
        $(".button-collapse").sideNav();
        $('.collapsible').collapsible('open', 0);
        $('#cep').mask('00000-000');
        $('#celular').mask('(00)00000-0000');

        $('ul.tabs').tabs();

    });

    $(document).ready(function() {
        $('select').material_select();
    });

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year
        format: 'yyyy-m-d'

    });

    $(document).ready(function () {


        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
            $("#cep-cidade").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep, #cep-cidade").blur(function () {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");
                    $("#cep-cidade").val("...");
                    $(':input[type="submit"]').prop('disabled', true);


                    //Consulta o webservice viacep.com.br/
                    $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val((dados.localidade).toUpperCase());
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);
                            $("#cep-cidade").val(dados.localidade);
                            $(':input[type="submit"]').prop('disabled', false);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });
</script>
</body>
</html>
