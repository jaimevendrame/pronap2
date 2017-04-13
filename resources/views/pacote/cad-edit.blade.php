@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Gestão de Pacotes de Cursos</h2>

        @if( isset($errors) && count ($errors) > 0)
            <div class="alert alert-danger">
                @foreach( $errors->all() as $errors )
                    {{$errors}} <br>
                @endforeach
            </div>
        @endif
        @if( isset($data))
            <form class="form-group" method="post" action="/admin/pacote/editar/{{$data->id}}" enctype="multipart/form-data">
        @else
            <form class="form-group" method="post" action="/admin/pacote/cadastrar" enctype="multipart/form-data">
        @endif
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" id="InputName" name="nome"
                           placeholder="NOME DO PACOTE" value="{{$data->nome or old('nome')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="InputName" name="ordem"
                           placeholder="ORDEM" value="{{$data->ordem or old('ordem')}}">
                </div>

                <div class="prelaoder" style="display: none">Enviando os dados, por favor aguarde...</div>


                <div class="form-group">
                    <input type="submit" name="enviar" value="Salvar" class="btn btn-success">
                </div>


            </form>
    </div>
@endsection