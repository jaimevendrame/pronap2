@extends('layouts.app')

@section('content')
    <div class="col-md-12">

        <form class="form-inline" method="POST" action="/admin/controles/pesquisar">
            {{ csrf_field() }}
            <a href="{{url('/admin/controles/cadastrar')}}" class="btn btn-primary""><i
                    class="fa fa-plus-circle" alt="Cadastrar"></i></a>

            <input class="form-group" type="text" name="pesquisar" placeholder="Pesquisa">
            <button type="submit" class="btn btn-danger"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>

        @if( isset($palavraPesquisa) )
            <p>Resultados para a pesquisa <b>{{$palavraPesquisa}}</b></p>
        @endif
        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard - Listagem de Cursos  ({{$data->count()}}):</div>

                    <div class="panel-body">

                        <table class="table table-striped  table-hover">
                            <tr>
                                <th>Nome</th>
                                <th>Celular</th>
                                <th>CEP</th>
                                <th>Cidade/UF</th>
                                <th colspan="2">Ações</th>
                            </tr>
                            @forelse( $data as $controles)
                                <tr>

                                    <td>
                                        {{$controles->nome}}
                                    </td>
                                    <td>
                                        {{$controles->celular}}
                                    </td>
                                    <td>
                                        {{$controles->cep}}
                                    </td>
                                    <td>
                                        {{$controles->cidade}}/ {{$controles->uf}}
                                    </td>


                                    <td>
                                        <a href="/admin/controles/editar/{{$controles->id}}" type="button"
                                           class="btn btn-warning">
                                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                        </a>
                                        {{--<a href="/admin/controles/delete/{{$controles->id}}" type="button"--}}
                                           {{--class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>--}}
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="500">Nenhum registro cadastrado!</td>
                                </tr>
                            @endforelse
                        </table>
                        <nav>
                            {{$data->Links()}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>

        var urlAdd = '/admin/pacote/cadastroGo';

    </script>
@endsection