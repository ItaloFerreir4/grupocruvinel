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
                    <h2>Livro</h2>
                </div>
                <div class="body">
                    <form method="post" id="form-livro">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="tituloLivro" name="tituloLivro">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Subtitulo</label>
                                    <input type="text" class="form-control" id="subTituloLivro" name="subTituloLivro">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemLivro" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagemLivro" src="null" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Legenda imagem</label>
                                    <input type="text" class="form-control" id="legendaImagemLivro" name="legendaImagemLivro">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Texto</label>
                                    <textarea class="form-control" id="textoLivro" name="textoLivro" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Nome autor</label>
                                    <input type="text" class="form-control" id="nomeAutorLivro" name="nomeAutorLivro">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Imagem autor</label>
                                    <button class="btn btn-default selecionarImagem" imagem="imagemAutorLivro" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid h50 objContain" id="imagemAutorLivro" src="null" alt="">
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
                            <div class="col-md-6 col-sm-12 hidden">
                                <div class="form-group">
                                    <label>Categorias</label>
                                    <select class="form-control" name="categoriasId" id="categoriasId" multiple="multiple"></select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <select class="form-control" name="tipoLivro" id="tipoLivro">
                                        <option value="Livro">Livro</option>
                                        <!-- <option value="E-book">E-book</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Data</label>
                                    <input type="date" class="form-control" name="dataLivro" id="dataLivro">
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
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza" onClick="AtualizaLivro()">Atualizar</button>
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
                            <button type="button" class="btn btn-info btn-volta" style="float: right;" id="btn-volta-conteudo-1" onClick="ListaConteudo(1)"><span class="sr-only">Fechar</span> <i class="fa fa-reply"></i></button>
                            <button class="btn btn-primary btn-adiciona" style="float: right;" type="button" id="btn-adiciona-conteudo-1" onClick="MostraCadastro(1)">Adicionar</button>
                        </div>
                    </div>
                    <form method="post" id="form-1">
                        <div class="row clearfix mt-5">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
                            <input type="hidden" class="form-control" name="idConteudo" id="idConteudo" value="">
                            <input type="hidden" class="form-control" name="numeroConteudo" id="numeroConteudo" value="1">

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
                    <h2>Banner</h2>
                </div>
                <div class="body">
                    <form method="post" id="form-2">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
                            <input type="hidden" class="form-control" name="idConteudo" id="idConteudo" value="">
                            <input type="hidden" class="form-control" name="numeroConteudo" id="numeroConteudo" value="2">

                            <div class="col-12 hidden">
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
                    <h2>Bloco Video</h2>
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
                    <h2>Banner 2</h2>
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
                                    <label>Imagem Desktop</label>
                                    <button class="btn btn-default selecionarImagem" formConteudo="4" imagem="imagem1Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                    <img class="img-fluid wauto h200 objContain" id="imagem1Conteudo" src="" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Imagem Mobile</label>
                                    <button class="btn btn-default selecionarImagem" formConteudo="4" imagem="imagem2Conteudo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
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
        CarregaLivro(<?php echo $_POST["idPagina"]; ?>);
        CarregaCategorias(0);
        ListaConteudo(1);
        CarregaConteudo(2);
        CarregaConteudo(3);
        CarregaConteudo(4);

        $('#categoriaLivro').select2({
            placeholder: 'Pesquisar...',
        });
    });
</script>

