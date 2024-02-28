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
            <h2>Clientes</h2>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-info mb-2 btn-volta" style="float: right;" id="btn-volta" onClick="ListaClientes()"><span class="sr-only">Voltar</span> <i class="fa fa-reply"></i></button>
            <button class="btn btn-primary" style="float: right;" type="button" id="btn-adiciona" onClick="MostrarCadastroCliente()">Adicionar</button>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="body">
                    <div id="tabela-cliente">
                        <div class="table-responsive">
                            <table class="table table-hover table-custom spacing5" id="tabela-clientes">
                                <thead>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody class="relative" id="listaCliente">
                                </tbody>
                            </table>
                        </div>
                        <div class="btn-group mt-2" id="pagination"></div>
                    </div>
                    <form method="post" id="form-cliente">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="idCliente" id="idCliente" value="0">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemCliente" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagemCliente" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Legenda imagem</label>
                                    <input type="text" class="form-control" id="legendaImagemCliente" name="legendaImagemCliente">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control" id="linkCliente" name="linkCliente">
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
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-cliente" onClick="AtualizaCliente()">Atualizar</button>
                                <button class="btn btn-success btn-cadastra" type="button" id="btn-cadastra-cliente" onClick="CadastraCliente()">Cadastrar</button>
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
        ListaClientes();
    });
</script>

<script defer>
    function ListaClientes() {
        $("#tabela-tag").hide();
        $("#form-cliente").hide();
        $("#btn-volta").hide();
        $("#btn-adiciona").show();
        $("#tabela-cliente").show();

        const lista = document.getElementById("listaCliente");
        let tabela1 = $('#tabela-clientes').DataTable();

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
                origem: "listaClientes"
            },
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);

            conteudoPagina.forEach(function(pagina) {

                const linha = document.createElement("tr");
                linha.classList.add("bg-cinza");

                linha.innerHTML = `
                        <td class="200">${pagina.legendaImagemCliente}</td>
                        <td>
                            <div style="display: flex; justify-content: flex-end;">
                                <button class="btn btn-success btn-sm btn-edita-cliente ml-2" id="${pagina.idCliente}" onClick="MostrarEdicaoCliente(this.id)">Editar</button>
                                <button class="btn btn-danger btn-sm btn-deleta-cliente ml-2" id="${pagina.idCliente}" onClick="DeletaCliente(this.id)">Deletar</button>
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

    function MostrarCadastroCliente() {
        $("#tabela-cliente").hide();
        $("#btn-adiciona").hide();
        $("#btn-atualiza-cliente").hide();
        $("#btn-cadastra-cliente").show();
        $("#form-cliente").show();
        $("#btn-volta").show();

        $("#form-cliente")[0].reset();
        $("#form-cliente").find("#imagemCliente")[0].src = "null";
    }

    function MostrarEdicaoCliente(idCliente) {
        $("#tabela-cliente").hide();
        $("#btn-adiciona").hide();
        $("#btn-cadastra-cliente").hide();
        $("#btn-atualiza-cliente").show();
        $("#form-cliente").show();
        $("#btn-volta").show();

        const formulario = $("#form-cliente");
        const idClienteFormulario = formulario.find("#idCliente")[0];
        const imagemCliente = formulario.find("#imagemCliente")[0];
        const legendaImagemCliente = formulario.find("#legendaImagemCliente")[0];
        const linkCliente = formulario.find("#linkCliente")[0];
        const status = formulario.find("#status")[0];

        $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "carregaCliente",
                idCliente: idCliente,
            }
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);

            idClienteFormulario.value = conteudoPagina.idCliente;
            legendaImagemCliente.value = conteudoPagina.legendaImagemCliente;
            linkCliente.value = conteudoPagina.linkCliente;
            status.value = conteudoPagina.status;

            imagemCliente.src = "../assets/uploads/" + conteudoPagina.imagemCliente;

        });
    }

    function AtualizaCliente() {
        const formulario = $("#form-cliente");
        const idCliente = formulario.find("#idCliente")[0];
        const imagemCliente = formulario.find("#imagemCliente")[0];
        const legendaImagemCliente = formulario.find("#legendaImagemCliente")[0];
        const linkCliente = formulario.find("#linkCliente")[0];
        const status = formulario.find("#status")[0];
        const botaoAtualiza = formulario.find("#btn-atualiza-cliente")[0];

        const srcimagemCliente = obterUltimoSegmentoDaURL(imagemCliente.src);

        const formData = new FormData();
        formData.append("origem", "atualizaCliente");
        formData.append("idCliente", idCliente.value);
        formData.append("imagemCliente", srcimagemCliente);
        formData.append("legendaImagemCliente", legendaImagemCliente.value);
        formData.append("linkCliente", linkCliente.value);
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

    function CadastraCliente() {
        const formulario = $("#form-cliente");
        const imagemCliente = formulario.find("#imagemCliente")[0];
        const legendaImagemCliente = formulario.find("#legendaImagemCliente")[0];
        const linkCliente = formulario.find("#linkCliente")[0];
        const status = formulario.find("#status")[0];
        const botaoCadastra = formulario.find("#btn-cadastra-cliente")[0];

        const srcimagemCliente = obterUltimoSegmentoDaURL(imagemCliente.src);

        const formData = new FormData();
        formData.append("origem", "cadastraCliente");
        formData.append("imagemCliente", srcimagemCliente);
        formData.append("legendaImagemCliente", legendaImagemCliente.value);
        formData.append("linkCliente", linkCliente.value);
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
                MostrarCadastroCliente();
            } else {
                toastr["error"]("Falha ao cadastrar!");
            }
        });
    }

    function DeletaCliente(id) {
        $.ajax({
            type: "POST",
            url: "backend/deleta-conteudo.php",
            data: {
                origem: "deletaCliente",
                idCliente: id
            },
        }).done(function(data) {

            toastr.options.timeOut = "2000";

            if (data) {
                toastr["success"]("Deletado com sucesso!");
                ListaClientes();
            } else {
                toastr["error"]("Falha ao deletar!");
            }

        });
    }
</script>
<?php
'';
?>