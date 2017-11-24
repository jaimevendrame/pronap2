@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title">Cadastro de Funções</span>
                        @if( isset($errors) && count ($errors) > 0)
                            <div class="card-panel deep-orange darken-1">
                                @foreach( $errors->all() as $errors )
                                    {{$errors}} <br>
                                @endforeach
                            </div>
                        @endif
                        <div class="row">
                            @if( isset($data))
                                <form class="col s12 m12 l12" method="post" action="/admin/role/editar/{{$data->id}}" enctype="multipart/form-data">
                            @else
                               <form class="col s12 m12 l12" method="post" action="/admin/role/cadastrar" enctype="multipart/form-data">
                            @endif
                                   {{ csrf_field() }}
                                   <div class="row">
                                    <div class="input-field col s12 m5 l5">
                                        <input id="icon_prefix" type="text" class="validate"  name="name" value="{{$data->name or old('name')}}">
                                        <label for="icon_prefix">Nome</label>
                                    </div>
                                    <div class="input-field col s12 m5 l5">
                                        <input id="icon_telephone" type="tel" class="validate"  name="label" value="{{$data->label or old('label')}}">
                                        <label for="icon_telephone">Label</label>
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