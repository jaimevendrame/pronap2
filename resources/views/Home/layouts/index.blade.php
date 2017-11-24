<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Educação para todos - Pronac</title>
    <link rel="icon" href="{{ asset('imagens/favicon.png') }}">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"  media="screen,projection"/>
    <link href="{{ asset('bootstrap/estilo.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>


<nav class="navbar navbar-fixed-top navbar-inverse navbar-transparente">
    <div class="container">

        <!-- header -->
        <div class="navbar-header">

            <!-- botao toggle -->
            <button type="button" class="navbar-toggle collapsed"
                    data-toggle="collapse" data-target="#barra-navegacao">
                <span class="sr-only">alternar navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="../" class="navbar-brand">
                <span class="img-logo">PRONAC</span>
            </a>

        </div>

        <!-- navbar -->
        <div class="collapse navbar-collapse" id="barra-navegacao">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../">Home</a></li>
                <li><a href="/cursos">Cursos</a></li>
                <li><a href="/cidades">Cidades</a></li>
                <li><a href="#certificado">Certificados</a></li>

                <li class="divisor" role="separator"></li>
                <li><a href="/home">Entrar</a></li>
            </ul>
        </div>
    </div><!-- /container -->
</nav><!-- /nav -->



@yield('content')

<section id="certificado">
    <div class="container">
        <div class="row"> <h2>Valide seu certificado:</h2></div>
        <form action="">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <input type="text" class="form-control input-lg" placeholder="Digite o código verificador aqui.">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Validar</button>
                </div>
            </div>

        </form>
    </div>
</section>

<!-- Rodape -->
<footer id="rodape">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <span class="img-logo">Spotify</span>
            </div>

            <div class="col-md-2">
                <h4>Pronac</h4>
                <ul class="nav">
                    <li><a href="/sobre">Sobre</a></li>
                    <li><a href="/certificados">Certificação</a></li>
                </ul>
            </div>


            <div class="col-md-2">
                <h4>Contato</h4>
                <ul class="nav">
                    <li><a href="">contato@pronac.info</a></li>
                    <li><a href="">Skipe: pronac_cursos</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <ul class="nav">
                    <li class="item-rede-social"><a href=""><img src="imagens/facebook.png"></a></li>
                    <li class="item-rede-social"><a href=""><img src="imagens/twitter.png"></a></li>
                    <li class="item-rede-social"><a href=""><img src="imagens/instagram.png"></a></li>
                </ul>
            </div>

        </div><!-- /row -->
    </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>