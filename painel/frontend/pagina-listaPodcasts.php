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
            <h2>Podcasts</h2>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-info mb-2 btn-volta" style="float: right;" id="btn-volta" onClick="ListaPodcasts()"><span class="sr-only">Voltar</span> <i class="fa fa-reply"></i></button>
            <button class="btn btn-primary" style="float: right;" type="button" id="btn-adiciona" onClick="MostrarCadastroPodcast()">Adicionar</button>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="body">
                    <div id="tabela-podcast">
                        <div class="table-responsive">
                            <table class="table table-hover table-custom spacing5" id="tabela-podcasts">
                                <thead>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody class="relative" id="listaPodcast">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form method="post" id="form-podcast">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="idPodcast" id="idPodcast" value="0">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="tituloPodcast" name="tituloPodcast">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemPodcast" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagemPodcast" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Legenda Imagem</label>
                                    <input type="text" class="form-control" id="legendaImagemPodcast" name="legendaImagemPodcast">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Autor</label>
                                    <input type="text" class="form-control" id="nomeAutorPodcast" name="nomeAutorPodcast">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Imagem autor</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemAutorPodcast" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid h50 objContain" id="imagemAutorPodcast" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Tempo</label>
                                    <input type="text" class="form-control" id="tempoPodcast" name="tempoPodcast">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Numero do episodio</label>
                                    <input type="text" class="form-control" id="qtdEpPodcast" name="qtdEpPodcast">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Data</label>
                                    <input type="date" class="form-control" name="dataPodcast" id="dataPodcast">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Categorias</label>
                                    <select style="width: 100%;" class="form-control" name="categoriasId" id="categoriasId" multiple="multiple"></select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Tags</label>
                                    <input type="text" class="form-control" name="tagsPodcast" id="tagsPodcast">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Iframe</label>
                                    <textarea class="form-control" name="iframePodcast" id="iframePodcast" row="10"></textarea>
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
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-podcast" onClick="AtualizaPodcast()">Atualizar</button>
                                <button class="btn btn-success btn-cadastra" type="button" id="btn-cadastra-podcast" onClick="CadastraPodcast()">Cadastrar</button>
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

        ListaPodcasts();
        CarregaCategorias(4);

        $('#categoriasId').select2({
            placeholder: 'Pesquisar...',
        });
    });
</script>

