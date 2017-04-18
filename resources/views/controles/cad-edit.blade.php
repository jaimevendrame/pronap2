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
            <form class="form-group" method="post" action="/admin/controles/editar/{{$data->id}}" enctype="multipart/form-data">
        @else
            <form class="form-group" method="post" action="/admin/controles/cadastrar" enctype="multipart/form-data">
        @endif

                {{ csrf_field() }}

                {{--<div class="form-group">--}}
                    {{--<select name="id_pacote" id="id_pacote" class="form-control">--}}
                        {{--<option value="">Escolha o Pacote</option>--}}
                        {{--@foreach( $pacotes as $pacote)--}}
                            {{--<option value="{{$pacote->id}}"--}}

                            {{--@if(isset($data->id_pacote) && $data->id_pacote == $pacote->id )--}}
                                {{--selected--}}
                            {{--@endif--}}
                            {{-->{{$pacote->nome}}</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</div>--}}
                <div class="form-group">
                    <input type="text" class="form-control" id="nome" name="nome"
                           placeholder="NOME DO CURSO" value="{{$data->nome or old('nome')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nome" name="celular"
                           placeholder="DESCRIÇÃO" value="{{$data->celular or old('celular')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="objetivo" name="cep"
                           placeholder="OBJETIVO" value="{{$data->cep or old('cep')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="carga" name="cidade"
                           placeholder="CARGA HORÁRIA" value="{{$data->cidade or old('cidade')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="objetivo" name="uf"
                           placeholder="ORDEM" value="{{$data->uf or old('uf')}}">
                </div>
                {{--<div class="form-group">--}}
                    {{--<input type="text" class="form-control" id="objetivo" name="uf"--}}
                           {{--placeholder="ORDEM" value="{{$data->uf or old('uf')}}">--}}
                {{--</div>--}}
                {{--{{$combox1 = [--}}
                        {{--'1'=>'Não.',--}}
                        {{--'2'=>'Sim básico.',--}}
                        {{--'3'=>'Sim completo.',--}}
                        {{--'4'=>'Estou cursando',--}}
                        {{--]}}--}}

                {{--<div class="form-group">--}}
                    {{--<select name="curso_info" id="curso_info" class="form-control">--}}
                        {{--<option value="">Escolha a opção</option>--}}
                        {{--@foreach( $combox1 as $dado)--}}
                            {{--<option value="{{$dado->id}}"--}}

                                    {{--@if(isset($data->id_pacote) && $data->id_pacote == $pacote->id )--}}
                                    {{--selected--}}
                                    {{--@endif--}}
                            {{-->{{$pacote->nome}}</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</div>--}}


                <div class="prelaoder" style="display: none">Enviando os dados, por favor aguarde...</div>


                <div class="form-group">
                    <input type="submit" name="enviar" value="Salvar" class="btn btn-success">
                </div>


            </form>
    </div>
@endsection