@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Gestão de Cursos</h2>

        @if( isset($errors) && count ($errors) > 0)
            <div class="alert alert-danger">
                @foreach( $errors->all() as $errors )
                    {{$errors}} <br>
                @endforeach
            </div>
        @endif
        @if( isset($data))
            <form class="form-group" method="post" action="/admin/cursos/editar/{{$data->id}}" enctype="multipart/form-data">
        @else
            <form class="form-group" method="post" action="/admin/cursos/cadastrar" enctype="multipart/form-data">
        @endif
                {{ csrf_field() }}

                <div class="form-group">
                    <select name="id_pacote" id="id_pacote" class="form-control">
                        <option value="">Escolha o Pacote</option>
                        @foreach( $pacotes as $pacote)
                            <option value="{{$pacote->id}}"

                            @if(isset($data->id_pacote) && $data->id_pacote == $pacote->id )
                                selected
                            @endif
                            >{{$pacote->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nome" name="nome"
                           placeholder="NOME DO CURSO" value="{{$data->nome or old('nome')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nome" name="descricao"
                           placeholder="DESCRIÇÃO" value="{{$data->descricao or old('descricao')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="objetivo" name="objetivo"
                           placeholder="OBJETIVO" value="{{$data->objetivo or old('objetivo')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="carga" name="carga"
                           placeholder="CARGA HORÁRIA" value="{{$data->carga or old('carga')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="objetivo" name="ordem"
                           placeholder="ORDEM" value="{{$data->ordem or old('ordem')}}">
                </div>
                <div class="form-group">
                    <input type="file" class="file" id="imagem" name="imagem">
                </div>

                <div class="prelaoder" style="display: none">Enviando os dados, por favor aguarde...</div>


                <div class="form-group">
                    <input type="submit" name="enviar" value="Salvar" class="btn btn-success">
                </div>


            </form>
    </div>
@endsection