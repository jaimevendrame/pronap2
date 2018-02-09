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
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="http://www.eqsl.cc/qslcard/ImportADIF.cfm" enctype="multipart/form-data">
                {{--<div class="form-group">--}}
                    {{--<label for="exampleInputEmail1">Email address</label>--}}
                    {{--<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="exampleInputPassword1">Password</label>--}}
                    {{--<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">--}}
                {{--</div>--}}
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile" name="Filename">
                </div>

                <button type="submit" class="btn btn-default">Subir</button>
            </form>
        </div>

    </div>
</div>


</body>
</html>