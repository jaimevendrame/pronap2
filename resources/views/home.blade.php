@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="">
            <div class="">
                <h5>Dashboard</h5>


                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    {{--@forelse($posts as $post)--}}
                        {{--@can('view-post',$post)--}}
                            {{--<h1>{{$post->title}}</h1>--}}
                            {{--<p>{{$post->description}}</p>--}}
                            {{--<b>Autor: {{$post->user->name}}</b>--}}
                            {{--<br>--}}
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
