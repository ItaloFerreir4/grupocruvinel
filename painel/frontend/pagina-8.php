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
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <?php echo $seo_content ?>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Consultoria</h2>
                </div>
                <div class="body">
                    <form method="post" id="form-consultoria">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="tituloConsultoria" name="tituloConsultoria">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Subtitulo</label>
                                    <input type="text" class="form-control" id="subTituloConsultoria" name="subTituloConsultoria">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemConsultoria" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagemConsultoria" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Legenda imagem</label>
                                    <input type="text" class="form-control" id="legendaImagemConsultoria" name="legendaImagemConsultoria">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Texto</label>
                                    <textarea class="form-control" id="textoConsultoria" name="textoConsultoria" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Nome autor</label>
                                    <input type="text" class="form-control" id="nomeAutorConsultoria" name="nomeAutorConsultoria">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Imagem autor</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemAutorConsultoria" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid h50 objContain" id="imagemAutorConsultoria" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>Valor Avista</label>
                                    <input type="number" class="form-control" id="valorAvistaConsultoria" name="valorAvistaConsultoria">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>Valor Parcelado</label>
                                    <input type="number" class="form-control" id="valorParceladoConsultoria" name="valorParceladoConsultoria">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>Quantidade de Parcela</label>
                                    <input type="number" class="form-control" id="qtdParcelaConsultoria" name="qtdParcelaConsultoria">
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
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza" onClick="AtualizaConsultoria()">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-6">
                            <h2>Formulario</h2>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <form method="post" id="formEmail1">
                        <input type="hidden" class="form-control" id="idFormulario" name="idFormulario" value="0">
                        <input type="hidden" class="form-control" id="paginaId" name="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
                        <input type="hidden" class="form-control" id="descricaoFormulario" name="descricaoFormulario" value="">
                        <div class="row clearfix">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="emailFormulario" name="emailFormulario">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden">
                                <div class="form-group">
                                    <label>Gênero (colocar itens separados por virgular ",")</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="select1Formulario" name="select1Formulario">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden">
                                <div class="form-group">
                                    <label>Área (colocar itens separados por virgular ",")</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="select2Formulario" name="select2Formulario">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden">
                                <div class="form-group">
                                    <label>Estado (colocar itens separados por virgular ",")</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="select3Formulario" name="select3Formulario">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden">
                                <div class="form-group">
                                    <label>campo (colocar itens separados por virgular ",")</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="select4Formulario" name="select4Formulario">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden">
                                <div class="form-group">
                                    <label>campo (colocar itens separados por virgular ",")</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="select5Formulario" name="select5Formulario">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden">
                                <div class="form-group">
                                    <label>campo (colocar itens separados por virgular ",")</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="select6Formulario" name="select6Formulario">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-formulario-1" onClick="AtualizaFormulario(1)">Atualizar</button>
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
        CarregaConsultoria(<?php echo $_POST["idPagina"]; ?>);
        CarregaFormulario(1);
    });
</script>

