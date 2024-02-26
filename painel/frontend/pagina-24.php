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
                    <h2>Banner</h2>
                </div>
                <div class="body">     
                    <form method="post" id="form-1">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
                            <input type="hidden" class="form-control" name="idConteudo" id="idConteudo" value="">
                            <input type="hidden" class="form-control" name="numeroConteudo" id="numeroConteudo" value="1">
                    
                            <div class="col-12 hidden">
                                <div class="form-group">    
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="tituloConteudo" name="tituloConteudo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">    
                                    <label>Imagem Desktop</label>
                                    <button class="btn btn-default selecionarImagem" formConteudo="1" imagem="imagem1Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagem1Conteudo" src="" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">  
                                    <label>Imagem Mobile</label>
                                    <button class="btn btn-default selecionarImagem" formConteudo="1" imagem="imagem2Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagem2Conteudo" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">  
                                    <label>Legenda da imagem desktop</label>                                            
                                    <input type="text" class="form-control" id="legendaImagem1Conteudo" name="legendaImagem1Conteudo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">  
                                    <label>Legenda da imagem mobile</label>                                            
                                    <input type="text" class="form-control" id="legendaImagem2Conteudo" name="legendaImagem2Conteudo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 hidden">
                                <div class="form-group">    
                                    <label>Imagem 3</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagem3Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid" id="imagem3Conteudo" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 hidden">
                                <div class="form-group">  
                                    <label>Imagem 4</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagem4Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid" id="imagem4Conteudo" src="null" alt="">
                                </div>
                            </div>                                
                            <div class="col-lg-6 col-md-12 hidden">
                                <div class="form-group">  
                                    <label>Legenda da imagem 3</label>                                            
                                    <input type="text" class="form-control" id="legendaImagem3Conteudo" name="legendaImagem3Conteudo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 hidden">
                                <div class="form-group">  
                                    <label>Legenda da imagem 4</label>                                            
                                    <input type="text" class="form-control" id="legendaImagem4Conteudo" name="legendaImagem4Conteudo">
                                </div>
                            </div>
                            <div class="col-12 hidden">
                                <div class="form-group">  
                                    <label>Link Video</label>                                            
                                    <input type="text" class="form-control" id="linkVideoConteudo" name="linkVideoConteudo">
                                </div>
                            </div>
                            <div class="col-12 hidden">
                                <div class="form-group"> 
                                    <label>Texto</label>
                                    <textarea class="form-control" id="textoConteudo1" name="textoConteudo1" rows="10"></textarea>
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
                                    <label>Link</label>                                            
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
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">  
                                    <label>Nome do botão</label>                                            
                                    <input type="text" class="form-control" id="nomeBotao2" name="nomeBotao2">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">  
                                    <label>Link do botão</label>                                            
                                    <input type="text" class="form-control" id="linkBotao2" name="linkBotao2">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">  
                                    <label>Target do botão</label>                                            
                                    <select class="form-control" name="targetBotao2" id="targetBotao2">
                                        <option value="_blank">Blank</option>
                                        <option value="_self">Self</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-conteudo-1" onClick="AtualizaConteudo(1)">Atualizar</button>
                                <button class="btn btn-success btn-cadastra hidden" type="button" id="btn-cadastra-conteudo-1" onClick="CadastraConteudo(1)">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>                    
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Banner 2</h2>
                </div>
                <div class="body">     
                    <form method="post" id="form-2">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
                            <input type="hidden" class="form-control" name="idConteudo" id="idConteudo" value="">
                            <input type="hidden" class="form-control" name="numeroConteudo" id="numeroConteudo" value="2">
                    
                            <div class="col-12  hidden">
                                <div class="form-group">    
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="tituloConteudo" name="tituloConteudo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">    
                                    <label>Imagem Desktop</label>
                                    <button class="btn btn-default selecionarImagem" formConteudo="2" imagem="imagem1Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagem1Conteudo" src="" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">  
                                    <label>Imagem Mobile</label>
                                    <button class="btn btn-default selecionarImagem" formConteudo="2" imagem="imagem2Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagem2Conteudo" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">  
                                    <label>Legenda da imagem desktop</label>                                            
                                    <input type="text" class="form-control" id="legendaImagem1Conteudo" name="legendaImagem1Conteudo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">  
                                    <label>Legenda da imagem mobile</label>                                            
                                    <input type="text" class="form-control" id="legendaImagem2Conteudo" name="legendaImagem2Conteudo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 hidden">
                                <div class="form-group">    
                                    <label>Imagem 3</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagem3Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid" id="imagem3Conteudo" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 hidden">
                                <div class="form-group">  
                                    <label>Imagem 4</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagem4Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid" id="imagem4Conteudo" src="null" alt="">
                                </div>
                            </div>                                
                            <div class="col-lg-6 col-md-12 hidden">
                                <div class="form-group">  
                                    <label>Legenda da imagem 3</label>                                            
                                    <input type="text" class="form-control" id="legendaImagem3Conteudo" name="legendaImagem3Conteudo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 hidden">
                                <div class="form-group">  
                                    <label>Legenda da imagem 4</label>                                            
                                    <input type="text" class="form-control" id="legendaImagem4Conteudo" name="legendaImagem4Conteudo">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">  
                                    <label>Link Video</label>                                            
                                    <input type="text" class="form-control" id="linkVideoConteudo" name="linkVideoConteudo">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group"> 
                                    <label>Texto</label>
                                    <textarea class="form-control" id="textoConteudo2" name="textoConteudo2" rows="10"></textarea>
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
                                    <label>Link</label>                                            
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
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">  
                                    <label>Nome do botão</label>                                            
                                    <input type="text" class="form-control" id="nomeBotao2" name="nomeBotao2">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">  
                                    <label>Link do botão</label>                                            
                                    <input type="text" class="form-control" id="linkBotao2" name="linkBotao2">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">  
                                    <label>Target do botão</label>                                            
                                    <select class="form-control" name="targetBotao2" id="targetBotao2">
                                        <option value="_blank">Blank</option>
                                        <option value="_self">Self</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-conteudo-2" onClick="AtualizaConteudo(2)">Atualizar</button>
                                <button class="btn btn-success btn-cadastra hidden" type="button" id="btn-cadastra-conteudo-2" onClick="CadastraConteudo(2)">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>                    
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Palestra</h2>
                </div>
                <div class="body">
                    <form method="post" id="form-palestra">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="tituloPalestra" name="tituloPalestra">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Subtitulo</label>
                                    <input type="text" class="form-control" id="subTituloPalestra" name="subTituloPalestra">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemPalestra" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagemPalestra" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Legenda imagem</label>
                                    <input type="text" class="form-control" id="legendaImagemPalestra" name="legendaImagemPalestra">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Texto</label>
                                    <textarea class="form-control" id="textoPalestra" name="textoPalestra" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Data</label>
                                    <input type="date" class="form-control" name="dataPalestra" id="dataPalestra">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Nome autor</label>
                                    <input type="text" class="form-control" id="nomeAutorPalestra" name="nomeAutorPalestra">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Imagem autor</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemAutorPalestra" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid h50 objContain" id="imagemAutorPalestra" src="null" alt="">
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
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza" onClick="AtualizaPalestra()">Atualizar</button>
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
        CarregaPalestra(<?php echo $_POST["idPagina"]; ?>);
        CarregaConteudo(1);
        CarregaConteudo(2);
    });
