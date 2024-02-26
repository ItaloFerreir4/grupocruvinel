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
                    <div class="header">
                        <h2>Paginas</h2>
                    </div>
                    <div class="body"> 
                        <div class="row clearfix">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">                        
                                    <button class="btn btn-primary" onClick="AtualizarGeral()">Atualizar</button>
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
        function AtualizarGeral(){
            $.ajax({		
                type: "POST",
                url: "backend/atualizar-paginas-geral.php",
                data: {
                    origem: "atualizarGeral"
                }
            }).done(function(data){

                console.log(data);
                
                if (data) {
                    toastr["success"]("Atualização feita com sucesso!");
                } else {
                    toastr["error"]("Erro ao atualizar!");
                }
                
            });
        }
    </script>
<?php 
'';
?>