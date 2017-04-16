@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Gestão de Premios.</h2>

        @if( isset($errors) && count ($errors) > 0)
            <div class="alert alert-danger">
                @foreach( $errors->all() as $errors )
                    {{$errors}} <br>
                @endforeach
            </div>
        @endif
        @if( isset($data))
            <form class="form-group" method="post" action="/admin/premios/editar/{{$data->id}}">
        @else
            <form class="form-group" method="post" action="/admin/premios/cadastrar">
        @endif
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" id="InputName" name="nome"
                           placeholder="NOME DA PREMIAÇÃO" value="{{$data->nome or old('nome')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="InputName" name="qtde_insc"
                           placeholder="Qtde. Inscritos" value="{{$data->qtde_insc or old('qtde_insc')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="InputName" name="qtde_bolsas_integrais"
                           placeholder="Qtde. Bolsas Integrais" value="{{$data->qtde_bolsas_integrais or old('qtde_bolsas_integrais')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="InputName" name="qtde_bolsas_parciais"
                           placeholder="Qtde. Bolsas Parciais" value="{{$data->qtde_bolsas_parciais or old('qtde_bolsas_parciais')}}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="InputName" name="qtde_smartwatch"
                           placeholder="Qtde. Smartwatch" value="{{$data->qtde_smartwatch or old('qtde_smartwatch')}}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="InputName" name="qtde_tablets"
                           placeholder="Qtde. Tablets" value="{{$data->qtde_tablets or old('qtde_tablets')}}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="InputName" name="qtde_smartphone"
                           placeholder="Qtde. Smartphones" value="{{$data->qtde_smartphone or old('qtde_smartphone')}}">
                </div>


                <div class="prelaoder" style="display: none">Enviando os dados, por favor aguarde...</div>


                <div class="form-group">
                    <input type="submit" name="enviar" value="Salvar" class="btn btn-success">
                </div>


            </form>
    </div>
@endsection