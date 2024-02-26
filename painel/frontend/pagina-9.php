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
                    <h2>Evento</h2>
                </div>
                <div class="body">
                    <form method="post" id="form-evento">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="tituloEvento" name="tituloEvento">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Subtitulo</label>
                                    <input type="text" class="form-control" id="subTituloEvento" name="subTituloEvento">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemEvento" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagemEvento" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Legenda imagem</label>
                                    <input type="text" class="form-control" id="legendaImagemEvento" name="legendaImagemEvento">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Texto</label>
                                    <textarea class="form-control" id="textoEvento" name="textoEvento" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Data</label>
                                    <input type="date" class="form-control" name="dataEvento" id="dataEvento" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Local</label>
                                    <input type="text" class="form-control" id="localEvento" name="localEvento">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Tags</label>
                                    <input type="text" class="form-control" id="tagsEvento" name="tagsEvento">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Nome autor</label>
                                    <input type="text" class="form-control" id="nomeAutorEvento" name="nomeAutorEvento">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Imagem autor</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemAutorEvento" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid h50 objContain" id="imagemAutorEvento" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 hidden">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <input type="text" class="form-control" name="categoriaEvento" id="categoriaEvento" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">
                                    <label>Nome do botão 1</label>
                                    <input type="text" class="form-control" id="nomeBotao1" name="nomeBotao1">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">
                                    <label>Link do botão 1</label>
                                    <input type="text" class="form-control" id="linkBotao1" name="linkBotao1">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">
                                    <label>Target do botão 1</label>
                                    <select class="form-control" name="targetBotao1" id="targetBotao1">
                                        <option value="_blank">Blank</option>
                                        <option value="_self">Self</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">
                                    <label>Nome do botão 2</label>
                                    <input type="text" class="form-control" id="nomeBotao2" name="nomeBotao2">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">
                                    <label>Link do botão 2</label>
                                    <input type="text" class="form-control" id="linkBotao2" name="linkBotao2">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">
                                    <label>Target do botão 2</label>
                                    <select class="form-control" name="targetBotao2" id="targetBotao2">
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
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza" onClick="AtualizaEvento()">Atualizar</button>
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
        CarregaEvento(<?php echo $_POST["idPagina"]; ?>);
        CarregaConteudo(1);
        CarregaConteudo(2);

        // $(function() {
        //     $('input[name="dataEvento"]').daterangepicker({
        //         locale: {
        //             "format": "DD/MM/YYYY"
        //         },
        //         opens: 'left'
        //     });
        // });
    });
</script>

