@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title">Listagem de Campanhas</span>
                        <a href="/admin/campanhas/cadastrar" class="btn blue darken-1 waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Adicionar uma nova Função">Adicionar</a>
                        <div class="row">
                            <table>
                                <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Cep</th>
                                    <th>Cidade</th>
                                    <th>UF</th>
                                    <th>IBGE</th>
                                    <th>Data Inicio</th>
                                    <th>Data Fim</th>
                                    <th>Editar / Deletar</th>
                                </tr>
                                </thead>
                                <!--Corpo-->
                                <tbody>
                                @forelse( $data as $d )
                                    <tr>
                                        <td>{{$d->title}}</td>
                                        <td>{{$d->cep}}</td>
                                        <td>{{$d->cidade}}</td>
                                        <td>{{$d->uf}}</td>
                                        <td>{{$d->ibge}}</td>
                                        <td>{{ Carbon\Carbon::parse($d->dataInicioCampanha)->format('d/m/Y') }} </td>
                                        <td>{{ Carbon\Carbon::parse($d->dataTerminoCampanha)->format('d/m/Y') }} </td>
                                        <td>
                                            <a href="campanhas/editar/{{$d->id}}" class="btn orange darken-1 waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Editar"><i class="material-icons">update</i></a>
                                            <a href="campanhas/delete/{{$d->id}}" class="btn red darken-1 waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Excluir"><i class="material-icons">delete</i></a>

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
                                    <th>Titulo</th>
                                    <th>Cep</th>
                                    <th>Cidade</th>
                                    <th>UF</th>
                                    <th>IBGE</th>
                                    <th>Data Inicio</th>
                                    <th>Data Fim</th>
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