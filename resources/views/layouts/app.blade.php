<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

    <!-- Styles -->
{{--<link href="/css/app.css" rel="stylesheet">--}}

<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
    <!-- Optional theme -->
    <link rel="stylesheet" href="{{url('assets/font-awesome/css/font-awesome.min.css')}}">
<!-- Optional theme -->
    <link rel="stylesheet" href="{{url('assets/css/bootstrap-theme.min.css')}}">
    <!-- Chamadas JS -->
    <!--jQuery-->
    <script src="{{url('assets/js/jquery-3.2.0.min.js')}}"></script>


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style type="text/css">
        .img-list {
            max-height: 50px;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="col-md-12">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if (Auth::guest())
                @else
                <ul class="nav navbar-nav">
                    <li><a href="/admin/home">Alunos</a></li>
                    <li><a href="/admin/cursos">Cursos</a></li>
                    <li><a href="/admin/pacote">Pacotes</a></li>
                    <li><a href="/admin/premios">Premios</a></li>
                    <li><a href="/admin/empresas">Empresas Parceiras</a></li>
                    <li><a href="/admin/contatos">Contatos</a></li>
                    <li><a href="/admin/controles">Controle</a></li>
                </ul>
            @endif
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ env('URL_ADMIN_LOGIN') }}">Login</a></li>
                        {{--<li><a href="{{ url('/register') }}">Cadastra-se</a></li>--}}
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ env('URL_ADMIN_LOGOUT') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ env('URL_ADMIN_LOGOUT') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

</div>


<!-- Scripts -->
{{--<script src="/js/app.js"></script>--}}
<script type="text/javascript" src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/jquery.mask.js')}}"></script>

<script>
    $(document).ready(function() {
        //limpa formulário
        $("#form-cad-edit").trigger("reset");

        //aplica mascára nos inputs
        $('#telefone').mask('(00)0000-0000');
        $('#celular').mask('(00)0 0000-0000');
        $('#cep').mask('00000-000');
        $('#cnpj').mask('00.000.000/0000-00');
        $('#dataTerminoCampanha').mask('00/00/0000');
    });

</script>
<script type="text/javascript">

    function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('rua').value = ("");
//        document.getElementById('bairro').value = ("");
        document.getElementById('cidade').value = ("");
        document.getElementById('uf').value = ("");
//        document.getElementById('ibge').value = ("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            jQuery(".cep-msg ").show();
            //Atualiza os campos com os valores.
            document.getElementById('rua').value = (conteudo.logradouro);
//            document.getElementById('bairro').value = (conteudo.bairro);
            document.getElementById('cidade').value = (conteudo.localidade);
            document.getElementById('uf').value = (conteudo.uf);
//            document.getElementById('ibge').value = (conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value = "...";
//                document.getElementById('bairro').value = "...";
                document.getElementById('cidade').value = "...";
                document.getElementById('uf').value = "...";
//                document.getElementById('ibge').value = "...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

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
    };

</script>

<script>

        function show(url) {

            jQuery.getJSON(url, function (data) {

                jQuery.each(data, function (key, val) {
                    jQuery("input[name='" + key + "']").val(val);
                });
            });

            jQuery("#myModal").modal();

            return false;
        };

</script>

<script>

    function sms(id) {

        jQuery.getJSON(id, function (data) {



            jQuery.each(data, function (key, val) {

                if (val == 1){
                    alert("Seu SMS foi enviado com Sucesso!")
                } else {
                    alert("Falha inesperada ocorreu, tente mais tarde!")
                }
            });
        });

        return false;

    }
</script>

@yield('content2')



</body>
</html>