<script defer>
    function ListaPodcasts() {
        $("#form-podcast").hide();
        $("#btn-volta").hide();
        $("#btn-adiciona").show();
        $("#tabela-podcast").show();

        const lista = document.getElementById("listaPodcast");
        let tabela1 = $('#tabela-podcasts').DataTable();

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
                origem: "listaPodcasts"
            },
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);

            conteudoPagina.forEach(function(pagina) {

                const linha = document.createElement("tr");
                linha.classList.add("bg-cinza");

                linha.innerHTML = `
                        <td class="200">${pagina.tituloPodcast}</td>
                        <td>
                            <div style="display: flex; justify-content: flex-end;">
                                <button class="btn btn-success btn-sm btn-edita-podcast ml-2" id="${pagina.idPodcast}" onClick="MostrarEdicaoPodcast(this.id)">Editar</button>
                                <button class="btn btn-danger btn-sm btn-deleta-podcast ml-2" id="${pagina.idPodcast}" onClick="DeletaPodcast(this.id)">Deletar</button>
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

    function CarregaCategorias(tipoCategoria) {

        const select = document.getElementById("categoriasId");

        $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "listaCategorias",
                tipoCategoria: tipoCategoria
            },
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);

            conteudoPagina.forEach(function(pagina) {

                let option = document.createElement('option');

                option.value = pagina.idCategoria;
                option.textContent = pagina.nomeCategoria;

                select.appendChild(option);
            });

        });
    }

    function MostrarCadastroPodcast() {
        $("#tabela-podcast").hide();
        $("#btn-adiciona").hide();
        $("#btn-atualiza-podcast").hide();
        $("#btn-cadastra-podcast").show();
        $("#form-podcast").show();
        $("#btn-volta").show();

        $("#form-podcast")[0].reset();
        $("#categoriasId").val(null).trigger('change');
    }

    function MostrarEdicaoPodcast(idPodcast) {
        $("#tabela-podcast").hide();
        $("#btn-adiciona").hide();
        $("#btn-cadastra-podcast").hide();
        $("#btn-atualiza-podcast").show();
        $("#form-podcast").show();
        $("#btn-volta").show();

        const formulario = $("#form-podcast");
        const idPodcastFormulario = formulario.find("#idPodcast")[0];
        const tituloPodcast = formulario.find("#tituloPodcast")[0];
        const imagemPodcast = formulario.find("#imagemPodcast")[0];
        const legendaImagemPodcast = formulario.find("#legendaImagemPodcast")[0];
        const nomeAutorPodcast = formulario.find("#nomeAutorPodcast")[0];
        const imagemAutorPodcast = formulario.find("#imagemAutorPodcast")[0];
        const tempoPodcast = formulario.find("#tempoPodcast")[0];
        const qtdEpPodcast = formulario.find("#qtdEpPodcast")[0];
        const dataPodcast = formulario.find("#dataPodcast")[0];
        const tagsPodcast = formulario.find("#tagsPodcast")[0];
        const iframePodcast = formulario.find("#iframePodcast")[0];
        const status = formulario.find("#status")[0];

        $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "carregaPodcast",
                idPodcast: idPodcast,
            }
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);

            idPodcastFormulario.value = conteudoPagina.idPodcast;
            tituloPodcast.value = conteudoPagina.tituloPodcast;
            legendaImagemPodcast.value = conteudoPagina.legendaImagemPodcast;
            nomeAutorPodcast.value = conteudoPagina.nomeAutorPodcast;
            tempoPodcast.value = conteudoPagina.tempoPodcast;
            qtdEpPodcast.value = conteudoPagina.qtdEpPodcast;
            dataPodcast.value = conteudoPagina.dataPodcast;
            tagsPodcast.value = conteudoPagina.tagsPodcast;
            iframePodcast.value = conteudoPagina.iframePodcast;
            status.value = conteudoPagina.status;

            imagemPodcast.src = "../assets/uploads/" + conteudoPagina.imagemPodcast;
            imagemAutorPodcast.src = "../assets/uploads/" + conteudoPagina.imagemAutorPodcast;

            let valorCategorias = conteudoPagina.categoriasId;
            if (valorCategorias) {
                $('#categoriasId').val(JSON.parse(valorCategorias));
                $('#categoriasId').trigger('change');
            }
        });
    }

    function AtualizaPodcast() {
        const formulario = $("#form-podcast");
        const idPodcast = formulario.find("#idPodcast")[0];
        const tituloPodcast = formulario.find("#tituloPodcast")[0];
        const imagemPodcast = formulario.find("#imagemPodcast")[0];
        const legendaImagemPodcast = formulario.find("#legendaImagemPodcast")[0];
        const nomeAutorPodcast = formulario.find("#nomeAutorPodcast")[0];
        const imagemAutorPodcast = formulario.find("#imagemAutorPodcast")[0];
        const tempoPodcast = formulario.find("#tempoPodcast")[0];
        const qtdEpPodcast = formulario.find("#qtdEpPodcast")[0];
        const dataPodcast = formulario.find("#dataPodcast")[0];
        const tagsPodcast = formulario.find("#tagsPodcast")[0];
        const iframePodcast = formulario.find("#iframePodcast")[0];
        const status = formulario.find("#status")[0];
        const botaoAtualiza = formulario.find("#btn-atualiza-podcast")[0];

        let categoriasId = formulario.find("#categoriasId").val();

        categoriasId = JSON.stringify(categoriasId);

        const srcimagemPodcast = obterUltimoSegmentoDaURL(imagemPodcast.src);
        const srcimagemAutorPodcast = obterUltimoSegmentoDaURL(imagemAutorPodcast.src);

        const formData = new FormData();
        formData.append("origem", "atualizaPodcast");
        formData.append("idPodcast", idPodcast.value);
        formData.append("tituloPodcast", tituloPodcast.value);
        formData.append("imagemPodcast", srcimagemPodcast);
        formData.append("legendaImagemPodcast", legendaImagemPodcast.value);
        formData.append("imagemAutorPodcast", srcimagemAutorPodcast);
        formData.append("nomeAutorPodcast", nomeAutorPodcast.value);
        formData.append("tempoPodcast", tempoPodcast.value);
        formData.append("qtdEpPodcast", qtdEpPodcast.value);
        formData.append("dataPodcast", dataPodcast.value);
        formData.append("tagsPodcast", tagsPodcast.value);
        formData.append("iframePodcast", iframePodcast.value);
        formData.append("status", status.value);
        formData.append("categoriasId", categoriasId);

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

    function CadastraPodcast() {
        const formulario = $("#form-podcast");
        const idPodcast = formulario.find("#idPodcast")[0];
        const tituloPodcast = formulario.find("#tituloPodcast")[0];
        const imagemPodcast = formulario.find("#imagemPodcast")[0];
        const legendaImagemPodcast = formulario.find("#legendaImagemPodcast")[0];
        const nomeAutorPodcast = formulario.find("#nomeAutorPodcast")[0];
        const imagemAutorPodcast = formulario.find("#imagemAutorPodcast")[0];
        const tempoPodcast = formulario.find("#tempoPodcast")[0];
        const qtdEpPodcast = formulario.find("#qtdEpPodcast")[0];
        const dataPodcast = formulario.find("#dataPodcast")[0];
        const tagsPodcast = formulario.find("#tagsPodcast")[0];
        const iframePodcast = formulario.find("#iframePodcast")[0];
        const status = formulario.find("#status")[0];
        const botaoCadastra = formulario.find("#btn-cadastra-podcast")[0];

        let categoriasId = formulario.find("#categoriasId").val();

        categoriasId = JSON.stringify(categoriasId);

        const srcimagemPodcast = obterUltimoSegmentoDaURL(imagemPodcast.src);
        const srcimagemAutorPodcast = obterUltimoSegmentoDaURL(imagemAutorPodcast.src);

        const formData = new FormData();
        formData.append("origem", "cadastraPodcast");
        formData.append("tituloPodcast", tituloPodcast.value);
        formData.append("nomeAutorPodcast", nomeAutorPodcast.value);
        formData.append("imagemAutorPodcast", srcimagemAutorPodcast);
        formData.append("imagemPodcast", srcimagemPodcast);
        formData.append("legendaImagemPodcast", legendaImagemPodcast.value);
        formData.append("tempoPodcast", tempoPodcast.value);
        formData.append("qtdEpPodcast", qtdEpPodcast.value);
        formData.append("dataPodcast", dataPodcast.value);
        formData.append("iframePodcast", iframePodcast.value);
        formData.append("tagsPodcast", tagsPodcast.value);
        formData.append("status", status.value);
        formData.append("categoriasId", categoriasId);

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

            console.log(data);

            if (data) {
                toastr["success"]("Cadastrado com sucesso!");
                MostrarCadastroPodcast()
            } else {
                toastr["error"]("Falha ao cadastrar!");
            }
        });
    }

    function DeletaPodcast(id) {
        $.ajax({
            type: "POST",
            url: "backend/deleta-conteudo.php",
            data: {
                origem: "deletaPodcast",
                idPodcast: id
            },
        }).done(function(data) {

            toastr.options.timeOut = "2000";

            if (data) {
                toastr["success"]("Deletado com sucesso!");
                ListaPodcasts();
            } else {
                toastr["error"]("Falha ao deletar!");
            }

        });
    }
</script>
<?php
'';
?>