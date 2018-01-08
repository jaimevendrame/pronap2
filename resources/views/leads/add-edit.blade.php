@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title">Cadastro de Leads</span>
                        @if( isset($errors) && count ($errors) > 0)
                            <div class="card-panel deep-orange darken-1">
                                @foreach( $errors->all() as $errors )
                                    {{$errors}} <br>
                                @endforeach
                            </div>
                        @endif
                        <div class="row">
                            @if( isset($data))
                                <form class="col s12 m6 l6" method="post" action="/admin/leads/editar/{{$data->id}}" enctype="multipart/form-data">
                            @else
                               <form class="col s12 m6 l6" method="post" action="/admin/leads/cadastrar" enctype="multipart/form-data">
                            @endif
                                   {{ csrf_field() }}
                                   <div class="row">
                                    <div class="input-field col s12 m12 l12">
                                        <input id="nome" type="text" class="validate"  name="nome" value="{{$data->nome or old('nome')}}"
                                        placeholder="Nome">
                                    </div>
                                       <div class="input-field col s12 m12 l12">
                                           <input id="email" type="text" class="validate"  name="email" value="{{$data->email or old('email')}}"
                                                  placeholder="Email">
                                       </div>

                                       <div class="input-field col s12 m6 l6">
                                        <input id="celular" type="tel" class="validate"  name="celular" value="{{$data->celular or old('celular')}}"
                                        placeholder="Celular">
                                    </div>
                                    <div class="input-field col s12 m6 l6">
                                        <input id="cep" type="tel" class="validate"  name="cep" value="{{$data->cep or old('cep')}}"
                                        placeholder="CEP">
                                    </div>
                                       <div class="input-field col s12 m6 l6">
                                           <input id="cidade" type="tel" class="validate"  name="cidade" value="{{$data->cidade or old('cidade')}}"
                                           placeholder="Cidade">
                                       </div>
                                       <div class="input-field col s12 m2 l2">
                                           <input id="uf" type="tel" class="validate"  name="uf" value="{{$data->uf or old('uf')}}"
                                           placeholder="Estado">
                                       </div>
                                       <div class="input-field col s12 m4 l4">
                                           <input id="ibge" type="tel" class="validate"  name="ibge" value="{{$data->ibge or old('ibge')}}"
                                           placeholder="Cóg.IBGE">
                                       </div>
                                       <div class="input-field col s12 m4 l4">
                                           <select name="matriculado">
                                               <option value="" disabled selected>Selecione</option>
                                               <option value="SIM" @if(isset($data->matriculado) && $data->matriculado == 'SIM') selected @endif>SIM</option>
                                               <option value="NAO" @if(isset($data->matriculado) && $data->matriculado == 'NAO') selected @endif>NÃO</option>
                                           </select>
                                           <label>Matriculado?</label>
                                       </div>
                                       <div class="input-field col s12 m4 l4">
                                           <select name="sms">
                                               <option value="" disabled selected>Selecione</option>
                                               <option value="SIM" @if(isset($data->sms) && $data->sms == 'SIM') selected @endif>SIM</option>
                                               <option value="NAO" @if(isset($data->sms) && $data->sms == 'NAO') selected @endif>NÃO</option>
                                           </select>
                                           <label>SMS Enviado?</label>
                                       </div>

                                    <div class="input-field col s12 m2 l2 right">
                                        <button class="btn waves-effect waves-light blue right hoverable" type="submit" name="action">Salvar
                                        </button>
                                    </div>
                                </div>
                                   <a href="/admin/word/{{$data->nome}}/{{$data->celular}}/{{$data->email}}/{{$data->cidade}}/{{$data_atual}}" class="btn">contrato</a>

                               </form>

                                        <div class="col s12 m6">

                                            <div class="row">
                                                <div class="col s12">
                                                    <ul class="tabs">
                                                        <li class="tab col s6"><a href="#test1">SMS</a></li>
                                                        <li class="tab col s6"><a class="active" href="#test2">Matricular</a></li>
                                                    </ul>
                                                </div>
                                                <div id="test1" class="col s12">
                                                    <div class="card light-blue darken-4 hoverable">
                                                        <div class="card-content white-text">
                                                            <span class="card-title">Enviar SMS</span>
                                                            @if( isset($falhas) && count ($falhas) > 0)
                                                                <div class="card-panel deep-orange darken-1">
                                                                    @foreach( $falhas->all() as $falha )
                                                                        {{$falha}} <br>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                            <div class="row">
                                                                <form class="col s12" method="post" action="/admin/leads/sms" enctype="multipart/form-data">
                                                                    {{ csrf_field() }}

                                                                    <div class="row">
                                                                        <div class="input-field col s12" >
                                                                            <input id="fone" type="text" name="cell" value="{{$data->celular or old('celular')}}" readonly>
                                                                            <input type="hidden" name="id" value="{{$data->id or old('id')}}">
                                                                            <label for="fone">Celular</label>
                                                                        </div>
                                                                        <div class="input-field col s12">
                                                                            <textarea id="texto" name="mensagem" onkeyup="limitaTextarea(this.value)" class="materialize-textarea">OLA {{$data->nome or old('id')}}</textarea>
                                                                            <label for="texto">Mensagem</label>
                                                                        </div>
                                                                        <div class="input-field col s12 m2 l2 right">
                                                                            <button class="btn waves-effect waves-light blue right hoverable" type="submit" name="action">ENVIAR SMS
                                                                            </button>
                                                                        </div>
                                                                        <span id="cont">155</span>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="test2" class="col s12">
                                                    <div class="card light-blue darken-4 hoverable">
                                                        <div class="card-content white-text">
                                                            <span class="card-title">Matricular Aluno</span>
                                                            @if( isset($falhas) && count ($falhas) > 0)
                                                                <div class="card-panel deep-orange darken-1">
                                                                    @foreach( $falhas->all() as $falha )
                                                                        {{$falha}} <br>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                            <div class="row">
                                                                <form class="col s12" method="post" action="" enctype="multipart/form-data">
                                                                    {{ csrf_field() }}

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <select multiple icons>
                                                                                <option value="" disabled selected>Selecione os Cursos</option>
                                                                                @forelse($cursos as $c)
                                                                                <option value="{{$c->id}}" data-icon="{{url('assets/uploads/img-cursos/')}}/{{$c->imagem}}" class="circle">{{$c->nome}}</option>
                                                                                @empty
                                                                                    <option value="" disabled selected>nenhum registro</option>
                                                                                @endforelse
                                                                            </select>
                                                                            <label>Cursos</label>
                                                                        </div>
                                                                        <div class="input-field col s12">
                                                                            <textarea id="texto" name="obs" class="materialize-textarea"></textarea>
                                                                            <label for="texto">Observações</label>
                                                                        </div>
                                                                        <div class="input-field col s12 m2 l2 right">
                                                                            <button class="btn waves-effect waves-light blue right hoverable" type="submit" name="action">MATRICULAR
                                                                            </button>
                                                                        </div>
                                                                        <a href="/admin/word" class="btn"></a></A>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                        </div>
                        <div class="row">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection