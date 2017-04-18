@extends('layouts.app')

@section('content')
    <div class="col-md-12">

        <form class="form-inline" method="POST" action="/admin/contatos/pesquisar">
            {{ csrf_field() }}
            <a href="{{url('/admin/contatos/cadastrar')}}" class="btn btn-primary""><i
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
                    <div class="panel-heading">Dashboard - Listagem de Contatos  ({{$data->count()}}):</div>

                    <div class="panel-body">

                        <table class="table table-striped  table-hover">
                            <tr>
                                <th>Cód.</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Mensagem</th>
                                <th colspan="2">Ações</th>
                            </tr>
                            @forelse( $data as $contato)
                                <tr>
                                    <td>
                                        {{$contato->id}}
                                    </td>
                                    <td>
                                        {{$contato->nome}}
                                    </td>
                                    <td>
                                        {{$contato->email}}
                                    </td>
                                    <td>
                                        {{$contato->mensagem}}
                                    </td>


                                    <td>
                                        <a href="/admin/contatos/editar/{{$contato->id}}" type="button"
                                           class="btn btn-warning">
                                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                        </a>
                                        <a href="/admin/contatos/delete/{{$contato->id}}" type="button"
                                           class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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