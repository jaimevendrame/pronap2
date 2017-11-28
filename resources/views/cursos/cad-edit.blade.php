@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title">Cadastro de Cursos</span>

                        @if( isset($errors) && count ($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach( $errors->all() as $errors )
                                    {{$errors}} <br>
                                @endforeach
                            </div>
                        @endif


                        <div class="row">
                            @if( isset($data))
                                <form class="col s12 m12 l12" method="post" action="/admin/cursos/editar/{{$data->id}}" enctype="multipart/form-data">
                                    @else
                                        <form class="col s12 m12 l12" method="post" action="/admin/cursos/cadastrar" enctype="multipart/form-data">
                                            @endif
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="input-field col s12 m4 l4">
                                                    <select name="id_pacote">
                                                        <option value="">Escolha o Pacote</option>
                                                        @foreach( $pacotes as $pacote)
                                                            <option value="{{$pacote->id}}"

                                                                    @if(isset($data->id_pacote) && $data->id_pacote == $pacote->id )
                                                                    selected
                                                                    @endif
                                                            >{{$pacote->nome}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label>Pacotes</label>
                                                </div>
                                                <div class="input-field col s12 m8 l8">
                                                    <input id="nome" type="text" class="validate"  name="nome" value="{{$data->nome or old('nome')}}"
                                                           placeholder="NOME DO CURSO">
                                                </div>
                                                <div class="input-field col s12 m12 l12">
                                                    <textarea id="descricao" class="materialize-textarea" name="descricao">{{$data->descricao or old('descricao')}}</textarea>
                                                    <label for="descricao">DESCRIÇÃO</label>

                                                </div>
                                                <div class="input-field col s12 m12 l12">
                                                    <textarea id="objetivo" class="materialize-textarea" name="objetivo">{{$data->objetivo or old('objetivo')}}</textarea>
                                                    <label for="objetivo">OBJETIVO</label>
                                                </div>
                                                <div class="input-field col s12 m6 l6">
                                                    <input id="carga" type="text" class="validate"  name="carga" value="{{$data->carga or old('carga')}}"
                                                           placeholder="CARGA HORÁRIA">
                                                </div>
                                                <div class="input-field col s12 m6 l6">
                                                    <input id="ordem" type="text" class="validate"  name="ordem" value="{{$data->ordem or old('ordem')}}"
                                                           placeholder="ORDEM">
                                                </div>
                                                <div class="input-field col s12 m6 l6">
                                                    <input type="file" class="file" id="imagem" name="imagem">
                                                </div>

                                                <div class="input-field col s12 m2 l2 right">
                                                    <button class="btn waves-effect waves-light blue right" type="submit" name="action">Enviar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                        </div>

                    </div>
            </div>
        </div>
    </div>

@endsection