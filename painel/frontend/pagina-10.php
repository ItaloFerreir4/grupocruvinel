<?php
include_once '../tema/assets/componentes/componentes.php';

ob_start();
seo();
$seo_content = ob_get_clean();

echo ''
?>
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h2>Pagina <?php echo $_POST["tituloPagina"]; ?></h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="lista" pagina="lista" categoria="<?php echo $_POST['categoriaId'] ?>" href="javascript:void(0);" onClick="Pagina(this)">Paginas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pagina <?php echo $_POST["tituloPagina"]; ?></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="float: right;">
                    <button type="button" class="btn btn-primary" id="destaca" onClick="Destaca(<?php echo $_POST["idPagina"]; ?>)">Destacar</button>
                    <button type="button" class="btn btn-primary" id="tirardestaque" onClick="TiraDestaque(<?php echo $_POST["idPagina"]; ?>)">Tira Destaque</button>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <?php echo $seo_content ?>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Blog</h2>
                </div>
                <div class="body">
                    <form method="post" id="form-blog">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="tituloBlog" name="tituloBlog">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Subtitulo</label>
                                    <input type="text" class="form-control" id="subTituloBlog" name="subTituloBlog">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemBlog" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagemBlog" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Legenda imagem</label>
                                    <input type="text" class="form-control" id="legendaImagemBlog" name="legendaImagemBlog">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Fonte imagem</label>
                                    <input type="text" class="form-control" id="fonteImagemBlog" name="fonteImagemBlog">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Texto</label>
                                    <textarea class="form-control" id="textoBlog" name="textoBlog" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Nome autor</label>
                                    <input type="text" class="form-control" id="nomeAutorBlog" name="nomeAutorBlog">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Imagem autor</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemAutorBlog" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid h50 objContain" id="imagemAutorBlog" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Data</label>
                                    <input type="date" class="form-control" name="dataBlog" id="dataBlog">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Tempo de leitura em minutos</label>
                                    <input type="number" class="form-control" name="tempoLeituraBlog" id="tempoLeituraBlog">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Categorias</label>
                                    <select class="form-control" name="categoriasBlog" id="categoriasBlog" multiple="multiple"></select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Tags</label>
                                    <input type="text" class="form-control" id="tagsBlog" name="tagsBlog">
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
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza" onClick="AtualizaBlog()">Atualizar</button>
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
        CarregaSeo(<?php echo $_POST["idPagina"]; ?>);
        CarregaBlog(<?php echo $_POST["idPagina"]; ?>);
        VerificaDestaque(<?php echo $_POST["idPagina"]; ?>);
        CarregaCategorias(1);

        $('#categoriasBlog').select2({
            placeholder: 'Pesquisar...',
        });
    });
</script>

