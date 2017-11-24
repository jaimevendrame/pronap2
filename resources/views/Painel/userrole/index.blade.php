@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title">Listagem de Usuários por Função</span>
                        <a href="/admin/userrole/cadastrar" class="btn blue darken-1 waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Adicionar uma nova Função">Adicionar</a>
                        <div class="row">
                            <table>
                                <thead>
                                <tr>
                                    <th>ID Usuario</th>
                                    <th>ID Funções</th>
                                    <th>Editar / Deletar</th>
                                </tr>
                                </thead>
                                <!--Corpo-->
                                <tbody>
                                @forelse( $data as $ur )
                                    <tr>
                                        <td>{{$ur->user_id}}</td>
{{--                                        <td>{{$pr->permissions->labe}}</td>--}}
                                        <td>{{$ur->role_id}}</td>
                                        <td>
                                            <a href="#" class="btn blue darken-1 waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Permissões"><i class="material-icons">playlist_add_check</i></a>
                                            <a href="userrole/editar/{{$ur->id}}" class="btn orange darken-1 waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Editar"><i class="material-icons">update</i></a>
                                            <a href="userrole/delete/{{$ur->id}}" class="btn red darken-1 waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Excluir"><i class="material-icons">delete</i></a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="90">Nenhum registro encontrado!</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <!--Rodape-->
                                <tfoot>
                                <tr>
                                    <th>Permissão</th>
                                    <th>Rótulo</th>
                                    <th>Editar / Deletar</th>
                                </tr>
                                <tfoot>
                            </table>
                            {{$data->Links()}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection