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
            <form class="form-group" id="form-cad-edit" method="post" action="/admin/empresas/editar/{{$data->id}}" enctype="multipart/form-data">
        @else
            <form class="form-group" id="form-cad-edit" method="post" action="/admin/empresas/cadastrar" enctype="multipart/form-data">
        @endif
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" id="nome" name="nome"
                           placeholder="NOME FANTÁSIA" value="{{$data->nome or old('nome')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="cnpj" name="cnpj"
                           placeholder="CNPJ" value="{{$data->cnpj or old('cnpj')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="cep" name="cep"
                           placeholder="CEP" value="{{$data->cep or old('cep')}}" onblur="pesquisacep(this.value);">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="rua" name="rua"
                           placeholder="LOUGRADOURO" value="{{$data->rua or old('rua')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="cidade" name="cidade"
                           placeholder="CIDADE" value="{{$data->cidade or old('cidade')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="uf" name="uf"
                           placeholder="ESTADO" value="{{$data->uf or old('uf')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="telefone" name="telefone"
                           placeholder="TELEFONE" value="{{$data->telefone or old('telefone')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="celular" name="celular"
                           placeholder="Whatsapp" value="{{$data->celular or old('celular')}}">
                </div>
                <div class="form-group">
                    <input type="file" class="file" id="logo_img" name="logo_img">
                </div>

                <div class="prelaoder" style="display: none">Enviando os dados, por favor aguarde...</div>


                <div class="form-group">
                    <input type="submit" name="enviar" value="Salvar" class="btn btn-success">
                </div>


            </form>
    </div>

@endsection