<script defer>
    function CarregaCategorias(tipoCategoria) {

        const select = document.getElementById("categoriaLivro");

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

    function CarregaLivro(paginaId) {
        const formulario = $("#form-livro");
        const tituloLivro = formulario.find("#tituloLivro")[0];
        const subTituloLivro = formulario.find("#subTituloLivro")[0];
        const imagemLivro = formulario.find("#imagemLivro")[0];
        const legendaImagemLivro = formulario.find("#legendaImagemLivro")[0];
        const nomeAutorLivro = formulario.find("#nomeAutorLivro")[0];
        const imagemAutorLivro = formulario.find("#imagemAutorLivro")[0];
        const dataLivro = formulario.find("#dataLivro")[0];
        const tipoLivro = formulario.find("#tipoLivro")[0];
        const nomeBotao1 = formulario.find("#nomeBotao1")[0];
        const linkBotao1 = formulario.find("#linkBotao1")[0];
        const targetBotao1 = formulario.find("#targetBotao1")[0];
        const status = formulario.find("#status")[0];

        let nomeBlocoTexto = "textoLivro";

        if (!CKEDITOR.instances[nomeBlocoTexto]) {
            CKEDITOR.replace(nomeBlocoTexto);
        }

        const editor = CKEDITOR.instances[nomeBlocoTexto];

        editor.on('instanceReady', function() {

            $.ajax({
                type: "POST",
                url: "backend/carrega-conteudo.php",
                data: {
                    origem: "carregaLivro",
                    paginaId: paginaId
                }
            }).done(function(data) {

                const conteudoPagina = JSON.parse(data);
                let textoLivro = conteudoPagina.textoLivro;

                editor.setData(textoLivro);

                tituloLivro.value = conteudoPagina.tituloLivro;
                subTituloLivro.value = conteudoPagina.subTituloLivro;
                legendaImagemLivro.value = conteudoPagina.legendaImagemLivro;
                nomeAutorLivro.value = conteudoPagina.nomeAutorLivro;
                dataLivro.value = conteudoPagina.dataLivro;
                tipoLivro.value = conteudoPagina.tipoLivro;
                nomeBotao1.value = conteudoPagina.nomeBotao1;
                linkBotao1.value = conteudoPagina.linkBotao1;
                targetBotao1.value = conteudoPagina.targetBotao1;
                status.value = conteudoPagina.status;

                imagemLivro.src = "../assets/uploads/" + conteudoPagina.imagemLivro;
                imagemAutorLivro.src = "../assets/uploads/" + conteudoPagina.imagemAutorLivro;

                let valorCategorias = conteudoPagina.categoriaLivro;
                if (valorCategorias) {
                    $('#categoriaLivro').val(JSON.parse(valorCategorias));
                    $('#categoriaLivro').trigger('change');
                }
            });
        });
    }

    function AtualizaLivro() {
        const formulario = $("#form-livro");
        const paginaId = formulario.find("#paginaId")[0];
        const tituloLivro = formulario.find("#tituloLivro")[0];
        const subTituloLivro = formulario.find("#subTituloLivro")[0];
        const imagemLivro = formulario.find("#imagemLivro")[0];
        const legendaImagemLivro = formulario.find("#legendaImagemLivro")[0];
        const nomeAutorLivro = formulario.find("#nomeAutorLivro")[0];
        const imagemAutorLivro = formulario.find("#imagemAutorLivro")[0];
        const dataLivro = formulario.find("#dataLivro")[0];
        const tipoLivro = formulario.find("#tipoLivro")[0];
        const nomeBotao1 = formulario.find("#nomeBotao1")[0];
        const linkBotao1 = formulario.find("#linkBotao1")[0];
        const targetBotao1 = formulario.find("#targetBotao1")[0];
        const status = formulario.find("#status")[0];
        const botaoAtualiza = formulario.find("#btn-atualiza")[0];

        let categoriaLivro = formulario.find("#categoriaLivro").val();
        let nomeBlocoTexto = "textoLivro";

        const editor = CKEDITOR.instances[nomeBlocoTexto];
        const textoLivro = editor.getData();

        const srcimagemLivro = obterUltimoSegmentoDaURL(imagemLivro.src);
        const srcimagemAutorLivro = obterUltimoSegmentoDaURL(imagemAutorLivro.src);

        categoriaLivro = JSON.stringify(categoriaLivro);

        console.log(categoriaLivro);

        const formData = new FormData();
        formData.append("origem", "atualizaLivro");
        formData.append("paginaId", paginaId.value);
        formData.append("tituloLivro", tituloLivro.value);
        formData.append("subTituloLivro", subTituloLivro.value);
        formData.append("imagemLivro", srcimagemLivro);
        formData.append("imagemAutorLivro", srcimagemAutorLivro);
        formData.append("legendaImagemLivro", legendaImagemLivro.value);
        formData.append("nomeAutorLivro", nomeAutorLivro.value);
        formData.append("dataLivro", dataLivro.value);
        formData.append("categoriaLivro", categoriaLivro);
        formData.append("tipoLivro", tipoLivro.value);
        formData.append("textoLivro", textoLivro);
        formData.append("nomeBotao1", nomeBotao1.value);
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