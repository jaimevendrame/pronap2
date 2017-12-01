@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title">Enviar SMS por Campanha</span>
                        @if( isset($errors) && count ($errors) > 0)
                            <div class="card-panel deep-orange darken-1">
                                @foreach( $errors->all() as $errors )
                                    {{$errors}} <br>
                                @endforeach
                            </div>
                        @endif
                        <div class="row">
                               <form class="col s12 m6 l6" method="post" action="/admin/sms/cadastrar" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                   <div class="row">
                                       <div class="input-field col s12 m12 l12">
                                           <select name="campanha[]">
                                               <option value="" disabled selected>Selecione</option>
                                               @forelse($campanhas as $c)
                                               <option value="{{$c->id}}">{{$c->title}}</option>
                                               @empty
                                                   @endforelse
                                               <option value="0">Órfãs</option>
                                           </select>
                                           <label>Escolha a Campanha?</label>
                                       </div>

                                       <div class="input-field col s12">
                                           <textarea id="texto" name="mensagem" onkeyup="limitaTextarea(this.value)" class="materialize-textarea"></textarea>
                                           <label for="texto">Mensagem</label>
                                           <span id="cont">155</span>
                                       </div>

                                    <div class="input-field col s12 m2 l2 right">
                                        <button class="btn waves-effect waves-light blue right hoverable" type="submit" name="action">Salvar
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