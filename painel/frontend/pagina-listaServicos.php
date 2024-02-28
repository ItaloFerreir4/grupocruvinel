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
            <h2>Servicos</h2>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-info mb-2 btn-volta" style="float: right;" id="btn-volta" onClick="ListaServicos()"><span class="sr-only">Voltar</span> <i class="fa fa-reply"></i></button>
            <button class="btn btn-primary" style="float: right;" type="button" id="btn-adiciona" onClick="MostrarCadastroServico()">Adicionar</button>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="body">
                    <div id="tabela-servico">
                        <div class="table-responsive">
                            <table class="table table-hover table-custom spacing5" id="tabela-servicos">
                                <thead>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody class="relative" id="listaServico">
                                </tbody>
                            </table>
                        </div>
                        <div class="btn-group mt-2" id="pagination"></div>
                    </div>
                    <form method="post" id="form-servico">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="idServico" id="idServico" value="0">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="tituloServico" name="tituloServico">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemServico" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagemServico" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Legenda imagem</label>
                                    <input type="text" class="form-control" id="legendaImagemServico" name="legendaImagemServico">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control" id="linkServico" name="linkServico">
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
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-servico" onClick="AtualizaServico()">Atualizar</button>
                                <button class="btn btn-success btn-cadastra" type="button" id="btn-cadastra-servico" onClick="CadastraServico()">Cadastrar</button>
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
        ListaServicos();
    });
</script>

<script defer>
    function ListaServicos() {
        $("#tabela-tag").hide();
        $("#form-servico").hide();
        $("#btn-volta").hide();
        $("#btn-adiciona").show();
        $("#tabela-servico").show();

        const lista = document.getElementById("listaServico");
        let tabela1 = $('#tabela-servicos').DataTable();

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
                origem: "listaServicos"
            },
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);

            conteudoPagina.forEach(function(pagina) {

                const linha = document.createElement("tr");
                linha.classList.add("bg-cinza");

                linha.innerHTML = `
                        <td class="200">${pagina.tituloServico}</td>
                        <td>
                            <div style="display: flex; justify-content: flex-end;">
                                <button class="btn btn-success btn-sm btn-edita-servico ml-2" id="${pagina.idServico}" onClick="MostrarEdicaoServico(this.id)">Editar</button>
                                <button class="btn btn-danger btn-sm btn-deleta-servico ml-2" id="${pagina.idServico}" onClick="DeletaServico(this.id)">Deletar</button>
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

    function MostrarCadastroServico() {
        $("#tabela-servico").hide();
        $("#btn-adiciona").hide();
        $("#btn-atualiza-servico").hide();
        $("#btn-cadastra-servico").show();
        $("#form-servico").show();
        $("#btn-volta").show();

        $("#form-servico")[0].reset();
        $("#form-servico").find("#imagemServico")[0].src = "null";
    }

    function MostrarEdicaoServico(idServico) {
        $("#tabela-servico").hide();
        $("#btn-adiciona").hide();
        $("#btn-cadastra-servico").hide();
        $("#btn-atualiza-servico").show();
        $("#form-servico").show();
        $("#btn-volta").show();

        const formulario = $("#form-servico");
        const idServicoFormulario = formulario.find("#idServico")[0];
        const imagemServico = formulario.find("#imagemServico")[0];
        const legendaImagemServico = formulario.find("#legendaImagemServico")[0];
        const linkServico = formulario.find("#linkServico")[0];
        const status = formulario.find("#status")[0];

        $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "carregaServico",
                idServico: idServico,
            }
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);

            idServicoFormulario.value = conteudoPagina.idServico;
            tituloServico.value = conteudoPagina.tituloServico;
            legendaImagemServico.value = conteudoPagina.legendaImagemServico;
            linkServico.value = conteudoPagina.linkServico;
            status.value = conteudoPagina.status;

            imagemServico.src = "../assets/uploads/" + conteudoPagina.imagemServico;

        });
    }

    function AtualizaServico() {
        const formulario = $("#form-servico");
        const idServico = formulario.find("#idServico")[0];
        const tituloServico = formulario.find("#tituloServico")[0];
        const imagemServico = formulario.find("#imagemServico")[0];
        const legendaImagemServico = formulario.find("#legendaImagemServico")[0];
        const linkServico = formulario.find("#linkServico")[0];
        const status = formulario.find("#status")[0];
        const botaoAtualiza = formulario.find("#btn-atualiza-servico")[0];

        const srcimagemServico = obterUltimoSegmentoDaURL(imagemServico.src);

        const formData = new FormData();
        formData.append("origem", "atualizaServico");
        formData.append("idServico", idServico.value);
        formData.append("tituloServico", tituloServico.value);
        formData.append("imagemServico", srcimagemServico);
        formData.append("legendaImagemServico", legendaImagemServico.value);
        formData.append("linkServico", linkServico.value);
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

    function CadastraServico() {
        const formulario = $("#form-servico");
        const tituloServico = formulario.find("#tituloServico")[0];
        const imagemServico = formulario.find("#imagemServico")[0];
        const legendaImagemServico = formulario.find("#legendaImagemServico")[0];
        const linkServico = formulario.find("#linkServico")[0];
        const status = formulario.find("#status")[0];
        const botaoCadastra = formulario.find("#btn-cadastra-servico")[0];

        const srcimagemServico = obterUltimoSegmentoDaURL(imagemServico.src);

        const formData = new FormData();
        formData.append("origem", "cadastraServico");
        formData.append("tituloServico", tituloServico.value);
        formData.append("imagemServico", srcimagemServico);
        formData.append("legendaImagemServico", legendaImagemServico.value);
        formData.append("linkServico", linkServico.value);
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
                MostrarCadastroServico();
            } else {
                toastr["error"]("Falha ao cadastrar!");
            }
        });
    }

    function DeletaServico(id) {
        $.ajax({
            type: "POST",
            url: "backend/deleta-conteudo.php",
            data: {
                origem: "deletaServico",
                idServico: id
            },
        }).done(function(data) {

            toastr.options.timeOut = "2000";

            if (data) {
                toastr["success"]("Deletado com sucesso!");
                ListaServicos();
            } else {
                toastr["error"]("Falha ao deletar!");
            }

        });
    }
</script>
<?php
'';
?>