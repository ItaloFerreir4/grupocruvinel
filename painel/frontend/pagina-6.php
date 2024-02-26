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
                    <h2>Mentoria</h2>
                </div>
                <div class="body">
                    <form method="post" id="form-mentoria">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="tituloMentoria" name="tituloMentoria">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Subtitulo</label>
                                    <input type="text" class="form-control" id="subTituloMentoria" name="subTituloMentoria">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemMentoria" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagemMentoria" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Legenda imagem</label>
                                    <input type="text" class="form-control" id="legendaImagemMentoria" name="legendaImagemMentoria">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Texto</label>
                                    <textarea class="form-control" id="textoMentoria" name="textoMentoria" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Nome autor</label>
                                    <input type="text" class="form-control" id="nomeAutorMentoria" name="nomeAutorMentoria">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Imagem autor</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemAutorMentoria" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid h50 objContain" id="imagemAutorMentoria" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>Valor Avista</label>
                                    <input type="number" class="form-control" id="valorAvistaMentoria" name="valorAvistaMentoria">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>Valor Parcelado</label>
                                    <input type="number" class="form-control" id="valorParceladoMentoria" name="valorParceladoMentoria">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>Quantidade de Parcela</label>
                                    <input type="number" class="form-control" id="qtdParcelaMentoria" name="qtdParcelaMentoria">
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
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza" onClick="AtualizaMentoria()">Atualizar</button>
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
        CarregaMentoria(<?php echo $_POST["idPagina"]; ?>);
        CarregaFormulario(1);
    });
</script>

<script defer>
    function CarregaMentoria(paginaId) {
        const formulario = $("#form-mentoria");
        const tituloMentoria = formulario.find("#tituloMentoria")[0];
        const subTituloMentoria = formulario.find("#subTituloMentoria")[0];
        const imagemMentoria = formulario.find("#imagemMentoria")[0];
        const legendaImagemMentoria = formulario.find("#legendaImagemMentoria")[0];
        const nomeAutorMentoria = formulario.find("#nomeAutorMentoria")[0];
        const imagemAutorMentoria = formulario.find("#imagemAutorMentoria")[0];
        const valorAvistaMentoria = formulario.find("#valorAvistaMentoria")[0];
        const valorParceladoMentoria = formulario.find("#valorParceladoMentoria")[0];
        const qtdParcelaMentoria = formulario.find("#qtdParcelaMentoria")[0];
        const status = formulario.find("#status")[0];

        formulario.find("#paginaId")[0].value = paginaId;

        let nomeBlocoTexto = "textoMentoria";

        if (!CKEDITOR.instances[nomeBlocoTexto]) {
            CKEDITOR.replace(nomeBlocoTexto);
        }

        const editor = CKEDITOR.instances[nomeBlocoTexto];

        editor.on('instanceReady', function() {

            $.ajax({
                type: "POST",
                url: "backend/carrega-conteudo.php",
                data: {
                    origem: "carregaMentoria",
                    paginaId: paginaId
                }
            }).done(function(data) {

                const conteudoPagina = JSON.parse(data);
                let textoMentoria = conteudoPagina.textoMentoria;

                editor.setData(textoMentoria);

                tituloMentoria.value = conteudoPagina.tituloMentoria;
                subTituloMentoria.value = conteudoPagina.subTituloMentoria;
                legendaImagemMentoria.value = conteudoPagina.legendaImagemMentoria;
                nomeAutorMentoria.value = conteudoPagina.nomeAutorMentoria;
                valorAvistaMentoria.value = conteudoPagina.valorAvistaMentoria;
                valorParceladoMentoria.value = conteudoPagina.valorParceladoMentoria;
                qtdParcelaMentoria.value = conteudoPagina.qtdParcelaMentoria;
                status.value = conteudoPagina.status;

                imagemMentoria.src = "../assets/uploads/" + conteudoPagina.imagemMentoria;
                imagemAutorMentoria.src = "../assets/uploads/" + conteudoPagina.imagemAutorMentoria;

            });
        });
    }

    function AtualizaMentoria() {
        const formulario = $("#form-mentoria");
        const paginaId = formulario.find("#paginaId")[0];
        const tituloMentoria = formulario.find("#tituloMentoria")[0];
        const subTituloMentoria = formulario.find("#subTituloMentoria")[0];
        const imagemMentoria = formulario.find("#imagemMentoria")[0];
        const legendaImagemMentoria = formulario.find("#legendaImagemMentoria")[0];
        const nomeAutorMentoria = formulario.find("#nomeAutorMentoria")[0];
        const imagemAutorMentoria = formulario.find("#imagemAutorMentoria")[0];
        const valorAvistaMentoria = formulario.find("#valorAvistaMentoria")[0];
        const valorParceladoMentoria = formulario.find("#valorParceladoMentoria")[0];
        const qtdParcelaMentoria = formulario.find("#qtdParcelaMentoria")[0];
        const status = formulario.find("#status")[0];
        const botaoAtualiza = formulario.find("#btn-atualiza")[0];

        let nomeBlocoTexto = "textoMentoria";

        const editor = CKEDITOR.instances[nomeBlocoTexto];
        const textoMentoria = editor.getData();

        const srcimagemMentoria = obterUltimoSegmentoDaURL(imagemMentoria.src);
        const srcimagemAutorMentoria = obterUltimoSegmentoDaURL(imagemAutorMentoria.src);

        const formData = new FormData();
        formData.append("origem", "atualizaMentoria");
        formData.append("paginaId", paginaId.value);
        formData.append("tituloMentoria", tituloMentoria.value);
        formData.append("subTituloMentoria", subTituloMentoria.value);
        formData.append("imagemMentoria", srcimagemMentoria);
        formData.append("imagemAutorMentoria", srcimagemAutorMentoria);
        formData.append("legendaImagemMentoria", legendaImagemMentoria.value);
        formData.append("nomeAutorMentoria", nomeAutorMentoria.value);
        formData.append("valorAvistaMentoria", valorAvistaMentoria.value);
        formData.append("valorParceladoMentoria", valorParceladoMentoria.value);
        formData.append("qtdParcelaMentoria", qtdParcelaMentoria.value);
        formData.append("status", status.value);
        formData.append("textoMentoria", textoMentoria);

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