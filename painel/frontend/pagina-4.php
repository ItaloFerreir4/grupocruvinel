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
                    <h2>Workshop</h2>
                </div>
                <div class="body">
                    <form method="post" id="form-workshop">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="tituloWorkshop" name="tituloWorkshop">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Subtitulo</label>
                                    <input type="text" class="form-control" id="subTituloWorkshop" name="subTituloWorkshop">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemWorkshop" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagemWorkshop" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Legenda imagem</label>
                                    <input type="text" class="form-control" id="legendaImagemWorkshop" name="legendaImagemWorkshop">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Texto</label>
                                    <textarea class="form-control" id="textoWorkshop" name="textoWorkshop" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>Valor Avista</label>
                                    <input type="number" class="form-control" id="valorAvistaWorkshop" name="valorAvistaWorkshop">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>Valor Parcelado</label>
                                    <input type="number" class="form-control" id="valorParceladoWorkshop" name="valorParceladoWorkshop">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>Quantidade de Parcela</label>
                                    <input type="number" class="form-control" id="qtdParcelaWorkshop" name="qtdParcelaWorkshop">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Link Compra</label>
                                    <input type="text" class="form-control" id="linkBotaoWorkshop" name="linkBotaoWorkshop">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Target</label>
                                    <select class="form-control" name="targetBotaoWorkshop" id="targetBotaoWorkshop">
                                        <option value="_blank">Blank</option>
                                        <option value="_self">Self</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Local</label>
                                    <input type="text" class="form-control" id="localWorkshop" name="localWorkshop">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Data</label>
                                    <input type="datetime-local" class="form-control" name="dataWorkshop" id="dataWorkshop">
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
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza" onClick="AtualizaWorkshop()">Atualizar</button>
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
        CarregaWorkshop(<?php echo $_POST["idPagina"]; ?>);


    });
</script>

<script defer>
    function CarregaWorkshop(paginaId) {
        const formulario = $("#form-workshop");
        const tituloWorkshop = formulario.find("#tituloWorkshop")[0];
        const subTituloWorkshop = formulario.find("#subTituloWorkshop")[0];
        const imagemWorkshop = formulario.find("#imagemWorkshop")[0];
        const legendaImagemWorkshop = formulario.find("#legendaImagemWorkshop")[0];
        const valorAvistaWorkshop = formulario.find("#valorAvistaWorkshop")[0];
        const valorParceladoWorkshop = formulario.find("#valorParceladoWorkshop")[0];
        const qtdParcelaWorkshop = formulario.find("#qtdParcelaWorkshop")[0];
        const linkBotaoWorkshop = formulario.find("#linkBotaoWorkshop")[0];
        const targetBotaoWorkshop = formulario.find("#targetBotaoWorkshop")[0];
        const localWorkshop = formulario.find("#localWorkshop")[0];
        const dataWorkshop = formulario.find("#dataWorkshop")[0];
        const status = formulario.find("#status")[0];

        formulario.find("#paginaId")[0].value = paginaId;

        let nomeBlocoTexto = "textoWorkshop";

        if (!CKEDITOR.instances[nomeBlocoTexto]) {
            CKEDITOR.replace(nomeBlocoTexto);
        }

        const editor = CKEDITOR.instances[nomeBlocoTexto];

        editor.on('instanceReady', function() {

            $.ajax({
                type: "POST",
                url: "backend/carrega-conteudo.php",
                data: {
                    origem: "carregaWorkshop",
                    paginaId: paginaId
                }
            }).done(function(data) {

                const conteudoPagina = JSON.parse(data);

                let textoWorkshop = conteudoPagina.textoWorkshop;

                editor.setData(textoWorkshop);

                tituloWorkshop.value = conteudoPagina.tituloWorkshop;
                subTituloWorkshop.value = conteudoPagina.subTituloWorkshop;
                legendaImagemWorkshop.value = conteudoPagina.legendaImagemWorkshop;
                valorAvistaWorkshop.value = conteudoPagina.valorAvistaWorkshop;
                valorParceladoWorkshop.value = conteudoPagina.valorParceladoWorkshop;
                qtdParcelaWorkshop.value = conteudoPagina.qtdParcelaWorkshop;
                linkBotaoWorkshop.value = conteudoPagina.linkBotaoWorkshop;
                targetBotaoWorkshop.value = conteudoPagina.targetBotaoWorkshop;
                localWorkshop.value = conteudoPagina.localWorkshop;
                dataWorkshop.value = conteudoPagina.dataWorkshop;
                status.value = conteudoPagina.status;

                imagemWorkshop.src = "../assets/uploads/" + conteudoPagina.imagemWorkshop;
            });
        });
    }

    function AtualizaWorkshop() {
        const formulario = $("#form-workshop");
        const paginaId = formulario.find("#paginaId")[0];
        const tituloWorkshop = formulario.find("#tituloWorkshop")[0];
        const subTituloWorkshop = formulario.find("#subTituloWorkshop")[0];
        const imagemWorkshop = formulario.find("#imagemWorkshop")[0];
        const legendaImagemWorkshop = formulario.find("#legendaImagemWorkshop")[0];
        const valorAvistaWorkshop = formulario.find("#valorAvistaWorkshop")[0];
        const valorParceladoWorkshop = formulario.find("#valorParceladoWorkshop")[0];
        const qtdParcelaWorkshop = formulario.find("#qtdParcelaWorkshop")[0];
        const linkBotaoWorkshop = formulario.find("#linkBotaoWorkshop")[0];
        const targetBotaoWorkshop = formulario.find("#targetBotaoWorkshop")[0];
        const localWorkshop = formulario.find("#localWorkshop")[0];
        const dataWorkshop = formulario.find("#dataWorkshop")[0];
        const status = formulario.find("#status")[0];
        const botaoAtualiza = formulario.find("#btn-atualiza")[0];

        let nomeBlocoTexto = "textoWorkshop";

        const editor = CKEDITOR.instances[nomeBlocoTexto];
        const textoWorkshop = editor.getData();

        const srcimagemWorkshop = obterUltimoSegmentoDaURL(imagemWorkshop.src);

        const formData = new FormData();
        formData.append("origem", "atualizaWorkshop");
        formData.append("paginaId", paginaId.value);
        formData.append("tituloWorkshop", tituloWorkshop.value);
        formData.append("subTituloWorkshop", subTituloWorkshop.value);
        formData.append("imagemWorkshop", srcimagemWorkshop);
        formData.append("legendaImagemWorkshop", legendaImagemWorkshop.value);
        formData.append("valorAvistaWorkshop", valorAvistaWorkshop.value);
        formData.append("valorParceladoWorkshop", valorParceladoWorkshop.value);
        formData.append("qtdParcelaWorkshop", qtdParcelaWorkshop.value);
        formData.append("linkBotaoWorkshop", linkBotaoWorkshop.value);
        formData.append("targetBotaoWorkshop", targetBotaoWorkshop.value);
        formData.append("localWorkshop", localWorkshop.value);
        formData.append("dataWorkshop", dataWorkshop.value);
        formData.append("status", status.value);
        formData.append("textoWorkshop", textoWorkshop);

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