<?php

function temaBar()
{
    echo '<nav class="navbar navbar-fixed-top">
            <div class="container-fluid">

                <div class="navbar-left">
                    <div class="navbar-brand">
                        <a class="small_menu_btn" href="javascript:void(0);"><i class="fa fa-align-left"></i></a>               
                    </div>
                </div>
                <div class="navbar-right">
                    <div id="navbar-menu">
                        <ul class="nav navbar-nav">                        
                            <li><a href="logout" class="icon-menu"><i class="fa fa-power-off"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        
        <div id="left-sidebar" class="sidebar">
            <div class="sidebar_icon">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="javascript:void(0);" id="Home-icon"><i class="fa fa-dashboard"></i></a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="javascript:void(0);" id="Email-icon"><i class="icon-envelope-letter"></i></a></li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="javascript:void(0);" id="Dev-icon"><i class="fa fa-code"></i></a>
                        <a class="nav-link" data-toggle="tab" href="javascript:void(0);" id="Profile-icon"><i class="fa fa-user"></i></a>
                        <a class="nav-link" data-toggle="tab" href="javascript:void(0);" id="Setting-icon"><i class="fa fa-cog"></i></a>
                    </li>
                </ul>
            </div>
            <div class="sidebar_list">
                <div class="tab-content" id="main-menu">
                    <div class="tab-pane active" id="Home-icon">
                        <nav class="sidebar-nav sidebar-scroll">
                            <ul class="metismenu">
                                <li class="header">Páginas Fixas</li>
                                <li><a class="lista" pagina="lista" categoria="0" href="javascript:void(0);" nomePagina="Paginas" onClick="Pagina(this)"><i class="fa fa-files-o"></i>Listar</a></li>
                                <li class="header">Páginas Dinâmicas</li>
                                    <li class="">
                                        <a href="#Blog" class="has-arrow" aria-expanded="false"><i class="fa fa-files-o"></i><span>Blogs</span></a>
                                        <ul aria-expanded="false" class="collapse" style="height: 0px;">
                                            <li><a class="lista" pagina="lista" categoria="10" href="javascript:void(0);" nomePagina="Blog-Detalhes" onClick="Pagina(this)">Listar/Adicionar</a></li>
                                            <li><a class="lista" pagina="lista" categoria="20" href="javascript:void(0);" nomePagina="blog-detalhes/categorias" onClick="Pagina(this)">Categorias</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="lista" pagina="lista" categoria="3" href="javascript:void(0);" nomePagina="Empresas-Detalhes" onClick="Pagina(this)"><i class="fa fa-files-o"></i><span>Empresas</span></a></li>      
                                    <li><a class="lista" pagina="listaServicos" href="javascript:void(0);" nomePagina="Servicos" onClick="Pagina(this)"><i class="fa fa-files-o"></i><span>Servicos</span></a></li>      
                                    <li><a class="lista" pagina="listaClientes" href="javascript:void(0);" nomePagina="Clientes" onClick="Pagina(this)"><i class="fa fa-files-o"></i><span>Clientes</span></a></li>      
                                    
                                </li>
                                <li class="">
                                    <a href="#Gerais" class="has-arrow" aria-expanded="false"><i class="fa fa-gear"></i><span>Configurações</span></a>
                                    <ul aria-expanded="false" class="collapse" style="height: 0px;">
                                        <li><a class="lista" pagina="sitemap" href="javascript:void(0);" nomePagina="SEO Geral" onClick="Pagina(this)">SEO Geral</a></li>
                                        <li><a class="lista" pagina="perguntas" href="javascript:void(0);" nomePagina="Perguntas" onClick="Pagina(this)">Perguntas</a></li>                                                                
                                        <li><a class="lista" pagina="listaMidia" href="javascript:void(0);" nomePagina="Midias" onClick="Pagina(this)">Midias</a></li>                                                                
                                        <li><a class="lista" pagina="formulario" href="javascript:void(0);" nomePagina="Formulario" onClick="Pagina(this)">Formulario</a></li>                                                                
                                        <li><a class="lista" pagina="contatos" href="javascript:void(0);" nomePagina="Contatos" onClick="Pagina(this)">Contatos</a></li>                                                                
                                        <li><a class="lista" pagina="redes" href="javascript:void(0);" nomePagina="Redes Sociais" onClick="Pagina(this)">Redes Sociais</a></li> 
                                    </ul>
                                </li>                                                        
                            </ul>
                        </nav>
                    </div>
                    <div class="tab-pane" id="Email-icon">
                        <nav class="sidebar-nav sidebar-scroll">
                            <ul class="metismenu">
                                <li><a class="lista" pagina="emails" href="javascript:void(0);" onClick="Pagina(this)"><i class="ti-view-list-alt"></i>Listar</a></li>                                                                                      
                            </ul>
                        </nav>
                    </div>
                    <div class="tab-pane" id="Dev-icon">
                        <nav class="sidebar-nav sidebar-scroll">
                            <ul class="metismenu">
                                <li><a class="lista" pagina="dev" href="javascript:void(0);" onClick="Pagina(this)"><i class="fa fa-code"></i>Desenvolvedores</a></li>   
                                <li><a class="lista" pagina="logs" href="javascript:void(0);" onClick="Pagina(this)"><i class=" fa fa-file-code-o"></i>Registro de Logs</a></li>                  
                            </ul>
                        </nav>
                    </div>
                    <div class="tab-pane" id="Profile-icon">
                        <nav class="sidebar-nav sidebar-scroll">
                            <ul class="metismenu">
                                <li><a class="lista" pagina="usuarios" href="javascript:void(0);" onClick="Pagina(this)"><i class="fa fa-users"></i>Usuarios</a></li>                                                                                      
                            </ul>
                        </nav>
                    </div>
                    <div class="tab-pane" id="Setting-icon">
                        <nav class="sidebar-nav sidebar-scroll">
                            <p>Configurações Painel</p>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    Dark Menu
                                    <div class="float-right">
                                        <label class="switch">
                                            <input type="checkbox" class="dark_menu_btn">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>            
                                </li>
                            </ul>
                            <hr>
                            <p>Cor Painel</p>
                            <ul class="choose-skin list-unstyled mb-0">
                                <li data-theme="blue" class="active"><div class="blue"></div></li>
                                <li data-theme="green"><div class="green"></div></li>
                                <li data-theme="orange"><div class="orange"></div></li>
                                <li data-theme="blush"><div class="blush"></div></li>
                                <li data-theme="cyan"><div class="cyan"></div></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        
        
        ';
}

