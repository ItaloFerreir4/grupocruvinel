<?php
include_once '../tema/assets/componentes/componentes.php';

ob_start();
seo();
$seo_content = ob_get_clean();

echo ''
?>
<div class="block-header">
    <div class="row clearfix">
        <div class="col-6">
            <h2>Agendas</h2>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-info mb-2 btn-volta" style="float: right;" id="btn-volta" onClick="ListaAgendas()"><span class="sr-only">Voltar</span> <i class="fa fa-reply"></i></button>
            <button class="btn btn-primary" style="float: right;" type="button" id="btn-adiciona" onClick="MostrarCadastroAgenda()">Adicionar</button>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="body">
                    <div id="tabela-agenda">
                        <div class="table-responsive">
                            <table class="table table-hover table-custom spacing5" id="tabela-agendas">
                                <thead>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody class="relative" id="listaAgenda">
                                </tbody>
                            </table>
                        </div>
                        <div class="btn-group mt-2" id="pagination"></div>
                    </div>
                    <form method="post" id="form-agenda">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="idAgenda" id="idAgenda" value="0">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="tituloAgenda" name="tituloAgenda">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemAgenda" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagemAgenda" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Legenda imagem</label>
                                    <input type="text" class="form-control" id="legendaImagemAgenda" name="legendaImagemAgenda">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Texto</label>
                                    <textarea class="form-control" id="textoAgenda" name="textoAgenda" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Data</label>
                                    <input type="date" class="form-control" name="dataAgenda" id="dataAgenda">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <input type="tipo" class="form-control" name="tipoAgenda" id="tipoAgenda">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Local</label>
                                    <input type="text" class="form-control" id="localAgenda" name="localAgenda">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">
                                    <label>Nome do botão</label>
                                    <input type="text" class="form-control" id="nomeBotao1" name="nomeBotao1">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">
                                    <label>Link do botão</label>
                                    <input type="text" class="form-control" id="linkBotao1" name="linkBotao1">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">
                                    <label>Target do botão</label>
                                    <select class="form-control" name="targetBotao1" id="targetBotao1">
                                        <option value="_blank">Blank</option>
                                        <option value="_self">Self</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Tags</label>
                                    <input type="text" class="form-control" id="tagsAgenda" name="tagsAgenda">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="0">Inativo</option>
                                        <option value="1">Ativo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-agenda" onClick="AtualizaAgenda()">Atualizar</button>
                                <button class="btn btn-success btn-cadastra" type="button" id="btn-cadastra-agenda" onClick="CadastraAgenda()">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script defer src="./tema/assets/vendor/toastr/toastr.js"></script>
<!-- Inclua o Bootstrap JS -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
<!-- Inclua o Bootstrap Multiselect JS -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<script>
    $(document).unbind("click").ready(function() {

        CKEDITOR.replace('textoAgenda');

        ListaAgendas();
    });
</script>