</script>

<script defer>
    function CarregaPalestra(paginaId) {
        const formulario = $("#form-palestra");
        const tituloPalestra = formulario.find("#tituloPalestra")[0];
        const subTituloPalestra = formulario.find("#subTituloPalestra")[0];
        const imagemPalestra = formulario.find("#imagemPalestra")[0];
        const legendaImagemPalestra = formulario.find("#legendaImagemPalestra")[0];
        const imagemAutorPalestra = formulario.find("#imagemAutorPalestra")[0];
        const nomeAutorPalestra = formulario.find("#nomeAutorPalestra")[0];
        const nomeBotao1 = formulario.find("#nomeBotao1")[0];
        const linkBotao1 = formulario.find("#linkBotao1")[0];
        const targetBotao1 = formulario.find("#targetBotao1")[0];
        const dataPalestra = formulario.find("#dataPalestra")[0];
        const status = formulario.find("#status")[0];

        let nomeBlocoTexto = "textoPalestra";

        if (!CKEDITOR.instances[nomeBlocoTexto]) {
            CKEDITOR.replace(nomeBlocoTexto);
        }

        const editor = CKEDITOR.instances[nomeBlocoTexto];

        editor.on('instanceReady', function() {

            $.ajax({
                type: "POST",
                url: "backend/carrega-conteudo.php",
                data: {
                    origem: "carregaPalestra",
                    paginaId: paginaId
                }
            }).done(function(data) {

                const conteudoPagina = JSON.parse(data);
                let textoPalestra = conteudoPagina.textoPalestra;

                editor.setData(textoPalestra);

                tituloPalestra.value = conteudoPagina.tituloPalestra;
                subTituloPalestra.value = conteudoPagina.subTituloPalestra;
                legendaImagemPalestra.value = conteudoPagina.legendaImagemPalestra;
                nomeBotao1.value = conteudoPagina.nomeBotao1;
                linkBotao1.value = conteudoPagina.linkBotao1;
                targetBotao1.value = conteudoPagina.targetBotao1;
                dataPalestra.value = conteudoPagina.dataPalestra;
                nomeAutorPalestra.value = conteudoPagina.nomeAutorPalestra;
                status.value = conteudoPagina.status;

                imagemPalestra.src = "../assets/uploads/" + conteudoPagina.imagemPalestra;
                imagemAutorPalestra.src = "../assets/uploads/" + conteudoPagina.imagemAutorPalestra;

            });
        });
    }

    function AtualizaPalestra() {
        const formulario = $("#form-palestra");
        const paginaId = formulario.find("#paginaId")[0];
        const tituloPalestra = formulario.find("#tituloPalestra")[0];
        const subTituloPalestra = formulario.find("#subTituloPalestra")[0];
        const imagemPalestra = formulario.find("#imagemPalestra")[0];
        const legendaImagemPalestra = formulario.find("#legendaImagemPalestra")[0];
        const imagemAutorPalestra = formulario.find("#imagemAutorPalestra")[0];
        const nomeAutorPalestra = formulario.find("#nomeAutorPalestra")[0];
        const nomeBotao1 = formulario.find("#nomeBotao1")[0];
        const linkBotao1 = formulario.find("#linkBotao1")[0];
        const targetBotao1 = formulario.find("#targetBotao1")[0];
        const dataPalestra = formulario.find("#dataPalestra")[0];
        const status = formulario.find("#status")[0];
        const botaoAtualiza = formulario.find("#btn-atualiza")[0];

        let nomeBlocoTexto = "textoPalestra";

        const editor = CKEDITOR.instances[nomeBlocoTexto];
        const textoPalestra = editor.getData();

        const srcimagemPalestra = obterUltimoSegmentoDaURL(imagemPalestra.src);
        const srcimagemAutorPalestra = obterUltimoSegmentoDaURL(imagemAutorPalestra.src);

        const formData = new FormData();
        formData.append("origem", "atualizaPalestra");
        formData.append("paginaId", paginaId.value);
        formData.append("tituloPalestra", tituloPalestra.value);
        formData.append("subTituloPalestra", subTituloPalestra.value);
        formData.append("imagemPalestra", srcimagemPalestra);
        formData.append("nomeBotao1", nomeBotao1.value);
        formData.append("legendaImagemPalestra", legendaImagemPalestra.value);
        formData.append("linkBotao1", linkBotao1.value);
        formData.append("targetBotao1", targetBotao1.value);
        formData.append("dataPalestra", dataPalestra.value);
        formData.append("nomeAutorPalestra", nomeAutorPalestra.value);
        formData.append("imagemAutorPalestra", srcimagemAutorPalestra);
        formData.append("status", status.value);
        formData.append("textoPalestra", textoPalestra);

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

            console.log(data);

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