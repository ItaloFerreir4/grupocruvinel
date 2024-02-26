<?php
include_once '../tema/assets/componentes/componentes.php';

echo ''
?>
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h2>Contatos</h2>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="body">
                    <form method="post" id="formContato">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="origem" id="origem" value="atualizaContato">
                            <input type="hidden" class="form-control" name="idContato" id="idContato" value="1">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Whatsapp</label>
                                    <input type="text" class="form-control" id="whatsappContato" name="whatsappContato" onkeyup="mascaraTel(this);" maxlength="15">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Mensagem Whatsapp</label>
                                    <textarea class="form-control" id="mensagemWhatsapp" name="mensagemWhatsapp"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input type="text" class="form-control" id="telefoneContato" name="telefoneContato" onkeyup="mascaraTel(this);" maxlength="15">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="emailContato" name="emailContato">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" id="enderecoContato" name="enderecoContato">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Iframe mapa</label>
                                    <textarea class="form-control" id="mapa" name="mapa" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-contato" onClick="AtualizaContato()">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script defer src="./tema/assets/vendor/toastr/toastr.js"></script>

<script>
    $(document).unbind("click").ready(function() {

        CarregaContato(1);

    });
</script>

<script defer>
    function CarregaContato(idContato) {
        const whatsappContato = $("#formContato").find("#whatsappContato")[0];
        const mensagemWhatsapp = $("#formContato").find("#mensagemWhatsapp")[0];
        const telefoneContato = $("#formContato").find("#telefoneContato")[0];
        const enderecoContato = $("#formContato").find("#enderecoContato")[0];
        const emailContato = $("#formContato").find("#emailContato")[0];
        const mapa = $("#formContato").find("#mapa")[0];

        $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "carregaContatos",
                idContato: idContato
            }
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);

            let link = conteudoPagina.linkWhatsappContato;
            const parametros = new URLSearchParams(link);

            whatsappContato.value = conteudoPagina.whatsappContato;
            telefoneContato.value = conteudoPagina.telefoneContato;
            enderecoContato.value = conteudoPagina.enderecoContato;
            emailContato.value = conteudoPagina.emailContato;
            mapa.value = conteudoPagina.mapa;
            mensagemWhatsapp.value = parametros.get("text");

        });
    }

    function AtualizaContato() {

        const botaoAtualiza = $("#formContato").find("#btn-atualiza-contato")[0];
        const idContato = $("#formContato").find("#idContato").val();
        const whatsappContato = $("#formContato").find("#whatsappContato").val();
        const mensagemWhatsapp = $("#formContato").find("#mensagemWhatsapp").val();
        const telefoneContato = $("#formContato").find("#telefoneContato").val();
        const enderecoContato = $("#formContato").find("#enderecoContato").val();
        const emailContato = $("#formContato").find("#emailContato").val();
        const mapa = $("#formContato").find("#mapa").val();

        botaoAtualiza.innerHTML = "<i class='fa fa-spinner fa-spin'></i> <span>Carregando...</span>";

        const numeroWhats = whatsappContato.replace(/[\(\)\-\s]/g, '');

        const linkWhatsapp = "https://api.whatsapp.com/send?phone=" + numeroWhats + "&text=" + mensagemWhatsapp;

        const formData = new FormData();
        formData.append('origem', "atualizaContato");
        formData.append('idContato', idContato);
        formData.append('whatsappContato', whatsappContato);
        formData.append('linkWhatsappContato', linkWhatsapp);
        formData.append('telefoneContato', telefoneContato);
        formData.append('enderecoContato', enderecoContato);
        formData.append('emailContato', emailContato);
        formData.append('mapa', mapa);

        $.ajax({
            type: "POST",
            url: "backend/atualiza-conteudo.php",
            data: formData,
            contentType: false, // Importante: não defina o tipo de conteúdo
            processData: false,
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
</script>
<?php
'';
?>