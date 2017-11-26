@extends('Home.layouts.index')

@section('content')

    <div class="capa2">
        <div class="texto-capa">

            <div class="row">

                <h2>CIDADES PARTICIPANTES</h2>
                <p>O <strong>PRONAC</strong> atua em todo o Brasil, sendo que em algumas localidades a matrícula é presencial.</p>

            </div>
            <div class="row padding-40">
                <p><strong>Veja se seu município está participando.</strong></p>
                <div class="form-group col-md-4 col-md-offset-4">
                    <select name="estados-brasil" class="form-control">
                        <option value="">Selecione seu estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>


            </div>

        </div>

    </div>
@endsection