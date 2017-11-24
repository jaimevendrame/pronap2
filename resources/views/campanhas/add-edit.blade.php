@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title">Cadastro de Campanhas</span>
                        @if( isset($errors) && count ($errors) > 0)
                            <div class="card-panel deep-orange darken-1">
                                @foreach( $errors->all() as $errors )
                                    {{$errors}} <br>
                                @endforeach
                            </div>
                        @endif
                        <div class="row">
                            @if( isset($data))
                                <form class="col s12 m12 l12" method="post" action="/admin/campanha/editar/{{$data->id}}" enctype="multipart/form-data">
                            @else
                               <form class="col s12 m12 l12" method="post" action="/admin/campanha/cadastrar" enctype="multipart/form-data">
                            @endif
                                   {{ csrf_field() }}
                                   <div class="row">
                                    <div class="input-field col s12 m6 l6">
                                        <input id="title" type="text" class="validate"  name="title" value="{{$data->title or old('title')}}"
                                        placeholder="Título">
                                    </div>
                                    <div class="input-field col s12 m6 l6">
                                        <input id="cep" type="tel" class="validate"  name="cep" value="{{$data->cep or old('cep')}}"
                                        placeholder="CEP">
                                    </div>
                                       <div class="input-field col s12 m6 l6">
                                           <input id="cidade" type="tel" class="validate"  name="cidade" value="{{$data->cidade or old('cidade')}}"
                                           placeholder="Cidade">
                                       </div>
                                       <div class="input-field col s12 m6 l6">
                                           <input id="uf" type="tel" class="validate"  name="uf" value="{{$data->uf or old('uf')}}"
                                           placeholder="Estado">
                                       </div>
                                       <div class="input-field col s12 m6 l6">
                                           <input id="ibge" type="tel" class="validate"  name="ibge" value="{{$data->ibge or old('ibge')}}"
                                           placeholder="Cóg.IBGE">
                                       </div>
                                       <div class="input-field col s12 m6 l6">
                                           <input id="dataInicioCampanha" type="date" class="datepicker"  name="dataInicioCampanha" value="{{$data->dataInicioCampanha or old('dataInicioCampanha')}}"
                                           placeholder="Data Início">
                                       </div>
                                       <div class="input-field col s12 m6 l6">
                                           <input id="dataTerminoCampanha" type="date" class="datepicker"  name="dataTerminoCampanha" value="{{$data->dataTerminoCampanha or old('dataTerminoCampanha')}}"
                                           placeholder="Data Fim">
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


    <div class="row">
        <div class="">
            <div class="">


                <div class="panel-body">

                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--You are logged in!--}}

                    {{--@forelse($posts as $post)--}}
                        {{--<h1>{{$post->title}}</h1>--}}
                        {{--<p>{{$post->description}}</p>--}}
                        {{--<b>Autor: {{$post->user->name}}</b>--}}
                        {{--<br>--}}
                        {{--@can('update-post',$post)--}}
                            {{--<a href="{{url("/post/$post->id/update")}}">Editar</a>--}}
                        {{--@endcan--}}
                    {{--@empty--}}
                        {{--<p>NENHUM POST CADASTRADO!</p>--}}
                    {{--@endforelse--}}
                </div>
            </div>
        </div>
    </div>
@endsection