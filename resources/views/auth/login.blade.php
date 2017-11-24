@extends('auth.app')

@section('content')
    <div class="col s12">
        <div class="row">
            <div class="col s12 m6 l6 offset-l2 offset-m2">
                <div class="card z-depth-5">
                    <div class="card-content black">
                        <span class="card-title"><img src="{{ asset('imagens/logo_pronac.png') }}" alt=""></span>


                    </div>
                    <div class="card-action">
                        <div class="row">
                            <form class="col s12" role="form" method="POST" action="{{ env('URL_ADMIN_LOGIN') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">perm_identity</i>
                                            <input id="email" type="email" name="email" class="validate {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email">Email</label>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">lock</i>
                                            <input id="password" type="password" name="password" class="validate {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password">Senha</label>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 ">
                                            <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : ''}}/>
                                            <label for="remember">Lembre-me?</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 center">
                                            <button class="btn waves-effect waves-light col s12 z-depth-4  blue-grey lighten-4" type="submit" name="action">
                                                Entrar
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col s12 right-align">
                                        <a class="" href="{{ url('/password/reset') }}">
                                            Esqueceu a Senha?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