<script defer>
    function CarregaConsultoria(paginaId) {
        const formulario = $("#form-consultoria");
        const tituloConsultoria = formulario.find("#tituloConsultoria")[0];
        const subTituloConsultoria = formulario.find("#subTituloConsultoria")[0];
        const imagemConsultoria = formulario.find("#imagemConsultoria")[0];
        const legendaImagemConsultoria = formulario.find("#legendaImagemConsultoria")[0];
        const nomeAutorConsultoria = formulario.find("#nomeAutorConsultoria")[0];
        const imagemAutorConsultoria = formulario.find("#imagemAutorConsultoria")[0];
        const valorAvistaConsultoria = formulario.find("#valorAvistaConsultoria")[0];
        const valorParceladoConsultoria = formulario.find("#valorParceladoConsultoria")[0];
        const qtdParcelaConsultoria = formulario.find("#qtdParcelaConsultoria")[0];
        const status = formulario.find("#status")[0];

        formulario.find("#paginaId")[0].value = paginaId;

        let nomeBlocoTexto = "textoConsultoria";

        if (!CKEDITOR.instances[nomeBlocoTexto]) {
            CKEDITOR.replace(nomeBlocoTexto);
        }

        const editor = CKEDITOR.instances[nomeBlocoTexto];

        editor.on('instanceReady', function() {

            $.ajax({
                type: "POST",
                url: "backend/carrega-conteudo.php",
                data: {
                    origem: "carregaConsultoria",
                    paginaId: paginaId
                }
            }).done(function(data) {

                const conteudoPagina = JSON.parse(data);
                let textoConsultoria = conteudoPagina.textoConsultoria;

                editor.setData(textoConsultoria);

                tituloConsultoria.value = conteudoPagina.tituloConsultoria;
                subTituloConsultoria.value = conteudoPagina.subTituloConsultoria;
                legendaImagemConsultoria.value = conteudoPagina.legendaImagemConsultoria;
                nomeAutorConsultoria.value = conteudoPagina.nomeAutorConsultoria;
                valorAvistaConsultoria.value = conteudoPagina.valorAvistaConsultoria;
                valorParceladoConsultoria.value = conteudoPagina.valorParceladoConsultoria;
                qtdParcelaConsultoria.value = conteudoPagina.qtdParcelaConsultoria;
                status.value = conteudoPagina.status;

                imagemConsultoria.src = "../assets/uploads/" + conteudoPagina.imagemConsultoria;
                imagemAutorConsultoria.src = "../assets/uploads/" + conteudoPagina.imagemAutorConsultoria;

            });
        });
    }

    function AtualizaConsultoria() {
        const formulario = $("#form-consultoria");
        const paginaId = formulario.find("#paginaId")[0];
        const tituloConsultoria = formulario.find("#tituloConsultoria")[0];
        const subTituloConsultoria = formulario.find("#subTituloConsultoria")[0];
        const imagemConsultoria = formulario.find("#imagemConsultoria")[0];
        const legendaImagemConsultoria = formulario.find("#legendaImagemConsultoria")[0];
        const nomeAutorConsultoria = formulario.find("#nomeAutorConsultoria")[0];
        const imagemAutorConsultoria = formulario.find("#imagemAutorConsultoria")[0];
        const valorAvistaConsultoria = formulario.find("#valorAvistaConsultoria")[0];
        const valorParceladoConsultoria = formulario.find("#valorParceladoConsultoria")[0];
        const qtdParcelaConsultoria = formulario.find("#qtdParcelaConsultoria")[0];
        const status = formulario.find("#status")[0];
        const botaoAtualiza = formulario.find("#btn-atualiza")[0];

        let nomeBlocoTexto = "textoConsultoria";

        const editor = CKEDITOR.instances[nomeBlocoTexto];
        const textoConsultoria = editor.getData();

        const srcimagemConsultoria = obterUltimoSegmentoDaURL(imagemConsultoria.src);
        const srcimagemAutorConsultoria = obterUltimoSegmentoDaURL(imagemAutorConsultoria.src);

        const formData = new FormData();
        formData.append("origem", "atualizaConsultoria");
        formData.append("paginaId", paginaId.value);
        formData.append("tituloConsultoria", tituloConsultoria.value);
        formData.append("subTituloConsultoria", subTituloConsultoria.value);
        formData.append("imagemConsultoria", srcimagemConsultoria);
        formData.append("imagemAutorConsultoria", srcimagemAutorConsultoria);
        formData.append("legendaImagemConsultoria", legendaImagemConsultoria.value);
        formData.append("nomeAutorConsultoria", nomeAutorConsultoria.value);
        formData.append("valorAvistaConsultoria", valorAvistaConsultoria.value);
        formData.append("valorParceladoConsultoria", valorParceladoConsultoria.value);
        formData.append("qtdParcelaConsultoria", qtdParcelaConsultoria.value);
        formData.append("status", status.value);
        formData.append("textoConsultoria", textoConsultoria);

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
</script>
<?php
'';
?>