<script defer>
    function CarregaEvento(paginaId) {
        const formulario = $("#form-evento");
        const tituloEvento = formulario.find("#tituloEvento")[0];
        const subTituloEvento = formulario.find("#subTituloEvento")[0];
        const imagemEvento = formulario.find("#imagemEvento")[0];
        const legendaImagemEvento = formulario.find("#legendaImagemEvento")[0];
        const dataEvento = formulario.find("#dataEvento")[0];
        const categoriaEvento = formulario.find("#categoriaEvento")[0];
        const tagsEvento = formulario.find("#tagsEvento")[0];
        const localEvento = formulario.find("#localEvento")[0];
        const nomeAutorEvento = formulario.find("#nomeAutorEvento")[0];
        const imagemAutorEvento = formulario.find("#imagemAutorEvento")[0];
        const nomeBotao1 = formulario.find("#nomeBotao1")[0];
        const linkBotao1 = formulario.find("#linkBotao1")[0];
        const targetBotao1 = formulario.find("#targetBotao1")[0];
        const nomeBotao2 = formulario.find("#nomeBotao2")[0];
        const linkBotao2 = formulario.find("#linkBotao2")[0];
        const targetBotao2 = formulario.find("#targetBotao2")[0];
        const status = formulario.find("#status")[0];

        let nomeBlocoTexto = "textoEvento";

        if (!CKEDITOR.instances[nomeBlocoTexto]) {
            CKEDITOR.replace(nomeBlocoTexto);
        }

        const editor = CKEDITOR.instances[nomeBlocoTexto];

        editor.on('instanceReady', function() {

            $.ajax({
                type: "POST",
                url: "backend/carrega-conteudo.php",
                data: {
                    origem: "carregaEvento",
                    paginaId: paginaId
                }
            }).done(function(data) {

                const conteudoPagina = JSON.parse(data);

                let textoEvento = conteudoPagina.textoEvento;

                editor.setData(textoEvento);

                tituloEvento.value = conteudoPagina.tituloEvento;
                subTituloEvento.value = conteudoPagina.subTituloEvento;
                legendaImagemEvento.value = conteudoPagina.legendaImagemEvento;
                dataEvento.value = conteudoPagina.dataEvento;
                categoriaEvento.value = conteudoPagina.categoriaEvento;
                tagsEvento.value = conteudoPagina.tagsEvento;
                localEvento.value = conteudoPagina.localEvento;
                nomeAutorEvento.value = conteudoPagina.nomeAutorEvento;
                nomeBotao1.value = conteudoPagina.nomeBotao1;
                linkBotao1.value = conteudoPagina.linkBotao1;
                targetBotao1.value = conteudoPagina.targetBotao1;
                nomeBotao2.value = conteudoPagina.nomeBotao2;
                linkBotao2.value = conteudoPagina.linkBotao2;
                targetBotao2.value = conteudoPagina.targetBotao2;
                status.value = conteudoPagina.status;

                imagemEvento.src = "../assets/uploads/" + conteudoPagina.imagemEvento;
                imagemAutorEvento.src = "../assets/uploads/" + conteudoPagina.imagemAutorEvento;
            });
        });
    }

    function AtualizaEvento() {
        const formulario = $("#form-evento");
        const paginaId = formulario.find("#paginaId")[0];
        const tituloEvento = formulario.find("#tituloEvento")[0];
        const subTituloEvento = formulario.find("#subTituloEvento")[0];
        const imagemEvento = formulario.find("#imagemEvento")[0];
        const legendaImagemEvento = formulario.find("#legendaImagemEvento")[0];
        const dataEvento = formulario.find("#dataEvento")[0];
        const categoriaEvento = formulario.find("#categoriaEvento")[0];
        const tagsEvento = formulario.find("#tagsEvento")[0];
        const localEvento = formulario.find("#localEvento")[0];
        const nomeAutorEvento = formulario.find("#nomeAutorEvento")[0];
        const imagemAutorEvento = formulario.find("#imagemAutorEvento")[0];
        const nomeBotao1 = formulario.find("#nomeBotao1")[0];
        const linkBotao1 = formulario.find("#linkBotao1")[0];
        const targetBotao1 = formulario.find("#targetBotao1")[0];
        const nomeBotao2 = formulario.find("#nomeBotao2")[0];
        const linkBotao2 = formulario.find("#linkBotao2")[0];
        const targetBotao2 = formulario.find("#targetBotao2")[0];
        const status = formulario.find("#status")[0];
        const botaoAtualiza = formulario.find("#btn-atualiza")[0];

        let nomeBlocoTexto = "textoEvento";

        const editor = CKEDITOR.instances[nomeBlocoTexto];
        const textoEvento = editor.getData();

        const srcimagemEvento = obterUltimoSegmentoDaURL(imagemEvento.src);
        const srcimagemAutorEvento = obterUltimoSegmentoDaURL(imagemAutorEvento.src);

        const formData = new FormData();
        formData.append("origem", "atualizaEvento");
        formData.append("paginaId", paginaId.value);
        formData.append("tituloEvento", tituloEvento.value);
        formData.append("subTituloEvento", subTituloEvento.value);
        formData.append("imagemEvento", srcimagemEvento);
        formData.append("legendaImagemEvento", legendaImagemEvento.value);
        formData.append("dataEvento", dataEvento.value);
        formData.append("categoriaEvento", categoriaEvento.value);
        formData.append("tagsEvento", tagsEvento.value);
        formData.append("localEvento", localEvento.value);
        formData.append("nomeAutorEvento", nomeAutorEvento.value);
        formData.append("imagemAutorEvento", srcimagemAutorEvento);
        formData.append("textoEvento", textoEvento);
        formData.append("nomeBotao1", nomeBotao1.value);
        formData.append("linkBotao1", linkBotao1.value);
        formData.append("targetBotao1", targetBotao1.value);
        formData.append("nomeBotao2", nomeBotao2.value);
        formData.append("linkBotao2", linkBotao2.value);
        formData.append("targetBotao2", targetBotao2.value);
        formData.append("status", status.value);

        botaoAtualiza.innerHTML = "<i class='fa fa-spinner fa-spin'></i> <span>Carregando...</span>";

        $.ajax({
            type: "POST",
            url: "backend/atualiza-conteudo.php",
            data: formData,
            contentType: false, // Importante: não defina o tipo de conteúdo
            processData: false, // Importante: não processar os dados
        }).done(function(data) {

            console.log(data);

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