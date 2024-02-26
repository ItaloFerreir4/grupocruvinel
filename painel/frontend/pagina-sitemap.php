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
        </div>
    </div>

    <script defer src="./tema/assets/vendor/toastr/toastr.js"></script>

    <script defer>
        $(document).unbind("click").ready(function () {
            
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

    </script>
<?php 
'';
?>