<script defer>
    function ListaAgendas() {
        $("#tabela-tag").hide();
        $("#form-agenda").hide();
        $("#btn-volta").hide();
        $("#btn-adiciona").show();
        $("#tabela-agenda").show();

        const lista = document.getElementById("listaAgenda");
        let tabela1 = $('#tabela-agendas').DataTable();

        tabela1.clear().draw();

        lista.innerHTML = `
            <span style="display: block; width: 200px; height: 200px;"></span>
            <div class="loader">Carregando
                <span></span>
            </div>
            `;

        $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "listaAgendas"
            },
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);

            conteudoPagina.forEach(function(pagina) {

                const linha = document.createElement("tr");
                linha.classList.add("bg-cinza");

                linha.innerHTML = `
                        <td class="200">${pagina.tituloAgenda}</td>
                        <td>
                            <div style="display: flex; justify-content: flex-end;">
                                <button class="btn btn-success btn-sm btn-edita-agenda ml-2" id="${pagina.idAgenda}" onClick="MostrarEdicaoAgenda(this.id)">Editar</button>
                                <button class="btn btn-danger btn-sm btn-deleta-agenda ml-2" id="${pagina.idAgenda}" onClick="DeletaAgenda(this.id)">Deletar</button>
                            </div>
                        </td>
                    `;

                tabela1.row.add(linha).draw();
            });

            if (conteudoPagina.length == 0) {
                tabela1.clear().draw();
            }

        });
    }

    function MostrarCadastroAgenda() {
        $("#tabela-agenda").hide();
        $("#btn-adiciona").hide();
        $("#btn-atualiza-agenda").hide();
        $("#btn-cadastra-agenda").show();
        $("#form-agenda").show();
        $("#btn-volta").show();

        $("#form-agenda")[0].reset();
        $("#form-agenda").find("#imagemAgenda")[0].src = "null";
    }

    function MostrarEdicaoAgenda(idAgenda) {
        $("#tabela-agenda").hide();
        $("#btn-adiciona").hide();
        $("#btn-cadastra-agenda").hide();
        $("#btn-atualiza-agenda").show();
        $("#form-agenda").show();
        $("#btn-volta").show();

        const formulario = $("#form-agenda");
        const idAgendaFormulario = formulario.find("#idAgenda")[0];
        const tituloAgenda = formulario.find("#tituloAgenda")[0];
        const imagemAgenda = formulario.find("#imagemAgenda")[0];
        const legendaImagemAgenda = formulario.find("#legendaImagemAgenda")[0];
        const dataAgenda = formulario.find("#dataAgenda")[0];
        const tipoAgenda = formulario.find("#tipoAgenda")[0];
        const nomeBotao1 = formulario.find("#nomeBotao1")[0];
        const linkBotao1 = formulario.find("#linkBotao1")[0];
        const targetBotao1 = formulario.find("#targetBotao1")[0];
        const tagsAgenda = formulario.find("#tagsAgenda")[0];
        const localAgenda = formulario.find("#localAgenda")[0];
        const status = formulario.find("#status")[0];

        const editor = CKEDITOR.instances['textoAgenda'];

        $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "carregaAgenda",
                idAgenda: idAgenda,
            }
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);
            let textoAgenda = conteudoPagina.textoAgenda;

            editor.setData(textoAgenda);

            idAgendaFormulario.value = conteudoPagina.idAgenda;
            tituloAgenda.value = conteudoPagina.tituloAgenda;
            legendaImagemAgenda.value = conteudoPagina.legendaImagemAgenda;
            dataAgenda.value = conteudoPagina.dataAgenda;
            tipoAgenda.value = conteudoPagina.tipoAgenda;
            nomeBotao1.value = conteudoPagina.nomeBotao1;
            linkBotao1.value = conteudoPagina.linkBotao1;
            targetBotao1.value = conteudoPagina.targetBotao1;
            tagsAgenda.value = conteudoPagina.tagsAgenda;
            localAgenda.value = conteudoPagina.localAgenda;
            status.value = conteudoPagina.status;

            imagemAgenda.src = "../assets/uploads/" + conteudoPagina.imagemAgenda;

        });
    }

    function AtualizaAgenda() {
        const formulario = $("#form-agenda");
        const idAgenda = formulario.find("#idAgenda")[0];
        const tituloAgenda = formulario.find("#tituloAgenda")[0];
        const imagemAgenda = formulario.find("#imagemAgenda")[0];
        const legendaImagemAgenda = formulario.find("#legendaImagemAgenda")[0];
        const dataAgenda = formulario.find("#dataAgenda")[0];
        const tipoAgenda = formulario.find("#tipoAgenda")[0];
        const nomeBotao1 = formulario.find("#nomeBotao1")[0];
        const linkBotao1 = formulario.find("#linkBotao1")[0];
        const targetBotao1 = formulario.find("#targetBotao1")[0];
        const tagsAgenda = formulario.find("#tagsAgenda")[0];
        const localAgenda = formulario.find("#localAgenda")[0];
        const status = formulario.find("#status")[0];
        const botaoAtualiza = formulario.find("#btn-atualiza-agenda")[0];

        const srcimagemAgenda = obterUltimoSegmentoDaURL(imagemAgenda.src);

        let nomeBlocoTexto = "textoAgenda";

        const editor = CKEDITOR.instances[nomeBlocoTexto];
        const textoAgenda = editor.getData();

        const formData = new FormData();
        formData.append("origem", "atualizaAgenda");
        formData.append("idAgenda", idAgenda.value);
        formData.append("tituloAgenda", tituloAgenda.value);
        formData.append("imagemAgenda", srcimagemAgenda);
        formData.append("legendaImagemAgenda", legendaImagemAgenda.value);
        formData.append("dataAgenda", dataAgenda.value);
        formData.append("tipoAgenda", tipoAgenda.value);
        formData.append("textoAgenda", textoAgenda);
        formData.append("nomeBotao1", nomeBotao1.value);
        formData.append("linkBotao1", linkBotao1.value);
        formData.append("targetBotao1", targetBotao1.value);
        formData.append("tagsAgenda", tagsAgenda.value);
        formData.append("localAgenda", localAgenda.value);
        formData.append("status", status.value);

        botaoAtualiza.innerHTML = "<i class='fa fa-spinner fa-spin'></i> <span>Carregando...</span>";

        $.ajax({
            type: "POST",
            url: "backend/atualiza-conteudo.php",
            data: formData,
            contentType: false, // Importante: não defina o tipo de conteúdo
            processData: false, // Importante: não processar os dados
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

    function CadastraAgenda() {
        const formulario = $("#form-agenda");
        const tituloAgenda = formulario.find("#tituloAgenda")[0];
        const imagemAgenda = formulario.find("#imagemAgenda")[0];
        const legendaImagemAgenda = formulario.find("#legendaImagemAgenda")[0];
        const dataAgenda = formulario.find("#dataAgenda")[0];
        const tipoAgenda = formulario.find("#tipoAgenda")[0];
        const nomeBotao1 = formulario.find("#nomeBotao1")[0];
        const linkBotao1 = formulario.find("#linkBotao1")[0];
        const targetBotao1 = formulario.find("#targetBotao1")[0];
        const tagsAgenda = formulario.find("#tagsAgenda")[0];
        const localAgenda = formulario.find("#localAgenda")[0];
        const status = formulario.find("#status")[0];
        const botaoCadastra = formulario.find("#btn-cadastra-agenda")[0];

        const srcimagemAgenda = obterUltimoSegmentoDaURL(imagemAgenda.src);

        let nomeBlocoTexto = "textoAgenda";

        const editor = CKEDITOR.instances[nomeBlocoTexto];
        const textoAgenda = editor.getData();

        const formData = new FormData();
        formData.append("origem", "cadastraAgenda");
        formData.append("tituloAgenda", tituloAgenda.value);
        formData.append("imagemAgenda", srcimagemAgenda);
        formData.append("legendaImagemAgenda", legendaImagemAgenda.value);
        formData.append("dataAgenda", dataAgenda.value);
        formData.append("tipoAgenda", tipoAgenda.value);
        formData.append("textoAgenda", textoAgenda);
        formData.append("nomeBotao1", nomeBotao1.value);
        formData.append("linkBotao1", linkBotao1.value);
        formData.append("targetBotao1", targetBotao1.value);
        formData.append("tagsAgenda", tagsAgenda.value);
        formData.append("localAgenda", localAgenda.value);
        formData.append("status", status.value);

        botaoCadastra.innerHTML = "<i class='fa fa-spinner fa-spin'></i> <span>Carregando...</span>";

        $.ajax({
            type: "POST",
            url: "backend/cadastro-conteudo.php",
            data: formData,
            contentType: false, // Importante: não defina o tipo de conteúdo
            processData: false, // Importante: não processar os dados
        }).done(function(data) {
            toastr.options.timeOut = "2000";

            botaoCadastra.innerHTML = "Cadastrar";

            if (data) {
                toastr["success"]("Cadastrado com sucesso!");
                MostrarCadastroAgenda()
            } else {
                toastr["error"]("Falha ao cadastrar!");
            }
        });
    }

    function DeletaAgenda(id) {
        $.ajax({
            type: "POST",
            url: "backend/deleta-conteudo.php",
            data: {
                origem: "deletaAgenda",
                idAgenda: id
            },
        }).done(function(data) {

            toastr.options.timeOut = "2000";

            if (data) {
                toastr["success"]("Deletado com sucesso!");
                ListaAgendas();
            } else {
                toastr["error"]("Falha ao deletar!");
            }

        });
    }
</script>
<?php
'';
?>