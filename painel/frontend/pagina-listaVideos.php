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
            <h2>Videos</h2>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-info mb-2 btn-volta" style="float: right;" id="btn-volta" onClick="ListaVideos()"><span class="sr-only">Voltar</span> <i class="fa fa-reply"></i></button>
            <button class="btn btn-primary" style="float: right;" type="button" id="btn-adiciona" onClick="MostrarCadastroVideo()">Adicionar</button>
            <ol class="breadcrumb" id="btns-detaques" style="float: right;">
                <button type="button" class="btn btn-primary" id="destaca">Destacar</button>
                <button type="button" class="btn btn-primary" id="tirardestaque">Tira Destaque</button>
            </ol>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="body">
                    <div id="tabela-video">
                        <div class="table-responsive">
                            <table class="table table-hover table-custom spacing5" id="tabela-videos">
                                <thead>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody class="relative" id="listaVideo">
                                </tbody>
                            </table>
                        </div>
                        <div class="btn-group mt-2" id="pagination"></div>
                    </div>
                    <form method="post" id="form-video">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="idVideo" id="idVideo" value="0">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="tituloVideo" name="tituloVideo">
                                </div>
                            </div>
                            <div class="col-12 hidden">
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemVideo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <button class="btn btn-default" imagem="imagemVideo" type="button" target="modalMidia" onClick="TirarImagem(this)">Tirar Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagemVideo" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-12 hidden">
                                <div class="form-group">
                                    <label>Legenda imagem</label>
                                    <input type="text" class="form-control" id="legendaImagemVideo" name="legendaImagemVideo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Nome autor</label>
                                    <input type="text" class="form-control" id="nomeAutorVideo" name="nomeAutorVideo">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Imagem autor</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemAutorVideo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid h50 objContain" id="imagemAutorVideo" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Categorias</label>
                                    <select style="width: 100%;" class="form-control" name="categoriaVideo" id="categoriaVideo" multiple="multiple"></select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Data</label>
                                    <input type="date" class="form-control" name="dataVideo" id="dataVideo">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Iframe</label>
                                    <input type="text" class="form-control" id="iframeVideo" name="iframeVideo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Tags</label>
                                    <input type="text" class="form-control" id="tagsVideo" name="tagsVideo">
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
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-video" onClick="AtualizaVideo()">Atualizar</button>
                                <button class="btn btn-success btn-cadastra" type="button" id="btn-cadastra-video" onClick="CadastraVideo()">Cadastrar</button>
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

        ListaVideos();
        CarregaCategorias(3);

        $('#categoriaVideo').select2({
            placeholder: 'Pesquisar...',
        });
    });
</script>

