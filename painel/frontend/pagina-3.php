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
                    <h2>Business</h2>
                </div>
                <div class="body">
                    <form method="post" id="form-business">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" id="nomeBusiness" name="nomeBusiness">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemBusiness" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagemBusiness" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Legenda imagem</label>
                                    <input type="text" class="form-control" id="legendaImagemBusiness" name="legendaImagemBusiness">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Titulo texto</label>
                                    <input type="text" class="form-control" id="tituloBusiness" name="tituloBusiness">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Texto</label>
                                    <textarea class="form-control" id="textoBusiness" name="textoBusiness" rows="10"></textarea>
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
                                    <label>Link</label>
                                    <input type="text" class="form-control" id="linkBotao1" name="linkBotao1">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>Target</label>
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
                                    <label>Link</label>
                                    <input type="text" class="form-control" id="linkBotao2" name="linkBotao2">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 hidden">
                                <div class="form-group">
                                    <label>Target</label>
                                    <select class="form-control" name="targetBotao2" id="targetBotao2">
                                        <option value="_blank">Blank</option>
                                        <option value="_self">Self</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 hidden">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <input type="text" class="form-control" id="categoriaBusiness" name="categoriaBusiness">
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
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza" onClick="AtualizaBusiness()">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                        <h2>Área de Atuação</h2>
                    </div>
                    <div class="body">   
                        <div class="row mb-1">
                            <div class="col-12">
                                <button type="button" class="btn btn-info btn-volta" style="float: right;" id="btn-volta-conteudo-2" onClick="ListaConteudo(2)"><span class="sr-only">Fechar</span> <i class="fa fa-reply"></i></button>
                                <button class="btn btn-primary btn-adiciona" style="float: right;" type="button" id="btn-adiciona-conteudo-2" onClick="MostraCadastro(2)">Adicionar</button>
                            </div>
                        </div>
                        <form method="post" id="form-2">
                            <div class="row clearfix mt-5">
                                <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
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
                                        <label>Imagem Desktop</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="2" imagem="imagem1Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200" id="imagem1Conteudo" src="null" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Imagem Mobile</label>
                                        <button class="btn btn-default selecionarImagem" formConteudo="2" imagem="imagem2Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                        <img class="img-fluid wauto h200" id="imagem2Conteudo" src="null" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Legenda da imagem desktop</label>                                            
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
                                <div class="col-12 hidden">
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
                                    <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-conteudo-2" onClick="AtualizaConteudo(2)">Atualizar</button>
                                    <button class="btn btn-success btn-cadastra" type="button" id="btn-cadastra-conteudo-2" onClick="CadastraConteudo(2)">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                        <div id="tabela-2">
                            <div class="table-responsive">
                                <table class="table table-hover dataTable table-custom spacing5" id="tabela-conteudo-2">
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
                                    <tbody id="listaconteudo2">
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
                    <h2>Video Empresa</h2>
                </div>
                <div class="body">     
                    <form method="post" id="form-3">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
                            <input type="hidden" class="form-control" name="idConteudo" id="idConteudo" value="">
                            <input type="hidden" class="form-control" name="numeroConteudo" id="numeroConteudo" value="3">
                    
                            <div class="col-12  hidden">
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
                            <div class="col-12 hidden">
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
                    <h2>Imagem Texto Empresa</h2>
                </div>
                <div class="body">     
                    <form method="post" id="form-4">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
                            <input type="hidden" class="form-control" name="idConteudo" id="idConteudo" value="">
                            <input type="hidden" class="form-control" name="numeroConteudo" id="numeroConteudo" value="4">
                    
                            <div class="col-12 hidden">
                                <div class="form-group">    
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="tituloConteudo" name="tituloConteudo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">    
                                    <label>Imagem</label>
                                    <button class="btn btn-default selecionarImagem" formConteudo="4" imagem="imagem1Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagem1Conteudo" src="" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 hidden">
                                <div class="form-group">  
                                    <label>Imagem Mobile</label>
                                    <button class="btn btn-default selecionarImagem" formConteudo="4" imagem="imagem2Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
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
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-conteudo-4" onClick="AtualizaConteudo(4)">Atualizar</button>
                                <button class="btn btn-success btn-cadastra hidden" type="button" id="btn-cadastra-conteudo-4" onClick="CadastraConteudo(4)">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>                    
        </div>
        <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Serviços</h2>
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
                                <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
                                <input type="hidden" class="form-control" name="idConteudo" id="idConteudo" value="">
                                <input type="hidden" class="form-control" name="numeroConteudo" id="numeroConteudo" value="5">
                                
                                <div class="col-12">
                                    <div class="form-group">    
                                        <label>Titulo</label>
                                        <input type="text" class="form-control" id="tituloConteudo" name="tituloConteudo">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">    
                                        <label>Imagem Desktop</label>
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
                                <div class="col-lg-6 col-md-12 hidden">
                                    <div class="form-group">  
                                        <label>Legenda da imagem desktop</label>                                            
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
                                <div class="col-12 hidden">
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
                    <div class="row">
                        <div class="col-6">
                            <h2>Formulario</h2>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <form method="post" id="formEmail1">
                        <input type="hidden" class="form-control" id="idFormulario" name="idFormulario" value="">
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
                                    <label>Assuntos (colocar itens separados por virgular ",")</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="select1Formulario" name="select1Formulario">                                           
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden">
                                <div class="form-group">   
                                    <label>Opçoes 2</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="select2Formulario" name="select2Formulario">                                           
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden">
                                <div class="form-group">   
                                    <label>Opçoes 3</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="select3Formulario" name="select3Formulario">                                           
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden">
                                <div class="form-group">   
                                    <label>Opçoes 4</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="select4Formulario" name="select4Formulario">                                           
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden">
                                <div class="form-group">   
                                    <label>Opçoes 5</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="select5Formulario" name="select5Formulario">                                           
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden">
                                <div class="form-group">   
                                    <label>Opçoes 6</label>
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
        CarregaBusiness(<?php echo $_POST["idPagina"]; ?>);
        CarregaConteudo(1);
        CarregaConteudo(3);
        CarregaConteudo(4);
        ListaConteudo(2);
        ListaConteudo(5);
        CarregaFormulario(1);
    });