function seo()
{
    echo '
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>SEO</h2>
            </div>
            <div class="body">     
                <form method="post" id="formSeo">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">   
                                <label>Titulo</label>                                            
                                <input type="hidden" class="form-control" name="origem" id="origem" value="atualizaSeo">
                                <input type="hidden" class="form-control" name="idPagina" id="idPagina" value="">
                                <input type="hidden" class="form-control" name="nomePagina" id="nomePagina" value="">
                                <input type="hidden" class="form-control" name="categoriaId" id="categoriaId" value="">
                                <input type="hidden" class="form-control" name="imagemPagina" id="imagemPagina" value="">
                                <input type="text" class="form-control" placeholder="Titulo da página" name="tituloPagina" id="tituloPagina">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">   
                                <label>Url | (não colocar espaço e nenhum tipo de caracter especial)</label>                                            
                                <input type="text" class="form-control" placeholder="Url da página" name="nomePaginaNew" id="nomePaginaNew">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">   
                                <label>Descrição</label>                                            
                                <input type="text" class="form-control" placeholder="Descrição da página" name="descricaoPagina" id="descricaoPagina">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">   
                                <label>Palavras chaves</label>                                            
                                <input type="text" class="form-control" placeholder="Palavras chaves da página" name="palavrasChavesPagina" id="palavrasChavesPagina">
                            </div>
                        </div>                        
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">   
                                <label>Legenda da imagem</label>                                            
                                <input type="text" class="form-control" placeholder="Legenda da imagem da página" name="legendaImagemPagina" id="legendaImagemPagina">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">   
                                <label>Imagem</label>                                            
                                <button class="btn btn-default selecionarImagem" imagem="previewImagemSeo" type="button" target="modalMidia" onClick="AbreModal(this)">Escolher Imagem</button>
                                <img class="img-fluid" id="previewImagemSeo" src="" alt="">
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-seo" onClick="AtualizaSeo()">Atualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>                    
    </div>
    ';
}
