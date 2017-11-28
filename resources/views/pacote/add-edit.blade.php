@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title">Cadastro de Pacote</span>
                        @if( isset($errors) && count ($errors) > 0)
                            <div class="card-panel deep-orange darken-1">
                                @foreach( $errors->all() as $errors )
                                    {{$errors}} <br>
                                @endforeach
                            </div>
                        @endif
                        <div class="row">
                            @if( isset($data))
                                <form class="col s12 m12 l12" method="post" action="/admin/pacote/editar/{{$data->id}}" enctype="multipart/form-data">
                            @else
                               <form class="col s12 m12 l12" method="post" action="/admin/pacote/cadastrar" enctype="multipart/form-data">
                            @endif
                                   {{ csrf_field() }}
                                   <div class="row">
                                    <div class="input-field col s12 m6 l6">
                                        <input id="nome" type="text" class="validate"  name="nome" value="{{$data->nome or old('nome')}}"
                                        placeholder="Nome">
                                    </div>
                                    <div class="input-field col s12 m6 l6">
                                        <input id="ordem" type="text" class="validate"  name="ordem" value="{{$data->ordem or old('ordem')}}"
                                        placeholder="ORDEM">
                                    </div>
                                    <div class="input-field col s12 m2 l2 right">
                                        <button class="btn waves-effect waves-light blue right" type="submit" name="action">Enviar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection