@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title">{{$title}}</span>

                        <br>
                        <div class="row"></div>
                        <div class="row">

                            <div class="input-field col s12">
                                <textarea id="textarea1" class="materialize-textarea">
@forelse( $data as $d ){{$d->celular}}
@empty Nenhum registro encontrado! @endforelse </textarea>
                                <label for="textarea1">Selecione</label>
                            </div>
                            

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection