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
                                <th>Celular</th>
                                <th>Cidade - UF</th>
                                <th>Informatica</th>
                                <th>Inglês</th>
                                <th>Escolaridade</th>
                                <th>Teste feito</th>
                                <th>Criado em</th>
                                <th>Atualizado em</th>
                                <th colspan="3">Ações</th>
                            </tr>
                            @forelse( $alunos as $aluno)
                                <tr>
                                    <td>
                                        {{$aluno->id}}
                                    </td>
                                    <td>
                                        {{$aluno->nome}}
                                    </td>
                                    <td>
                                        {{$aluno->celular}}
                                    </td>
                                    <td>
                                        {{$aluno->cidade}}-{{$aluno->uf}}
                                    </td>
                                    <td>
                                        @if($aluno->curso_info == '1')
                                            Não.
                                        @elseif($aluno->curso_info == '2')
                                            Sim básico.
                                        @elseif($aluno->curso_info == '3')
                                            Sim completo.
                                        @else
                                            Estou cursando.
                                        @endif

                                    </td>
                                    <td>
                                        @if($aluno->curso_ingl == '1')
                                            Não.
                                        @elseif($aluno->curso_ingl == '2')
                                            Sim básico.
                                        @elseif($aluno->curso_ingl == '3')
                                            Sim completo.
                                        @else
                                            Estou cursando.
                                        @endif
                                    </td>
                                    <td>
                                        {{$aluno->escolaridade}}
                                    </td>
                                    <td>
                                        {{$aluno->in_teste}}
                                    </td>
                                    <td>
                                        {{$aluno->created_at}}
                                    </td>
                                    <td>
                                        {{$aluno->updated_at}}
                                    </td>
                                    <td>
                                        <a onclick='show("/admin/show/{{$aluno->id}}")' type="button" class="btn btn-primary btn-sm">
                                            Detalhar
                                        </a>
                                    </td>
                                    <td>
                                        <a onclick='sms("/admin/sms/{{$aluno->id}}")' type="button" class="btn btn-primary btn-sm">
                                            SMS
                                        </a>
                                    </td>
                                    <td>
                                       <a href="/admin/delete/{{$aluno->id}}" type="button" class="btn btn-danger btn-sm">Deletar</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Nenhum registro encontrado!</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content2')

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Mais detalhes</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="InputName" name="name" placeholder="NOME"
                                   readOnly="readOnly">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control telefone" id="telefone" name="cell"
                                   placeholder="CELULAR" readOnly="readOnly">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control cep" id="cep" name="cep" placeholder="CEP"
                                   readOnly="readOnly">
                        </div>


                        <div class="form-group col-md-8">
                            <input class="form-control" name="rua" type="text" id="rua" placeholder="rua"
                                   readOnly="readOnly"/>
                        </div>
                        <div class="form-group col-md-4">
                            <input class="form-control" name="bairro" type="text" id="bairro" placeholder="Bairro"
                                   readOnly="readOnly"/>
                        </div>
                        <div class="form-group col-md-4">
                            <input class="form-control" name="cidade" type="text" id="cidade" placeholder="Cidade"
                                   readOnly="readOnly"/>
                        </div>
                        <div class="form-group col-md-4">
                            <input class="form-control" name="uf" type="text" id="uf" placeholder="Estado"
                                   readOnly="readOnly"/>
                        </div>
                        <div class=" form-group col-md-4">
                            <input class="form-control" name="ibge" type="text" id="ibge" placeholder="IBGE"
                                   readOnly="readOnly"/>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection


