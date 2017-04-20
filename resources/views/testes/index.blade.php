@extends('testes.template')
@section('teste')


            @forelse($alunos as $aluno)
                @if($aluno->in_teste != '-1')
                    <div class="errors-msg alert alert-info">
                        <h2>Parabéns, <strong>{{$aluno->nome}}</strong>, você já fez o teste!.</h2>
                    </div>

                @else
                    <h1>Olá, <strong>{{$aluno->nome}}</strong></h1>
                    <h2>faça o teste para concorrer a bolsas de estudos</h2>

                    <div>

                        @if($aluno->escolaridade < 3)

                            @include('testes.teste1')
                        @else
                            @include('testes.teste2')
                        @endif


                    </div>


                    <form method="post" action="/editar-aluno/{{$aluno->id}}" id="form-edit-aluno" send="/editar-aluno/{{$aluno->id}}">
                        {{csrf_field()}}
                        <div class="container errors-msg alert alert-danger" style="display:none;"></div>
                        <div class=" container success-msg alert alert-success" style="display:none;"></div>

                        <input class="input-hidden" type="text" id="input_resultado" name="in_teste" value="0"  readOnly="readOnly" >
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                        </div>

                    </form>

                @endif

            @empty
                <div class="errors-msg alert alert-danger">

                    <h2>Desculpe, mas o número: {{$pesquisa}}, não está cadastrado.</h2>

                </div>
            @endforelse




@endsection