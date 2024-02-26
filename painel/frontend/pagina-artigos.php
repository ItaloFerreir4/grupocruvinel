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
                <h2>Pagina Artigos</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="lista" pagina="lista" categoria="0" href="javascript:void(0);" onClick="Pagina(this)">Paginas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pagina Artigos</li>
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
                                <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="25">
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
                                        <label>Imagem</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="1" imagem="imagem1Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200 objContain" id="imagem1Conteudo" src="" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Imagem Mobile</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="1" imagem="imagem2Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200 objContain" id="imagem2Conteudo" src="null" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">  
                                        <label>Legenda da imagem</label>                                            
                                        <input type="text" class="form-control" id="legendaImagem1Conteudo" name="legendaImagem1Conteudo">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
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
        </div>
    </div>

    <script defer src="./tema/assets/vendor/ckeditor/ckeditor.js"></script>
    <script defer src="./tema/assets/vendor/toastr/toastr.js"></script>

    <script>
        $(document).unbind("click").ready(function () {      
            CarregaSeo(25);
            CarregaConteudo(1);
        });
    </script>

<?php 
'';
?>