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
                    <h2>Curso</h2>
                </div>
                <div class="body">
                    <form method="post" id="form-curso">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="tituloCurso" name="tituloCurso">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Subtitulo</label>
                                    <input type="text" class="form-control" id="subTituloCurso" name="subTituloCurso">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemCurso" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagemCurso" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Legenda imagem</label>
                                    <input type="text" class="form-control" id="legendaImagemCurso" name="legendaImagemCurso">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Texto</label>
                                    <textarea class="form-control" id="textoCurso" name="textoCurso" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Carga Horaria</label>
                                    <textarea class="form-control" id="cargaHorariaCurso" name="cargaHorariaCurso" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Mentor</label>
                                    <textarea class="form-control" id="mentorCurso" name="mentorCurso" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>Valor Avista</label>
                                    <input type="number" class="form-control" id="valorAvistaCurso" name="valorAvistaCurso">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>Valor Parcelado</label>
                                    <input type="number" class="form-control" id="valorParceladoCurso" name="valorParceladoCurso">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>Quantidade de Parcela</label>
                                    <input type="number" class="form-control" id="qtdParcelaCurso" name="qtdParcelaCurso">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Nome autor</label>
                                    <input type="text" class="form-control" id="nomeAutorCurso" name="nomeAutorCurso">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Imagem autor</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemAutorCurso" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid h50 objContain" id="imagemAutorCurso" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Link do botão</label>
                                    <input type="text" class="form-control" id="linkBotao1" name="linkBotao1">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Target do botão</label>
                                    <select class="form-control" name="targetBotao1" id="targetBotao1">
                                        <option value="_blank">Blank</option>
                                        <option value="_self">Self</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 hidden">
                                <div class="form-group">
                                    <label>Categorias</label>
                                    <input type="text" class="form-control" id="categoriasId" name="categoriasId">
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
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza" onClick="AtualizaCurso()">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Banner Inicial</h2>
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
                    <h2>O que vai aprender</h2>
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

                            <div class="col-12 hidden">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="tituloConteudo" name="tituloConteudo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 hidden">
                                <div class="form-group">
                                    <label>Imagem Desktop</label>
                                    <button class="btn btn-default selecionarImagem" formConteudo="1" imagem="imagem1Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200" id="imagem1Conteudo" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 hidden">
                                <div class="form-group">
                                    <label>Imagem Mobile</label>
                                    <button class="btn btn-default selecionarImagem" formConteudo="1" imagem="imagem2Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
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
                                        <th>Texto</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
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
                    <h2>Banner Video</h2>
                </div>
                <div class="body">
                    <form method="post" id="form-3">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
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
                                    <label>Imagem Desktop</label>
                                    <button class="btn btn-default selecionarImagem" formConteudo="3" imagem="imagem1Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagem1Conteudo" src="" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Imagem Mobile</label>
                                    <button class="btn btn-default selecionarImagem" formConteudo="3" imagem="imagem2Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
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
                    <h2>Banner Sobre</h2>
                </div>
                <div class="body">
                    <form method="post" id="form-4">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
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
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Texto</label>
                                    <textarea class="form-control" id="textoConteudo4" name="textoConteudo4" rows="10"></textarea>
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
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-conteudo-4" onClick="AtualizaConteudo(4)">Atualizar</button>
                                <button class="btn btn-success btn-cadastra hidden" type="button" id="btn-cadastra-conteudo-4" onClick="CadastraConteudo(4)">Cadastrar</button>
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
        CarregaCurso(<?php echo $_POST["idPagina"]; ?>);
        CarregaConteudo(1);
        CarregaConteudo(3);
        CarregaConteudo(4);
        ListaConteudo(2);
    });
</script>

