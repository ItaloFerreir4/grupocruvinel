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
                <h2>Pagina Inicial</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="lista" pagina="lista" categoria="0" href="javascript:void(0);" onClick="Pagina(this)">Paginas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pagina Inicial</li>
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
                        <h2>Slide</h2>
                    </div>
                    <div class="body">   
                        <div class="row mb-1">
                            <div class="col-12">
                                <button type="button" class="btn btn-info btn-volta" style="float: right;" id="btn-volta-conteudo-1" onClick="ListaConteudo(1)"><span class="sr-only">Fechar</span> <i class="fa fa-reply"></i></button>
                                <button class="btn btn-primary btn-adiciona" style="float: right;" type="button" id="btn-adiciona-conteudo-1" onClick="MostraCadastro(1)">Adicionar</button>
                            </div>
                        </div>
                        <form method="post" id="form-1">
                            <div class="row clearfix mt-5">
                                <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="1">
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
                                        <img class="img-fluid wauto h200" id="imagem1Conteudo" src="null" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">  
                                        <label>Imagem Mobile</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="1" imagem="imagem2Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200" id="imagem2Conteudo" src="null" alt="">
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
                                        <img class="img-fluid wauto h200" id="imagem3Conteudo" src="null" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Imagem 4</label>
                                        <button class="btn btn-default selecionarImagem" imagem="imagem4Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200" id="imagem4Conteudo" src="null" alt="">
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
                                        <textarea class="form-control" id="textoConteudo1" name="textoConteudo1" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">  
                                        <label>Nome do botão</label>                                            
                                        <input type="text" class="form-control" id="nomeBotao1" name="nomeBotao1">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">  
                                        <label>Link do botão</label>                                            
                                        <input type="text" class="form-control" id="linkBotao1" name="linkBotao1">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
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
                                    <button class="btn btn-success btn-cadastra" type="button" id="btn-cadastra-conteudo-1" onClick="CadastraConteudo(1)">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                        <div id="tabela-1">
                            <div class="table-responsive">
                                <table class="table table-hover dataTable table-custom spacing5" id="tabela-conteudo-1">
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Imagem</th>
                                            <th>Imagem</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Imagem</th>
                                            <th>Imagem</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="listaconteudo1">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Atuação 1</h2>
                    </div>
                    <div class="body">     
                        <form method="post" id="form-2">
                            <div class="row clearfix">
                                <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="1">
                                <input type="hidden" class="form-control" name="idConteudo" id="idConteudo" value="">
                                <input type="hidden" class="form-control" name="numeroConteudo" id="numeroConteudo" value="2">
                        
                                <div class="col-12">
                                    <div class="form-group">    
                                        <label>Titulo</label>
                                        <input type="text" class="form-control" id="tituloConteudo" name="tituloConteudo">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">    
                                        <label>Imagem</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="2" imagem="imagem1Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200 objContain" id="imagem1Conteudo" src="" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Imagem Mobile</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="2" imagem="imagem2Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200 objContain" id="imagem2Conteudo" src="null" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
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
                                <div class="col-12">
                                    <div class="form-group"> 
                                        <label>Texto</label>
                                        <textarea class="form-control" id="textoConteudo2" name="textoConteudo2" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">  
                                        <label>Nome do botão</label>                                            
                                        <input type="text" class="form-control" id="nomeBotao1" name="nomeBotao1">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">  
                                        <label>Link do botão</label>                                            
                                        <input type="text" class="form-control" id="linkBotao1" name="linkBotao1">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
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
                        <h2>Atuação 2</h2>
                    </div>
                    <div class="body">     
                        <form method="post" id="form-3">
                            <div class="row clearfix">
                                <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="1">
                                <input type="hidden" class="form-control" name="idConteudo" id="idConteudo" value="">
                                <input type="hidden" class="form-control" name="numeroConteudo" id="numeroConteudo" value="3">
                        
                                <div class="col-12 hidden">
                                    <div class="form-group">    
                                        <label>Titulo</label>
                                        <input type="text" class="form-control" id="tituloConteudo" name="tituloConteudo">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">    
                                        <label>Imagem</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="3" imagem="imagem1Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200 objContain" id="imagem1Conteudo" src="" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Imagem Mobile</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="3" imagem="imagem2Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
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
                                        <label>Imagem Bloco 2</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="3" imagem="imagem3Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
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
                                <div class="col-12">
                                    <div class="form-group"> 
                                        <label>Texto</label>
                                        <textarea class="form-control" id="textoConteudo3" name="textoConteudo3" rows="10"></textarea>
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
                                    <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-conteudo-3" onClick="AtualizaConteudo(3)">Atualizar</button>
                                    <button class="btn btn-success btn-cadastra hidden" type="button" id="btn-cadastra-conteudo-3" onClick="CadastraConteudo(3)">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>                    
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Resultados</h2>
                    </div>
                    <div class="body">   
                        <div class="row mb-1">
                            <div class="col-12">
                                <button type="button" class="btn btn-info btn-volta" style="float: right;" id="btn-volta-conteudo-4" onClick="ListaConteudo(4)"><span class="sr-only">Fechar</span> <i class="fa fa-reply"></i></button>
                                <button class="btn btn-primary btn-adiciona" style="float: right;" type="button" id="btn-adiciona-conteudo-4" onClick="MostraCadastro(4)">Adicionar</button>
                            </div>
                        </div>
                        <form method="post" id="form-4">
                            <div class="row clearfix mt-5">
                                <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="1">
                                <input type="hidden" class="form-control" name="idConteudo" id="idConteudo" value="">
                                <input type="hidden" class="form-control" name="numeroConteudo" id="numeroConteudo" value="4">
                                
                                <div class="col-12">
                                    <div class="form-group">    
                                        <label>Titulo</label>
                                        <input type="text" class="form-control" id="tituloConteudo" name="tituloConteudo">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">    
                                        <label>Imagem</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="4" imagem="imagem1Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200" id="imagem1Conteudo" src="null" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Imagem Mobile</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="4" imagem="imagem2Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200" id="imagem2Conteudo" src="null" alt="">
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
                                        <img class="img-fluid wauto h200" id="imagem3Conteudo" src="null" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Imagem 4</label>
                                        <button class="btn btn-default selecionarImagem" imagem="imagem4Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200" id="imagem4Conteudo" src="null" alt="">
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
                                <div class="col-12">
                                    <div class="form-group"> 
                                        <label>Texto</label>
                                        <textarea class="form-control" id="textoConteudo4" name="textoConteudo4" rows="10"></textarea>
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
                                    <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-conteudo-4" onClick="AtualizaConteudo(4)">Atualizar</button>
                                    <button class="btn btn-success btn-cadastra" type="button" id="btn-cadastra-conteudo-4" onClick="CadastraConteudo(4)">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                        <div id="tabela-4">
                            <div class="table-responsive">
                                <table class="table table-hover dataTable table-custom spacing5" id="tabela-conteudo-4">
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Imagem</th>
                                            <th>Texto</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Imagem</th>
                                            <th>Texto</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="listaconteudo4">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Depoimentos</h2>
                    </div>
                    <div class="body">   
                        <div class="row mb-1">
                            <div class="col-12">
                                <button type="button" class="btn btn-info btn-volta" style="float: right;" id="btn-volta-conteudo-5" onClick="ListaConteudo(5)"><span class="sr-only">Fechar</span> <i class="fa fa-reply"></i></button>
                                <button class="btn btn-primary btn-adiciona" style="float: right;" type="button" id="btn-adiciona-conteudo-5" onClick="MostraCadastro(5)">Adicionar</button>
                            </div>
                        </div>
                        <form method="post" id="form-5">
                            <div class="row clearfix mt-5">
                                <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="1">
                                <input type="hidden" class="form-control" name="idConteudo" id="idConteudo" value="">
                                <input type="hidden" class="form-control" name="numeroConteudo" id="numeroConteudo" value="5">
                                
                                <div class="col-12">
                                    <div class="form-group">    
                                        <label>Titulo</label>
                                        <input type="text" class="form-control" id="tituloConteudo" name="tituloConteudo">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">    
                                        <label>Imagem</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="5" imagem="imagem1Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200" id="imagem1Conteudo" src="null" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Imagem Mobile</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="5" imagem="imagem2Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200" id="imagem2Conteudo" src="null" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">  
                                        <label>Legenda da imagem</label>                                            
                                        <input type="text" class="form-control" id="legendaImagem1Conteudo" name="legendaImagem1Conteudo">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">  
                                        <label>Autor</label>                                            
                                        <input type="text" class="form-control" id="legendaImagem2Conteudo" name="legendaImagem2Conteudo">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">    
                                        <label>Imagem 3</label>
                                        <button class="btn btn-default selecionarImagem" imagem="imagem3Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200" id="imagem3Conteudo" src="null" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Imagem 4</label>
                                        <button class="btn btn-default selecionarImagem" imagem="imagem4Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200" id="imagem4Conteudo" src="null" alt="">
                                    </div>
                                </div>                                
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">  
                                        <label>Função</label>                                            
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
                                        <textarea class="form-control" id="textoConteudo5" name="textoConteudo5" rows="10"></textarea>
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
                                    <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-conteudo-5" onClick="AtualizaConteudo(5)">Atualizar</button>
                                    <button class="btn btn-success btn-cadastra" type="button" id="btn-cadastra-conteudo-5" onClick="CadastraConteudo(5)">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                        <div id="tabela-5">
                            <div class="table-responsive">
                                <table class="table table-hover dataTable table-custom spacing5" id="tabela-conteudo-5">
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Imagem</th>
                                            <th>Texto</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Imagem</th>
                                            <th>Texto</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="listaconteudo5">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Video empresa</h2>
                    </div>
                    <div class="body">     
                        <form method="post" id="form-6">
                            <div class="row clearfix">
                                <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="1">
                                <input type="hidden" class="form-control" name="idConteudo" id="idConteudo" value="">
                                <input type="hidden" class="form-control" name="numeroConteudo" id="numeroConteudo" value="6">
                        
                                <div class="col-12 hidden">
                                    <div class="form-group">    
                                        <label>Titulo</label>
                                        <input type="text" class="form-control" id="tituloConteudo" name="tituloConteudo">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">    
                                        <label>Imagem</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="6" imagem="imagem1Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200 objContain" id="imagem1Conteudo" src="" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Imagem Mobile</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="6" imagem="imagem2Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
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
                                        <label>Imagem Bloco 2</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="3" imagem="imagem3Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
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
                                <div class="col-12 hidden">
                                    <div class="form-group"> 
                                        <label>Texto</label>
                                        <textarea class="form-control" id="textoConteudo6" name="textoConteudo6" rows="10"></textarea>
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
                                    <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-conteudo-6" onClick="AtualizaConteudo(6)">Atualizar</button>
                                    <button class="btn btn-success btn-cadastra hidden" type="button" id="btn-cadastra-conteudo-6" onClick="CadastraConteudo(6)">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>                    
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>O que fazemos</h2>
                    </div>
                    <div class="body">     
                        <form method="post" id="form-7">
                            <div class="row clearfix">
                                <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="1">
                                <input type="hidden" class="form-control" name="idConteudo" id="idConteudo" value="">
                                <input type="hidden" class="form-control" name="numeroConteudo" id="numeroConteudo" value="7">
                        
                                <div class="col-12 hidden">
                                    <div class="form-group">    
                                        <label>Titulo</label>
                                        <input type="text" class="form-control" id="tituloConteudo" name="tituloConteudo">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">    
                                        <label>Imagem</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="6" imagem="imagem1Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200 objContain" id="imagem1Conteudo" src="" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Imagem Mobile</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="6" imagem="imagem2Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200 objContain" id="imagem2Conteudo" src="null" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
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
                                        <label>Imagem Bloco 2</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="3" imagem="imagem3Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
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
                                <div class="col-12">
                                    <div class="form-group"> 
                                        <label>Texto</label>
                                        <textarea class="form-control" id="textoConteudo7" name="textoConteudo7" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">  
                                        <label>Nome do botão</label>                                            
                                        <input type="text" class="form-control" id="nomeBotao1" name="nomeBotao1">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">  
                                        <label>Link do botão</label>                                            
                                        <input type="text" class="form-control" id="linkBotao1" name="linkBotao1">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
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
                                    <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-conteudo-7" onClick="AtualizaConteudo(7)">Atualizar</button>
                                    <button class="btn btn-success btn-cadastra hidden" type="button" id="btn-cadastra-conteudo-7" onClick="CadastraConteudo(7)">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>                    
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Itens do que fazemos</h2>
                    </div>
                    <div class="body">   
                        <div class="row mb-1">
                            <div class="col-12">
                                <button type="button" class="btn btn-info btn-volta" style="float: right;" id="btn-volta-conteudo-8" onClick="ListaConteudo(8)"><span class="sr-only">Fechar</span> <i class="fa fa-reply"></i></button>
                                <button class="btn btn-primary btn-adiciona" style="float: right;" type="button" id="btn-adiciona-conteudo-8" onClick="MostraCadastro(8)">Adicionar</button>
                            </div>
                        </div>
                        <form method="post" id="form-8">
                            <div class="row clearfix mt-5">
                                <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="1">
                                <input type="hidden" class="form-control" name="idConteudo" id="idConteudo" value="">
                                <input type="hidden" class="form-control" name="numeroConteudo" id="numeroConteudo" value="8">
                                
                                <div class="col-12">
                                    <div class="form-group">    
                                        <label>Titulo</label>
                                        <input type="text" class="form-control" id="tituloConteudo" name="tituloConteudo">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">    
                                        <label>Imagem</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="8" imagem="imagem1Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200" id="imagem1Conteudo" src="null" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Imagem Mobile</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="8" imagem="imagem2Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200" id="imagem2Conteudo" src="null" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Legenda da imagem</label>                                            
                                        <input type="text" class="form-control" id="legendaImagem1Conteudo" name="legendaImagem1Conteudo">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Autor</label>                                            
                                        <input type="text" class="form-control" id="legendaImagem2Conteudo" name="legendaImagem2Conteudo">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">    
                                        <label>Imagem 3</label>
                                        <button class="btn btn-default selecionarImagem" imagem="imagem3Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200" id="imagem3Conteudo" src="null" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Imagem 4</label>
                                        <button class="btn btn-default selecionarImagem" imagem="imagem4Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200" id="imagem4Conteudo" src="null" alt="">
                                    </div>
                                </div>                                
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Função</label>                                            
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
                                <div class="col-12">
                                    <div class="form-group"> 
                                        <label>Texto</label>
                                        <textarea class="form-control" id="textoConteudo8" name="textoConteudo8" rows="10"></textarea>
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
                                    <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-conteudo-8" onClick="AtualizaConteudo(8)">Atualizar</button>
                                    <button class="btn btn-success btn-cadastra" type="button" id="btn-cadastra-conteudo-8" onClick="CadastraConteudo(8)">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                        <div id="tabela-8">
                            <div class="table-responsive">
                                <table class="table table-hover dataTable table-custom spacing5" id="tabela-conteudo-8">
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Texto</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Texto</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="listaconteudo8">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script defer src="./tema/assets/vendor/ckeditor/ckeditor.js"></script>
    <script defer src="./tema/assets/vendor/toastr/toastr.js"></script>

    <script>
        $(document).unbind("click").ready(function () {            
            CarregaSeo(1);
            ListaConteudo(1);
            ListaConteudo(4);
            ListaConteudo(5);
            ListaConteudo(8);
            CarregaConteudo(2);
            CarregaConteudo(3);
            CarregaConteudo(6);
            CarregaConteudo(7);
        });
    </script>
<?php 
'';
?>