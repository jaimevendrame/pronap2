@extends('Home.layouts.index')

@section('content')
    <div class="capa2">
        <div class="texto-capa">

            <div class="row">

                <h2>CURSOS DISPONÍVEIS</h2>
                <p>Nossos cursos proporcionam uma experiência de aprendizado fácil e <BR>agradável aos alunos, com uma linguagem DIRETA e OBJETIVA.</p>

            </div>

        </div>

    </div>
    </div>
    </div>
    <section id="cursos">
        <div class="container">

            <div class="container">

                <div class="col md-12 text-left">
                    <h3><strong>{{$data->nome}}</strong></h3></p>
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
                                <li><h3><strong>{{$data->nome}}:</strong></h3></li>
                                <li><p>{{$data->descricao}}</p></li>
                                <li><h3><strong>Objetivo do curso:</strong></h3></li>
                                <li><p>{{$data->objetivo}}</p></li>
                                <li><p><b>Carga horária:</b> {{$data->carga}} horas</p></li>
                            </ul>
                        </div>
                    </div>
                </div>


        </div>
    </section>
@endsection