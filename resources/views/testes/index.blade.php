@extends('testes.template')
@section('teste')


    @if( isset($alunos))

                @if($alunos->in_teste != '-1')
                    <div class="errors-msg alert alert-info">
                        <h2>Parabéns, <strong>{{$aluno->nome}}</strong>, você já fez o teste!.</h2>
                    </div>

                @else
                    <h1>Olá, <strong>{{$alunos->nome}}</strong></h1>
                    <h2>faça o teste para concorrer a bolsas de estudos</h2>

                    <div>

                        @if($alunos->escolaridade < 3)

                            @include('testes.teste1')
                        @else
                            @include('testes.teste2')
                        @endif


                    </div>


                    <form method="post" action="/editar-aluno/{{$alunos->id}}" id="form-edit-aluno" send="/editar-aluno/{{$alunos->id}}">
                        {{csrf_field()}}
                        <div class="container errors-msg alert alert-danger" style="display:none;"></div>
                        <div class=" container success-msg alert alert-success" style="display:none;"></div>
                        <div class=" container sms-msg alert alert-success" style="display:none;">
                            O resultado do teste seletivo seré enviado por sms no dia {{$data_fim}}.
                        </div>


                        <input class="input-hidden" type="text" id="input_resultado" name="in_teste" value="0"  readOnly="readOnly" >
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg" onClick = "document.form-edit-aluno.submit()">Enviar</button>
                        </div>




                    </form>

                @endif
    @else
                <div class="errors-msg alert alert-danger">

                    <h2>Desculpe, mas o número: {{$pesquisa}}, não está cadastrado.</h2>

                </div>
    @endif




@endsection