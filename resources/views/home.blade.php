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

                        <div class="row">
                            <div class="col s12 m3">
                                <div class="card blue darken-1">
                                    <div class="card-content white-text">
                                        <span class="card-title"><h3>{{$campanhas->count()}}</h3></span>
                                        <p>Campanhas ativas</p>
                                    </div>

                                </div>
                            </div>

                            <div class="col s12 m3">
                                <div class="card blue lighten-1">
                                    <div class="card-content white-text">
                                        <span class="card-title"><h3>{{$leads->count()}}</h3></span>
                                        <p>Total Leads</p>
                                    </div>

                                </div>
                            </div>

                            <div class="col s12 m3">
                                <div class="card blue lighten-2">
                                    <div class="card-content white-text">
                                        <span class="card-title"><h3>{{$leadsOrfao->count()}}</h3></span>
                                        <p>Total Leads Órfãs</p>
                                    </div>

                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