<script defer>
    function ListaVideos() {
        $("#tabela-tag").hide();
        $("#form-video").hide();
        $("#btn-volta").hide();
        $("#btns-detaques").hide();
        $("#btn-adiciona").show();
        $("#tabela-video").show();

        const lista = document.getElementById("listaVideo");
        let tabela1 = $('#tabela-videos').DataTable();

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
                origem: "listaVideos"
            },
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);

            conteudoPagina.forEach(function(pagina) {

                const linha = document.createElement("tr");
                linha.classList.add("bg-cinza");

                linha.innerHTML = `
                        <td class="200">${pagina.tituloVideo}</td>
                        <td>
                            <div style="display: flex; justify-content: flex-end;">
                                <button class="btn btn-success btn-sm btn-edita-video ml-2" id="${pagina.idVideo}" onClick="MostrarEdicaoVideo(this.id)">Editar</button>
                                <button class="btn btn-danger btn-sm btn-deleta-video ml-2" id="${pagina.idVideo}" onClick="DeletaVideo(this.id)">Deletar</button>
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

        const select = document.getElementById("categoriaVideo");

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

    function MostrarCadastroVideo() {
        $("#tabela-video").hide();
        $("#btn-adiciona").hide();
        $("#btns-detaques").hide();
        $("#btn-atualiza-video").hide();
        $("#btn-cadastra-video").show();
        $("#form-video").show();
        $("#btn-volta").show();

        $("#form-video")[0].reset();
        $("#form-video").find("#imagemVideo")[0].src = "null";
        $("#categoriaVideo").val(null).trigger('change');
    }

    function MostrarEdicaoVideo(idVideo) {
        $("#tabela-video").hide();
        $("#btn-adiciona").hide();
        $("#btn-cadastra-video").hide();
        $("#btns-detaques").show();
        $("#btn-atualiza-video").show();
        $("#form-video").show();
        $("#btn-volta").show();

        const destaca = $("#destaca")[0];
        const tirarDestaque = $("#tirardestaque")[0];
        const formulario = $("#form-video");
        const idVideoFormulario = formulario.find("#idVideo")[0];
        const tituloVideo = formulario.find("#tituloVideo")[0];
        const imagemVideo = formulario.find("#imagemVideo")[0];
        const legendaImagemVideo = formulario.find("#legendaImagemVideo")[0];
        const nomeAutorVideo = formulario.find("#nomeAutorVideo")[0];
        const imagemAutorVideo = formulario.find("#imagemAutorVideo")[0];
        const dataVideo = formulario.find("#dataVideo")[0];
        const iframeVideo = formulario.find("#iframeVideo")[0];
        const tagsVideo = formulario.find("#tagsVideo")[0];
        const status = formulario.find("#status")[0];

        $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "carregaVideo",
                idVideo: idVideo,
            }
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);

            idVideoFormulario.value = conteudoPagina.idVideo;
            tituloVideo.value = conteudoPagina.tituloVideo;
            legendaImagemVideo.value = conteudoPagina.legendaImagemVideo;
            nomeAutorVideo.value = conteudoPagina.nomeAutorVideo;
            dataVideo.value = conteudoPagina.dataVideo;
            iframeVideo.value = conteudoPagina.iframeVideo;
            tagsVideo.value = conteudoPagina.tagsVideo;
            status.value = conteudoPagina.status;

            imagemVideo.src = "../assets/uploads/" + conteudoPagina.imagemVideo;
            imagemAutorVideo.src = "../assets/uploads/" + conteudoPagina.imagemAutorVideo;

            let valorCategorias = conteudoPagina.categoriasId;
            if (valorCategorias) {
                $('#categoriaVideo').val(JSON.parse(valorCategorias));
                $('#categoriaVideo').trigger('change');
            }

            VerificaDestaque(conteudoPagina.idVideo);
            destaca.onclick = function() {
                Destaca(conteudoPagina.idVideo);
            };
            tirarDestaque.onclick = function() {
                TiraDestaque(conteudoPagina.idVideo);
            };
        });
    }

    function AtualizaVideo() {
        const formulario = $("#form-video");
        const idVideo = formulario.find("#idVideo")[0];
        const tituloVideo = formulario.find("#tituloVideo")[0];
        const imagemVideo = formulario.find("#imagemVideo")[0];
        const legendaImagemVideo = formulario.find("#legendaImagemVideo")[0];
        const nomeAutorVideo = formulario.find("#nomeAutorVideo")[0];
        const imagemAutorVideo = formulario.find("#imagemAutorVideo")[0];
        const dataVideo = formulario.find("#dataVideo")[0];
        const iframeVideo = formulario.find("#iframeVideo")[0];
        const tagsVideo = formulario.find("#tagsVideo")[0];
        const status = formulario.find("#status")[0];
        const botaoAtualiza = formulario.find("#btn-atualiza-video")[0];

        let categoriaVideo = formulario.find("#categoriaVideo").val();

        const srcimagemVideo = obterUltimoSegmentoDaURL(imagemVideo.src);
        const srcimagemAutorVideo = obterUltimoSegmentoDaURL(imagemAutorVideo.src);

        categoriaVideo = JSON.stringify(categoriaVideo);

        const formData = new FormData();
        formData.append("origem", "atualizaVideo");
        formData.append("idVideo", idVideo.value);
        formData.append("tituloVideo", tituloVideo.value);
        formData.append("imagemVideo", srcimagemVideo);
        formData.append("imagemAutorVideo", srcimagemAutorVideo);
        formData.append("legendaImagemVideo", legendaImagemVideo.value);
        formData.append("nomeAutorVideo", nomeAutorVideo.value);
        formData.append("dataVideo", dataVideo.value);
        formData.append("categoriasId", categoriaVideo);
        formData.append("iframeVideo", iframeVideo.value);
        formData.append("tagsVideo", tagsVideo.value);
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

    function CadastraVideo() {
        const formulario = $("#form-video");
        const tituloVideo = formulario.find("#tituloVideo")[0];
        const imagemVideo = formulario.find("#imagemVideo")[0];
        const legendaImagemVideo = formulario.find("#legendaImagemVideo")[0];
        const nomeAutorVideo = formulario.find("#nomeAutorVideo")[0];
        const imagemAutorVideo = formulario.find("#imagemAutorVideo")[0];
        const dataVideo = formulario.find("#dataVideo")[0];
        const iframeVideo = formulario.find("#iframeVideo")[0];
        const tagsVideo = formulario.find("#tagsVideo")[0];
        const status = formulario.find("#status")[0];
        const botaoCadastra = formulario.find("#btn-cadastra-video")[0];

        let categoriaVideo = formulario.find("#categoriaVideo").val();

        const srcimagemVideo = obterUltimoSegmentoDaURL(imagemVideo.src);
        const srcimagemAutorVideo = obterUltimoSegmentoDaURL(imagemAutorVideo.src);

        categoriaVideo = JSON.stringify(categoriaVideo);

        const formData = new FormData();
        formData.append("origem", "cadastraVideo");
        formData.append("tituloVideo", tituloVideo.value);
        formData.append("imagemVideo", srcimagemVideo);
        formData.append("imagemAutorVideo", srcimagemAutorVideo);
        formData.append("legendaImagemVideo", legendaImagemVideo.value);
        formData.append("nomeAutorVideo", nomeAutorVideo.value);
        formData.append("dataVideo", dataVideo.value);
        formData.append("categoriasId", categoriaVideo);
        formData.append("iframeVideo", iframeVideo.value);
        formData.append("tagsVideo", tagsVideo.value);
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
                MostrarCadastroVideo()
            } else {
                toastr["error"]("Falha ao cadastrar!");
            }
        });
    }

    function DeletaVideo(id) {
        $.ajax({
            type: "POST",
            url: "backend/deleta-conteudo.php",
            data: {
                origem: "deletaVideo",
                idVideo: id
            },
        }).done(function(data) {

            toastr.options.timeOut = "2000";

            if (data) {
                toastr["success"]("Deletado com sucesso!");
                ListaVideos();
            } else {
                toastr["error"]("Falha ao deletar!");
            }

        });
    }

    function TirarImagem(btn) {
        let imagem = btn.getAttribute("imagem");
        let inputImagem = document.getElementById(imagem);

        inputImagem.src = "null";
    }

    function VerificaDestaque(idPagina) {
        let valorVer = 0;

        verificaDestaqueResponse = $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "verificaDestaque",
                idItem: idPagina,
                categoria: "pagina-video"
            }
        });

        verificaDestaqueResponse.done(function(response) {
            valorVer = response;

            if (valorVer == 1) {
                $("#tirardestaque").show();
                $("#destaca").hide();
            } else {
                $("#tirardestaque").hide();
                $("#destaca").show();
            }
        });
    }

    function Destaca(idDestaque) {
        $.ajax({
            type: "POST",
            url: "backend/cadastro-conteudo.php",
            data: {
                origem: "destaca",
                idItem: idDestaque,
                categoria: "pagina-video"
            }
        }).done(function(data) {

            toastr.options.timeOut = "2000";

            if (data) {
                toastr["success"]("Destacado com sucesso!");
                VerificaDestaque(idDestaque);
            } else {
                toastr["error"]("Falha ao destacar!");
            }


        });
    }

    function TiraDestaque(idDestaque) {
        $.ajax({
            type: "POST",
            url: "backend/deleta-conteudo.php",
            data: {
                origem: "tiraDestaque",
                idItem: idDestaque,
                categoria: "pagina-video"
            }
        }).done(function(data) {

            toastr.options.timeOut = "2000";

            if (data) {
                toastr["success"]("Retirado com sucesso!");
                VerificaDestaque(idDestaque);
            } else {
                toastr["error"]("Falha ao retirar!");
            }


        });
    }
</script>
<?php
'';
?>