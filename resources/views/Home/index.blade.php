@extends('Home.layouts.index')

@section('content')
    <div class="capa">
        <div class="texto-capa">

            <div class="row">
                <div class="col-md-6 hidden-xs">
                    <p>Seja bem vindo ao <strong>PRONAC – PROGRAMA NACIONAL DE CURSOS</strong>.
                        Cursos gratuitos com certificado de conclusão válido para:
                        atividades extracurriculares, avaliações de empresas, provas de títulos,
                        concursos públicos, enriquecer o seu currículo e muito mais!</p>
                    <h2>Cadastre-se agora para concorrer a cursos gratuitos</h2>
                    <!--<a href="" class="btn btn-custom btn-roxo btn-lg">Aproveite o Spotify Free</a>-->
                    <!--<a href="" class="btn btn-custom btn-branco btn-lg">Obter Spotify Premium</a>-->
                </div>
                <div class="col-md-6">

                    <div class="col-md-10">
                        <div class="panel panel-default">
                            <div class="panel-body ">
                                <h3>Cadastre-se</h3>
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" id="nome" placeholder="NOME">
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control input-lg" id="email" placeholder="E-MAIL">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="tel" class="form-control input-lg" id="celular" placeholder="CELULAR">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="tel" class="form-control input-lg" id="cep" placeholder="CEP">
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="reset" class="btn btn-default btn-lg">Limpar</button>
                                        <button type="submit" class="btn btn-primary btn-lg">Enviar</button>

                                    </div>

                                </form>

                            </div>
                        </div>


                    </div>

                </div>

            </div>
        </div>


    </div>


@endsection