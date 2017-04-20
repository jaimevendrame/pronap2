<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>PRONAP</title>
    <!--CSS Personalizado-->
    <link rel="stylesheet" href="{{url('assets/css/pronap.css')}}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
    <!-- Optional theme -->
    <link rel="stylesheet" href="{{url('assets/font-awesome/css/font-awesome.min.css')}}">
    <!-- Optional theme -->
    <link rel="stylesheet" href="{{url('assets/css/bootstrap-theme.min.css')}}">
    <!-- Chamadas JS -->
    <!--jQuery-->
    <script src="{{url('assets/js/jquery-3.2.0.min.js')}}"></script>
    <script src="{{url('assets/js/animatescroll/animatescroll.js')}}"></script>


    @yield('head_script_cursos')

</head>


<body>

@yield('home')

<div class="copyright text-center">
    <p class="copyrigth">CopyRigth PRONAP 2017 - Todos os direitos reservados</p>
</div>

<script type="text/javascript" src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/jquery.mask.js')}}"></script>
<script>
    $(function() {
        var selectedClass = "";
        $(".fil-cat").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(100, 0.1);
            $("#portfolio div").not("."+selectedClass).fadeOut().removeClass('scale-anm');
            setTimeout(function() {
                $("."+selectedClass).fadeIn().addClass('scale-anm');
                $("#portfolio").fadeTo(300, 1);
            }, 300);

        });
    });
</script>

<script>
    $(function () {
        jQuery("#form-add-aluno").submit(function () {
            $("#telefone").unmask();
            $("#cep").unmask();
            var dadosForm = jQuery(this).serialize();

            jQuery.ajax({
                url: 'add-aluno',
                data: dadosForm,
                method: 'POST',
                beforeSend: iniciaPreloader()



            }).done(function (data) {

                finalizaPreloader();

                if (data == '1') {
                    jQuery(".errors-msg").hide();

                    jQuery(".screen").hide();

                    jQuery(".success-msg").html(
                        "<h1>Seu Cadastro foi realizado com sucesso!</h1><br>" +
                        "<h4>Você receberá seu teste por SMS</h4>" +
                        "<button type='button' class='btn btn-default btn-lg' data-dismiss='modal' onclick='location.reload()'>Fechar</button>"
                    );
                    jQuery(".success-msg").show();

//                    setTimeout("location.reload();", 5000);

                } else {
                    jQuery(".errors-msg").html(data);
                    jQuery(".errors-msg").show();
                }
            }).fail(function () {
                finalizaPreloader();
                alert('Falha ao enviar dados!!');
            });


            return false;
        });

    });


    function iniciaPreloader() {
        jQuery(".prelaoder").show();
    }
    function finalizaPreloader() {
        jQuery(".prelaoder").hide();
    }

    jQuery(".btn-enviar").click(function () {

        //limpa formulário
        $("#form-add-aluno").trigger("reset");
        jQuery(".cep-msg ").hide();

        //aplica mascára nos inputs
        $('.telefone').mask('(00) 0 0000-0000');
        $('.cep').mask('00000-000');
    });
</script>

<!-- contato -->
<script>
    $(function () {
        jQuery("#especializati-form").submit(function () {

            var dadosForm = jQuery(this).serialize();

            jQuery.ajax({
                url: 'add-contato',
                data: dadosForm,
                method: 'POST',
                beforeSend: iniciaPreloader()



            }).done(function (data) {

                finalizaPreloader();

                if (data == '1') {
                    jQuery(".contato-errors-msg").hide();

//                    jQuery(".screen").hide();

                    jQuery(".contato-success-msg").html(
                        "<h4>Sua mensagem foi enviada com sucesso!</h4><br>" +
                        "<h4>Aguarde que entraremos em contato</h4>"
                    );
                    jQuery(".contato-success-msg").show();
                    $("#especializati-form").trigger("reset");

                    setTimeout(" jQuery('.contato-success-msg').hide();", 5000);

                } else {
                    jQuery(".contato-errors-msg").html(data);
                    jQuery(".contato- errors-msg").show();
                }
            }).fail(function () {
                finalizaPreloader();
                alert('Falha ao enviar dados!!');
            });


            return false;
        });

    });

</script>

@yield('scripts')

<!-- nova api cep -->