</script>

<script defer>
    function CarregaBusiness(paginaId) {
        const formulario = $("#form-business");
        const nomeBusiness = formulario.find("#nomeBusiness")[0];
        const tituloBusiness = formulario.find("#tituloBusiness")[0];
        const imagemBusiness = formulario.find("#imagemBusiness")[0];
        const legendaImagemBusiness = formulario.find("#legendaImagemBusiness")[0];
        const categoriaBusiness = formulario.find("#categoriaBusiness")[0];
        const nomeBotao1 = formulario.find("#nomeBotao1")[0];
        const linkBotao1 = formulario.find("#linkBotao1")[0];
        const targetBotao1 = formulario.find("#targetBotao1")[0];
        const nomeBotao2 = formulario.find("#nomeBotao2")[0];
        const linkBotao2 = formulario.find("#linkBotao2")[0];
        const targetBotao2 = formulario.find("#targetBotao2")[0];
        const status = formulario.find("#status")[0];

        formulario.find("#paginaId")[0].value = paginaId;

        let nomeBlocoTexto = "textoBusiness";

        if (!CKEDITOR.instances[nomeBlocoTexto]) {
            CKEDITOR.replace(nomeBlocoTexto);
        }

        const editor = CKEDITOR.instances[nomeBlocoTexto];

        editor.on('instanceReady', function() {

            $.ajax({
                type: "POST",
                url: "backend/carrega-conteudo.php",
                data: {
                    origem: "carregaBusiness",
                    paginaId: paginaId
                }
            }).done(function(data) {

                const conteudoPagina = JSON.parse(data);
                let textoBusiness = conteudoPagina.textoBusiness;

                editor.setData(textoBusiness);

                nomeBusiness.value = conteudoPagina.nomeBusiness;
                tituloBusiness.value = conteudoPagina.tituloBusiness;
                legendaImagemBusiness.value = conteudoPagina.legendaImagemBusiness;
                categoriaBusiness.value = conteudoPagina.categoriaBusiness;
                nomeBotao1.value = conteudoPagina.nomeBotao1;
                linkBotao1.value = conteudoPagina.linkBotao1;
                targetBotao1.value = conteudoPagina.targetBotao1;
                nomeBotao2.value = conteudoPagina.nomeBotao2;
                linkBotao2.value = conteudoPagina.linkBotao2;
                targetBotao2.value = conteudoPagina.targetBotao2;
                status.value = conteudoPagina.status;

                imagemBusiness.src = "../assets/uploads/" + conteudoPagina.imagemBusiness;
            });
        });
    }

    function AtualizaBusiness() {
        const formulario = $("#form-business");
        const paginaId = formulario.find("#paginaId")[0];
        const nomeBusiness = formulario.find("#nomeBusiness")[0];
        const tituloBusiness = formulario.find("#tituloBusiness")[0];
        const imagemBusiness = formulario.find("#imagemBusiness")[0];
        const legendaImagemBusiness = formulario.find("#legendaImagemBusiness")[0];
        const categoriaBusiness = formulario.find("#categoriaBusiness")[0];
        const nomeBotao1 = formulario.find("#nomeBotao1")[0];
        const linkBotao1 = formulario.find("#linkBotao1")[0];
        const targetBotao1 = formulario.find("#targetBotao1")[0];
        const nomeBotao2 = formulario.find("#nomeBotao2")[0];
        const linkBotao2 = formulario.find("#linkBotao2")[0];
        const targetBotao2 = formulario.find("#targetBotao2")[0];
        const status = formulario.find("#status")[0];
        const botaoAtualiza = formulario.find("#btn-atualiza")[0];

        let nomeBlocoTexto = "textoBusiness";

        const editor = CKEDITOR.instances[nomeBlocoTexto];
        const textoBusiness = editor.getData();

        const srcimagemBusiness = obterUltimoSegmentoDaURL(imagemBusiness.src);

        const formData = new FormData();
        formData.append("origem", "atualizaBusiness");
        formData.append("paginaId", paginaId.value);
        formData.append("nomeBusiness", nomeBusiness.value);
        formData.append("tituloBusiness", tituloBusiness.value);
        formData.append("imagemBusiness", srcimagemBusiness);
        formData.append("legendaImagemBusiness", legendaImagemBusiness.value);
        formData.append("categoriaBusiness", categoriaBusiness.value);
        formData.append("nomeBotao1", nomeBotao1.value);
        formData.append("linkBotao1", linkBotao1.value);
        formData.append("targetBotao1", targetBotao1.value);
        formData.append("nomeBotao2", nomeBotao2.value);
        formData.append("linkBotao2", linkBotao2.value);
        formData.append("targetBotao2", targetBotao2.value);
        formData.append("status", status.value);
        formData.append("textoBusiness", textoBusiness);

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