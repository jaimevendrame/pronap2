@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Gestão de Empresas</h2>

        @if( isset($errors) && count ($errors) > 0)
            <div class="alert alert-danger">
                @foreach( $errors->all() as $errors )
                    {{$errors}} <br>
                @endforeach
            </div>
        @endif
        @if( isset($data))
            <form class="form-group" method="post" action="/admin/empresas/editar/{{$data->id}}" enctype="multipart/form-data">
        @else
            <form class="form-group" method="post" action="/admin/empresas/cadastrar" enctype="multipart/form-data">
        @endif
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" id="InputName" name="nome_fatasia"
                           placeholder="NOME FANTÁSIA" value="{{$data->nome_fatasia or old('nome_fatasia')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="InputName" name="cnpj"
                           placeholder="CNPJ" value="{{$data->cnpj or old('cnpj')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="InputName" name="cep"
                           placeholder="CEP" value="{{$data->cep or old('cep')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="InputName" name="rua"
                           placeholder="LOUGRADOURO" value="{{$data->rua or old('rua')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="InputName" name="cidade"
                           placeholder="CIDADE" value="{{$data->cidade or old('cidade')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="InputName" name="uf"
                           placeholder="ESTADO" value="{{$data->uf or old('uf')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="InputName" name="telefone"
                           placeholder="TELEFONE" value="{{$data->telefone or old('telefone')}}">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" id="InputName" name="logo_img">
                </div>

                <div class="prelaoder" style="display: none">Enviando os dados, por favor aguarde...</div>


                <div class="form-group">
                    <input type="submit" name="enviar" value="Salvar" class="btn btn-success">
                </div>


            </form>
    </div>
@endsection