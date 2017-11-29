@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title">Listagem de Cursos</span>
                        <form class="form-inline" method="POST" action="/admin/cursos/pesquisar">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="input-field col s12 m2 l2">
                                    <a href="/admin/cursos/cadastrar" class="btn blue darken-1 waves-effect waves-light tooltipped"
                                       data-position="bottom" data-delay="50" data-tooltip="Adicionar Cursos"><i class="material-icons">add</i>Adicionar</a>
                                </div>

                                <div class="input-field col s12 m8 l8">
                                    <input class="validate" type="text" name="pesquisar" placeholder="Pesquisar">
                                </div>
                                <div class="input-field col s12 m2 l2">
                                    <button type="submit" class="btn blue darken-1 waves-effect waves-light"><i class="material-icons">search</i></button>

                                </div>
                            </div>

                        </form>

                        @if( isset($palavraPesquisa) )
                            <p>Resultados para a pesquisa <b>{{$palavraPesquisa}}</b></p>
                        @endif
                        <br>
                        <div class="row"></div>
                        <div class="row">
                            <table class="responsive-table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Pacote</th>
                                    <th>Curso</th>
                                    <th>Carga horária</th>
                                    <th>Editar / Deletar</th>
                                </tr>
                                </thead>
                                <!--Corpo-->
                                <tbody>
                                @forelse( $data as $d)
                                    <tr>
                                        <td>
                                            <img class="img-list" src="{{url('assets/uploads/img-cursos/')}}/{{$d->imagem}}" alt="{{$d->nome}}">

                                        </td>
                                        <td>
                                            {{$d->pacotenome}}
                                        </td>
                                        <td>
                                            {{$d->nome}}
                                        </td>
                                        <td>
                                            {{$d->carga}}
                                        </td>


                                        <td>
                                            <a href="/admin/cursos/editar/{{$d->id}}" class="btn orange darken-1 waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Editar"><i class="material-icons">update</i></a>
                                            <a href="/admin/cursos/delete/{{$d->id}}" class="btn red darken-1 waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Excluir"><i class="material-icons">delete</i></a>
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="90">Nenhum registro encontrado!</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <!--Rodape-->
                            </table>
                            {{$data->Links()}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection