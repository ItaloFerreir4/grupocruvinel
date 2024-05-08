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
                <?php
                    echo '<h2>'.$_POST["nomePagina"].'</h2>';
                ?>
            </div>            
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="body"> 
                        <div class="row clearfix">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">                        
                                    <select class="form-control" name="selectSitemap" id="selectSitemap" onChange="SelecionaAgendamento(this)">
                                        <option value="semanal">Semanal</option>
                                        <option value="mensal">Mensal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">                        
                                    <button class="btn btn-primary" onClick="GerarSitemap()">Gerar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>  
            <div class="col-md-12">
                <div class="card">
                    <div class="body"> 
                        <form class="form-script-head" method="post" id="form-script-head">
                            <div class="row clearfix">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Script Head</label>                                            
                                        <textarea class="form-control" id="scriptHead" name="scriptHead" rows="15"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-script-head" onclick="AtualizaScriptHead()">Atualizar</button>
                                    </div>
                                </div>
                            </div> 
                        </form> 
                    </div>
                </div>                    
            </div>      
            <div class="col-md-12">
                <div class="card">
                    <div class="body"> 
                        <form class="form-script-inibody" method="post" id="form-script-inibody">
                            <div class="row clearfix">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Script Inicio Body</label>                                            
                                        <textarea class="form-control" id="scriptIniBody" name="scriptIniBody" rows="15"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-script-inibody" onclick="AtualizaScriptIniBody()">Atualizar</button>
                                    </div>
                                </div>
                            </div> 
                        </form> 
                    </div>
                </div>                    
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="body"> 
                        <form class="form-script-fimbody" method="post" id="form-script-fimbody">
                            <div class="row clearfix">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Script Fim Body</label>                                            
                                        <textarea class="form-control" id="scriptFimBody" name="scriptFimBody" rows="15"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-script-fimbody" onclick="AtualizaScriptFimBody()">Atualizar</button>
                                    </div>
                                </div>
                            </div> 
                        </form> 
                    </div>
                </div>                    
            </div>      
        </div>
    </div>

    <script defer src="./tema/assets/vendor/toastr/toastr.js"></script>

    <script defer>
        $(document).unbind("click").ready(function () {
            CarregaScriptHead();
            CarregaScriptIniBody();
            CarregaScriptFimBody();
        });
    </script>

    <script defer>  

        function SelecionaAgendamento(select){
            // Obtenha a seleção do usuário
            const frequencia = select.value;

            $.ajax({		
                type: "POST",
                url: "backend/agendamento-sitemap.php",
                data: {
                    frequencia: frequencia
                }
            }).done(function(data){
                
                if (data) {
                    toastr["success"]("Agendamento realizado com sucesso!");
                } else {
                    toastr["success"]("Erro ao agendar!");
                }
                
            });
        }

        function GerarSitemap(){

            $.ajax({		
                type: "POST",
                url: "backend/gerar-sitemap.php",
                data: ''
            }).done(function(data){
                
                if (data) {
                    toastr["success"]("Sitemap gerado com sucesso!");
                } else {
                    toastr["error"]("Erro ao gerar!");
                }
                
            });
        }

        function CarregaScriptHead(){

            const scriptHead = document.getElementById("scriptHead");

            $.ajax({		
                type: "POST",
                url: "backend/carrega-conteudo.php",
                data: { 
                    origem: "carregaScriptHead"
                },
            }).done(function(data){

                const conteudoPagina = JSON.parse(data);

                scriptHead.value = conteudoPagina.script;
                
            });
        }

        function AtualizaScriptHead(){

            const scriptHead = document.getElementById("scriptHead");
            const botaoAtualiza = document.getElementById("btn-atualiza-script-head");

            botaoAtualiza.innerHTML = "<i class='fa fa-spinner fa-spin'></i> <span>Carregando...</span>";

            $.ajax({		
                type: "POST",
                url: "backend/atualiza-conteudo.php",
                data: { 
                    origem: "atualizaScriptHead",
                    script: scriptHead.value
                },
            }).done(function(data){

                toastr.options.timeOut = "2000";

                botaoAtualiza.innerHTML = "Atualizar";

                if (data) {
                    toastr["success"]("Atualizado com sucesso!");
                } else {
                    toastr["error"]("Falha ao atualizar!");                        
                }

            });
        }

        
        function CarregaScriptIniBody(){

            const scriptIniBody = document.getElementById("scriptIniBody");

            $.ajax({		
                type: "POST",
                url: "backend/carrega-conteudo.php",
                data: { 
                    origem: "carregaScriptIniBody"
                },
            }).done(function(data){

                const conteudoPagina = JSON.parse(data);

                scriptIniBody.value = conteudoPagina.script;
                
            });
        }

        function AtualizaScriptIniBody(){

            const scriptIniBody = document.getElementById("scriptIniBody");
            const botaoAtualiza = document.getElementById("btn-atualiza-script-inibody");

            botaoAtualiza.innerHTML = "<i class='fa fa-spinner fa-spin'></i> <span>Carregando...</span>";

            $.ajax({		
                type: "POST",
                url: "backend/atualiza-conteudo.php",
                data: { 
                    origem: "atualizaScriptIniBody",
                    script: scriptIniBody.value
                },
            }).done(function(data){

                toastr.options.timeOut = "2000";

                botaoAtualiza.innerHTML = "Atualizar";

                if (data) {
                    toastr["success"]("Atualizado com sucesso!");
                } else {
                    toastr["error"]("Falha ao atualizar!");                        
                }

            });
        }

        
        function CarregaScriptFimBody(){

            const scriptFimBody = document.getElementById("scriptFimBody");

            $.ajax({		
                type: "POST",
                url: "backend/carrega-conteudo.php",
                data: { 
                    origem: "carregaScriptFimBody"
                },
            }).done(function(data){

                const conteudoPagina = JSON.parse(data);

                scriptFimBody.value = conteudoPagina.script;
                
            });
        }

        function AtualizaScriptFimBody(){

            const scriptFimBody = document.getElementById("scriptFimBody");
            const botaoAtualiza = document.getElementById("btn-atualiza-script-fimbody");

            botaoAtualiza.innerHTML = "<i class='fa fa-spinner fa-spin'></i> <span>Carregando...</span>";

            $.ajax({		
                type: "POST",
                url: "backend/atualiza-conteudo.php",
                data: { 
                    origem: "atualizaScriptFimBody",
                    script: scriptFimBody.value
                },
            }).done(function(data){

                toastr.options.timeOut = "2000";

                botaoAtualiza.innerHTML = "Atualizar";

                if (data) {
                    toastr["success"]("Atualizado com sucesso!");
                } else {
                    toastr["error"]("Falha ao atualizar!");                        
                }

            });
        }

    </script>
<?php 
'';
?>