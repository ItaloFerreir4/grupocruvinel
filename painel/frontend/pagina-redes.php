<?php
include_once '../tema/assets/componentes/componentes.php';

echo ''
?>
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h2>Redes</h2>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="body">
                    <form method="post" id="formRede">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="origem" id="origem" value="atualizaRede">
                            <input type="hidden" class="form-control" name="idRede" id="idRede" value="1">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" class="form-control" id="instagram" name="instagram">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control" id="facebook" name="facebook">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Linkedin</label>
                                    <input type="text" class="form-control" id="linkedin" name="linkedin">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input type="text" class="form-control" id="twitter" name="twitter">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Telegram</label>
                                    <input type="text" class="form-control" id="telegram" name="telegram">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Pinterest</label>
                                    <input type="text" class="form-control" id="pinterest" name="pinterest">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Tiktok</label>
                                    <input type="text" class="form-control" id="tiktok" name="tiktok">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input type="text" class="form-control" id="youtube" name="youtube">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-rede" onClick="AtualizaRede()">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 hidden">
            <div class="card">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-6 col-sm-12">
                            <button class="btn btn-primary" type="button" id="btn-connect-insta" onClick="ConnectInsta()">Conectar</button>
                            <button class="btn btn-primary" type="button" id="btn-desconnect-insta" onClick="DesconnectInsta()">Desconectar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script defer src="./tema/assets/vendor/toastr/toastr.js"></script>

<script>
    $(document).unbind("click").ready(function() {

        CarregaRede(1);
        VerificaInsta();

    });
</script>

<script defer>
    function CarregaRede(idRede) {
        const instagram = $("#formRede").find("#instagram")[0];
        const facebook = $("#formRede").find("#facebook")[0];
        const linkedin = $("#formRede").find("#linkedin")[0];
        const twitter = $("#formRede").find("#twitter")[0];
        const telegram = $("#formRede").find("#telegram")[0];
        const pinterest = $("#formRede").find("#pinterest")[0];
        const tiktok = $("#formRede").find("#tiktok")[0];
        const youtube = $("#formRede").find("#youtube")[0];

        $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "carregaRedes",
                idRede: idRede
            }
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);

            instagram.value = conteudoPagina.instagram;
            facebook.value = conteudoPagina.facebook;
            linkedin.value = conteudoPagina.linkedin;
            twitter.value = conteudoPagina.twitter;
            telegram.value = conteudoPagina.telegram;
            pinterest.value = conteudoPagina.pinterest;
            tiktok.value = conteudoPagina.tiktok;
            youtube.value = conteudoPagina.youtube;

        });
    }

    function AtualizaRede() {

        const botaoAtualiza = $("#formRede").find("#btn-atualiza-rede")[0];
        botaoAtualiza.innerHTML = "<i class='fa fa-spinner fa-spin'></i> <span>Carregando...</span>";

        $.ajax({
            type: "POST",
            url: "backend/atualiza-conteudo.php",
            data: $("#formRede").serialize()
        }).done(function(data) {

            toastr.options.timeOut = "2000";

            botaoAtualiza.innerHTML = "Atualizar";

            if (data) {
                toastr["success"]("Atualizado com sucesso!");
            } else {
                toastr["error"]("Falha ao atualizar!");
            }


        });
    }

    function ConnectInsta(){
        $.ajax({		
            type: "POST",
            url: "backend/connect-insta.php",
            data: {
                origem: "connect"
            }
        }).done(function(data){

            console.log(data);

            window.location.replace(data);

        });
    }

    function VerificaInsta(){
        $.ajax({		
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "carregaInstagram"
            }
        }).done(function(data){

            const insta = JSON.parse(data);

            if (insta.token == '' || insta.token == null){
                $("#btn-desconnect-insta").hide();
                $("#btn-connect-insta").show();
            }
            else{
                $("#btn-connect-insta").hide();
                $("#btn-desconnect-insta").show();
            }

        });
    }

    function DesconnectInsta(){
        $.ajax({		
            type: "POST",
            url: "backend/atualiza-conteudo.php",
            data: {
                origem: "atualizaInstagram"
            }
        }).done(function(data){

            toastr.options.timeOut = "2000";

            if (data) {
                toastr["success"]("Desconectado com sucesso!");
                
                $("#btn-desconnect-insta").hide();
                $("#btn-connect-insta").show();

            } else {
                toastr["error"]("Falha ao desconectar!");
            }

        });
    }
</script>
<?php
'';
?>