<script defer>
    function CarregaBlog(paginaId) {
        const formulario = $("#form-blog");
        const tituloBlog = formulario.find("#tituloBlog")[0];
        const subTituloBlog = formulario.find("#subTituloBlog")[0];
        const imagemBlog = formulario.find("#imagemBlog")[0];
        const legendaImagemBlog = formulario.find("#legendaImagemBlog")[0];
        const fonteImagemBlog = formulario.find("#fonteImagemBlog")[0];
        const nomeAutorBlog = formulario.find("#nomeAutorBlog")[0];
        const imagemAutorBlog = formulario.find("#imagemAutorBlog")[0];
        const dataBlog = formulario.find("#dataBlog")[0];
        const tempoLeituraBlog = formulario.find("#tempoLeituraBlog")[0];
        const tagsBlog = formulario.find("#tagsBlog")[0];
        const status = formulario.find("#status")[0];

        let nomeBlocoTexto = "textoBlog";

        if (!CKEDITOR.instances[nomeBlocoTexto]) {
            CKEDITOR.replace(nomeBlocoTexto);
        }

        const editor = CKEDITOR.instances[nomeBlocoTexto];

        editor.on('instanceReady', function() {

            $.ajax({
                type: "POST",
                url: "backend/carrega-conteudo.php",
                data: {
                    origem: "carregaBlog",
                    paginaId: paginaId
                }
            }).done(function(data) {

                const conteudoPagina = JSON.parse(data);
                let textoBlog = conteudoPagina.textoBlog;

                editor.setData(textoBlog);

                tituloBlog.value = conteudoPagina.tituloBlog;
                subTituloBlog.value = conteudoPagina.subTituloBlog;
                legendaImagemBlog.value = conteudoPagina.legendaImagemBlog;
                fonteImagemBlog.value = conteudoPagina.fonteImagemBlog;
                nomeAutorBlog.value = conteudoPagina.nomeAutorBlog;
                dataBlog.value = conteudoPagina.dataBlog;
                tempoLeituraBlog.value = conteudoPagina.tempoLeituraBlog;
                tagsBlog.value = conteudoPagina.tagsBlog;
                status.value = conteudoPagina.status;

                imagemBlog.src = "../assets/uploads/" + conteudoPagina.imagemBlog;
                imagemAutorBlog.src = "../assets/uploads/" + conteudoPagina.imagemAutorBlog;

                let valorCategorias = conteudoPagina.categoriasId;
                if (valorCategorias) {
                    $('#categoriasBlog').val(JSON.parse(valorCategorias));
                    $('#categoriasBlog').trigger('change');
                }
            });
        });
    }

    function CarregaCategorias(tipoCategoria) {

        const select = document.getElementById("categoriasBlog");

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

    function AtualizaBlog() {
        const formulario = $("#form-blog");
        const paginaId = formulario.find("#paginaId")[0];
        const tituloBlog = formulario.find("#tituloBlog")[0];
        const subTituloBlog = formulario.find("#subTituloBlog")[0];
        const imagemBlog = formulario.find("#imagemBlog")[0];
        const legendaImagemBlog = formulario.find("#legendaImagemBlog")[0];
        const fonteImagemBlog = formulario.find("#fonteImagemBlog")[0];
        const nomeAutorBlog = formulario.find("#nomeAutorBlog")[0];
        const imagemAutorBlog = formulario.find("#imagemAutorBlog")[0];
        const dataBlog = formulario.find("#dataBlog")[0];
        const tempoLeituraBlog = formulario.find("#tempoLeituraBlog")[0];
        const tagsBlog = formulario.find("#tagsBlog")[0];
        const status = formulario.find("#status")[0];
        const botaoAtualiza = formulario.find("#btn-atualiza")[0];

        let categoriasBlog = formulario.find("#categoriasBlog").val();
        let nomeBlocoTexto = "textoBlog";

        const editor = CKEDITOR.instances[nomeBlocoTexto];
        const textoBlog = editor.getData();

        const srcimagemBlog = obterUltimoSegmentoDaURL(imagemBlog.src);
        const srcimagemAutorBlog = obterUltimoSegmentoDaURL(imagemAutorBlog.src);

        categoriasBlog = JSON.stringify(categoriasBlog);

        const formData = new FormData();
        formData.append("origem", "atualizaBlog");
        formData.append("paginaId", paginaId.value);
        formData.append("tituloBlog", tituloBlog.value);
        formData.append("subTituloBlog", subTituloBlog.value);
        formData.append("imagemBlog", srcimagemBlog);
        formData.append("imagemAutorBlog", srcimagemAutorBlog);
        formData.append("legendaImagemBlog", legendaImagemBlog.value);
        formData.append("fonteImagemBlog", fonteImagemBlog.value);
        formData.append("nomeAutorBlog", nomeAutorBlog.value);
        formData.append("dataBlog", dataBlog.value);
        formData.append("tempoLeituraBlog", tempoLeituraBlog.value);
        formData.append("tagsBlog", tagsBlog.value);
        formData.append("status", status.value);
        formData.append("categoriasId", categoriasBlog);
        formData.append("textoBlog", textoBlog);

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
                toastr["error"]("Falha ao cadastrar!");
            }

        });
    }

    function VerificaDestaque(idPagina) {
        let valorVer = 0;

        verificaDestaqueResponse = $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "verificaDestaque",
                idItem: idPagina,
                categoria: "pagina-blog"
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
                categoria: "pagina-blog"
            }
        }).done(function(data) {

            toastr.options.timeOut = "2000";

            if (data) {
                toastr["success"]("Destacado com sucesso!");
                VerificaDestaque(<?php echo $_POST["idPagina"]; ?>);
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
                categoria: "pagina-blog"
            }
        }).done(function(data) {

            toastr.options.timeOut = "2000";

            if (data) {
                toastr["success"]("Retirado com sucesso!");
                VerificaDestaque(<?php echo $_POST["idPagina"]; ?>);
            } else {
                toastr["error"]("Falha ao retirar!");
            }


        });
    }
</script>
<?php
'';
?>