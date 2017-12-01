@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title">Listagem de Leads <span class="badge">{{$data->count()}}/{{$total}}</span></span>
                        <form class="form-inline" method="POST" action="/admin/leads/pesquisar">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="input-field col s12 m2 l2">
                                    <a href="/admin/leads/cadastrar" class="btn blue darken-1 waves-effect waves-light tooltipped"
                                       data-position="bottom" data-delay="50" data-tooltip="Adicionar uma nova Campanha"><i class="material-icons">add</i>Adicionar</a>
                                </div>

                                <div class="input-field col s12 m8 l8">
                                    <input class="validate" type="text" name="pesquisar" placeholder="Pesquisar">
                                </div>
                                <div class="input-field col s12 m2 l2">
                                    <button type="submit" class="btn blue darken-1 waves-effect waves-light"><i class="material-icons">search</i></button>

                                </div>
                            </div>

                        </form>
                        <div class="row">
                        </div>
                        <div class="row">

                                <table class="responsive-table">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Celular</th>
                                        <th>Email</th>
                                        <th>Cidade/UF</th>
                                        <th>Matriculado</th>
                                        <th>Editar / Deletar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse( $data as $d )
                                        <tr>
                                            <td>{{$d->nome}}</td>
                                            <td>{{$d->celular}}</td>
                                            <td>{{$d->email}}</td>
                                            <td>{{$d->cidade}}-{{$d->uf}}</td>
                                            <td>{{$d->matriculado}}</td>
                                            <td>
                                                <a href="/admin/leads/editar/{{$d->id}}" class="btn orange darken-1 waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Editar"><i class="material-icons">update</i></a>
                                                <a href="/admin/leads/delete/{{$d->id}}" class="btn red darken-1 waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Excluir"><i class="material-icons">delete</i></a>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="90">Nenhum registro encontrado!</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                {{$data->Links()}}


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection