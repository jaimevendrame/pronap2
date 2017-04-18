@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Gestão de Contatos</h2>

        @if( isset($errors) && count ($errors) > 0)
            <div class="alert alert-danger">
                @foreach( $errors->all() as $errors )
                    {{$errors}} <br>
                @endforeach
            </div>
        @endif
        @if( isset($data))
            <form class="form-group" method="post" action="/admin/contatos/editar/{{$data->id}}" enctype="multipart/form-data">
        @else
            <form class="form-group" method="post" action="/admin/contatos/cadastrar" enctype="multipart/form-data">
        @endif
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" id="nome" name="nome"
                           placeholder="NOME DO CONTATO" value="{{$data->nome or old('nome')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email"
                           placeholder="E-MAIL" value="{{$data->email or old('email')}}">
                </div>

                <div class="form-group">
                    <textarea type="text" class="form-control" id="email" name="mensagem"
                              placeholder="Mensagem"> {{$data->mensagem or old('mensagem')}} </textarea>
                </div>



                <div class="prelaoder" style="display: none">Enviando os dados, por favor aguarde...</div>


                <div class="form-group">
                    <input type="submit" name="enviar" value="Salvar" class="btn btn-success">
                </div>


            </form>
    </div>
@endsection