<script type="text/javascript" >

    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
            $("#cep-cidade").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep, #cep-cidade").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");
                    $("#cep-cidade").val("...");
                    $(':input[type="submit"]').prop('disabled', true);


                    //Consulta o webservice viacep.com.br/
                    $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);
                            $("#cep-cidade").val(dados.localidade);
                            $(':input[type="submit"]').prop('disabled', false);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });

</script>

<!-- Modal -->
<div class="modal fade" id="cadCandidato" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cadastra-se</h4>
            </div>
            <div class="modal-body">

                <div class="success-msg alert alert-success text-center" style="display:none;">
                    <h1>ATENÇÃO</h1>
                    <p>O seu cadastro foi realizado com sucesso!!</p>
                </div>

                <div class="screen">

                    <form method="post" action="/add-aluno" id="form-add-aluno" autocomplete="off">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control" id="InputName" name="nome" placeholder="NOME">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control telefone" id="telefone" name="celular"
                                   placeholder="CELULAR">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control cep" id="cep" name="cep" placeholder="CEP"
                                   >
                        </div>
                        <div class="form-group col-md-4">
                            <input class="form-control" name="bairro" type="text" id="bairro" placeholder="Bairro"
                                   readOnly="readOnly"/>
                        </div>
                        <div class="form-group col-md-4">
                            <input class="form-control" name="cidade" type="text" id="cidade" placeholder="Cidade"
                                   readOnly="readOnly"/>
                        </div>
                        <div class="form-group col-md-4">
                            <input class="form-control" name="uf" type="text" id="uf" placeholder="Estado"
                                   readOnly="readOnly"/>
                        </div>
                        {{--<div class=" form-group col-md-4">--}}
                        {{--<input class="form-control" name="ibge" type="text" id="ibge" placeholder="IBGE"--}}
                        {{--readOnly="readOnly"/>--}}
                        {{--</div>--}}

                        {{--<div class="cep-msg alert alert-info col-md-12" style="display:none;">--}}

                        {{--<div class="form-group col-md-8">--}}
                        {{--<input class="form-control" name="rua" type="text" id="rua" placeholder="rua"--}}
                        {{--readOnly="readOnly"/>--}}
                        {{--</div>--}}

                        {{--</div>--}}
                        <div class=" row">
                            <div class="col-md-12">

                                <div class="col-md-6">

                                    <strong> Já fez curso de Informática? </strong>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="curso_info" id="infoRadio1" value="1" checked>
                                            Não.
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="curso_info" id="infoRadio2" value="2">
                                            Sim básico.
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="curso_info" id="infoRadio3" value="3">
                                            Sim completo.
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="curso_info" id="infoRadio4" value="4">
                                            Estou cursando.
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <strong> Já fez curso de Inglês?</strong>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="curso_ingl" id="englishRadio1" value="1"
                                                   checked>
                                            Não.
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="curso_ingl" id="englishRadio2" value="2">
                                            Sim básico.
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="curso_ingl" id="englishRadio3" value="3">
                                            Sim completo.
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="curso_ingl" id="englishRadio4" value="4">
                                            Estou cursando.
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div>


                                </div>

                                <div class="col-md-6">
                                    <strong> Qual sua escolaridade? </strong>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="escolaridade" id="escolaRadio1" value="1"
                                                   checked>
                                            Fundamental cursando.
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="escolaridade" id="escolaRadio2" value="2">
                                            Fundamental completo.
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="escolaridade" id="escolaRadio3" value="3">
                                            Médio cursando.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="escolaridade" id="escolaRadio4" value="4">
                                            Médio completo.
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="escolaridade" id="escolaRadio5" value="5">
                                            Superior cursando.
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="escolaridade" id="escolaRadio6" value="6">
                                            Superior completo.
                                        </label>
                                    </div>
                                    <input type="hidden" name="in_teste" value="-1">

                                </div>
                            </div>
                            <div class="preloader" style="display:none;">Enviando dados</div>

                            <div class="modal-footer">

                                <div class="errors-msg alert alert-danger text-center" style="display:none;"></div>
                                <div class="prelaoder" id="prelaoder" style="display: none">Enviando dados...</div>
                                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Cancelar
                                </button>
                                <input type="submit" class="btn btn-primary btn-lg">
                            </div>

                        </div>

                    </form>
                </div><!-- end div screen -->
            </div>
        </div>
    </div>
</div>

</body>
</html>
