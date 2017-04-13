@extends('layouts.app')

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">

                        <table class="table table-striped">
                            <tr>
                                <th>Cód.</th>
                                <th>Nome</th>
                                <th colspan="3">Ações</th>
                            </tr>
                            @forelse( $data as $premio)
                                <tr>
                                    <td>
                                        {{$data->id}}
                                    </td>
                                    <td>
                                        {{$data->nome}}
                                    </td>


                                    <td>
                                        <a onclick='sms("/admin/sms/{{$data->id}}")' type="button"
                                           class="btn btn-info btn-sm">
                                            Editar
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/admin/delete/{{$premio->id}}" type="button"
                                           class="btn btn-danger btn-sm">Deletar</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Nenhum registro encontrado!</td>
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