<script defer>
    function CarregaCurso(paginaId) {
        const formulario = $("#form-curso");
        const tituloCurso = formulario.find("#tituloCurso")[0];
        const subTituloCurso = formulario.find("#subTituloCurso")[0];
        const imagemCurso = formulario.find("#imagemCurso")[0];
        const legendaImagemCurso = formulario.find("#legendaImagemCurso")[0];
        const linkBotao1 = formulario.find("#linkBotao1")[0];
        const targetBotao1 = formulario.find("#targetBotao1")[0];
        const categoriasId = formulario.find("#categoriasId")[0];
        const valorAvistaCurso = formulario.find("#valorAvistaCurso")[0];
        const valorParceladoCurso = formulario.find("#valorParceladoCurso")[0];
        const qtdParcelaCurso = formulario.find("#qtdParcelaCurso")[0];
        const imagemAutorCurso = formulario.find("#imagemAutorCurso")[0];
        const nomeAutorCurso = formulario.find("#nomeAutorCurso")[0];
        const status = formulario.find("#status")[0];

        let nomeBlocoTexto = "textoCurso";
        let nomeBlocoCarga = "cargaHorariaCurso";
        let nomeBlocoMentor = "mentorCurso";

        if (!CKEDITOR.instances[nomeBlocoTexto]) {
            CKEDITOR.replace(nomeBlocoTexto);
        }
        if (!CKEDITOR.instances[nomeBlocoCarga]) {
            CKEDITOR.replace(nomeBlocoCarga);
        }
        if (!CKEDITOR.instances[nomeBlocoMentor]) {
            CKEDITOR.replace(nomeBlocoMentor);
        }

        const editor = CKEDITOR.instances[nomeBlocoTexto];
        const editorCarga = CKEDITOR.instances[nomeBlocoCarga];
        const editorMentor = CKEDITOR.instances[nomeBlocoMentor];

        editor.on('instanceReady', function() {
            $.ajax({
                type: "POST",
                url: "backend/carrega-conteudo.php",
                data: {
                    origem: "carregaCurso",
                    paginaId: paginaId
                }
            }).done(function(data) {

                const conteudoPagina = JSON.parse(data);

                let textoCurso = conteudoPagina.textoCurso;
                let cargaHorariaCurso = conteudoPagina.cargaHorariaCurso;
                let mentorCurso = conteudoPagina.mentorCurso;

                editor.setData(textoCurso);
                editorCarga.setData(cargaHorariaCurso);
                editorMentor.setData(mentorCurso);

                tituloCurso.value = conteudoPagina.tituloCurso;
                subTituloCurso.value = conteudoPagina.subTituloCurso;
                legendaImagemCurso.value = conteudoPagina.legendaImagemCurso;
                linkBotao1.value = conteudoPagina.linkBotao1;
                targetBotao1.value = conteudoPagina.targetBotao1;
                categoriasId.value = conteudoPagina.categoriasId;
                valorAvistaCurso.value = conteudoPagina.valorAvistaCurso;
                valorParceladoCurso.value = conteudoPagina.valorParceladoCurso;
                qtdParcelaCurso.value = conteudoPagina.qtdParcelaCurso;
                nomeAutorCurso.value = conteudoPagina.nomeAutorCurso;
                status.value = conteudoPagina.status;

                imagemCurso.src = "../assets/uploads/" + conteudoPagina.imagemCurso;
                imagemAutorCurso.src = "../assets/uploads/" + conteudoPagina.imagemAutorCurso;
            });
        });
    }

    function AtualizaCurso() {
        const formulario = $("#form-curso");
        const paginaId = formulario.find("#paginaId")[0];
        const tituloCurso = formulario.find("#tituloCurso")[0];
        const subTituloCurso = formulario.find("#subTituloCurso")[0];
        const imagemCurso = formulario.find("#imagemCurso")[0];
        const legendaImagemCurso = formulario.find("#legendaImagemCurso")[0];
        const categoriasId = formulario.find("#categoriasId")[0];
        const linkBotao1 = formulario.find("#linkBotao1")[0];
        const targetBotao1 = formulario.find("#targetBotao1")[0];
        const valorAvistaCurso = formulario.find("#valorAvistaCurso")[0];
        const valorParceladoCurso = formulario.find("#valorParceladoCurso")[0];
        const qtdParcelaCurso = formulario.find("#qtdParcelaCurso")[0];
        const imagemAutorCurso = formulario.find("#imagemAutorCurso")[0];
        const nomeAutorCurso = formulario.find("#nomeAutorCurso")[0];
        const status = formulario.find("#status")[0];
        const botaoAtualiza = formulario.find("#btn-atualiza")[0];

        let nomeBlocoTexto = "textoCurso";
        let nomeBlocoCarga = "cargaHorariaCurso";
        let nomeBlocoMentor = "mentorCurso";

        const editor = CKEDITOR.instances[nomeBlocoTexto];
        const editorCarga = CKEDITOR.instances[nomeBlocoCarga];
        const editorMentor = CKEDITOR.instances[nomeBlocoMentor];
        const textoCurso = editor.getData();
        const cargaHorariaCurso = editorCarga.getData();
        const mentorCurso = editorMentor.getData();

        const srcimagemCurso = obterUltimoSegmentoDaURL(imagemCurso.src);
        const srcimagemAutorCurso = obterUltimoSegmentoDaURL(imagemAutorCurso.src);

        const formData = new FormData();
        formData.append("origem", "atualizaCurso");
        formData.append("paginaId", paginaId.value);
        formData.append("tituloCurso", tituloCurso.value);
        formData.append("subTituloCurso", subTituloCurso.value);
        formData.append("imagemCurso", srcimagemCurso);
        formData.append("legendaImagemCurso", legendaImagemCurso.value);
        formData.append("categoriasId", categoriasId.value);
        formData.append("textoCurso", textoCurso);
        formData.append("cargaHorariaCurso", cargaHorariaCurso);
        formData.append("mentorCurso", mentorCurso);
        formData.append("valorAvistaCurso", valorAvistaCurso.value);
        formData.append("valorParceladoCurso", valorParceladoCurso.value);
        formData.append("qtdParcelaCurso", qtdParcelaCurso.value);
        formData.append("nomeAutorCurso", nomeAutorCurso.value);
        formData.append("imagemAutorCurso", srcimagemAutorCurso);
        formData.append("linkBotao1", linkBotao1.value);
        formData.append("targetBotao1", targetBotao1.value);
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