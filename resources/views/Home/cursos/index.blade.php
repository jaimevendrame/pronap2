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

                @forelse($cursos as $curso)
                <div class="col-md-6">
                    <div class="media">
                        <div class="media-left media-middle">
                            <a href="#">
                                <img class="media-object" src="{{url('assets/uploads/img-cursos/')}}/{{$curso->imagem}}" alt="{{$curso->nome}}">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">{{$curso->nome}}</h4>
                            <p>Carga horária: {{$curso->carga}}.</p>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </section>
@endsection