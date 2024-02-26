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
                        <div class="row">
                            <div class="col-6">
                                <h2>Formulario Newsletter</h2>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <form method="post" id="formEmail1">
                            <input type="hidden" class="form-control" id="idFormulario" name="idFormulario" value="">
                            <input type="hidden" class="form-control" id="paginaId" name="paginaId" value="0">
                            <input type="hidden" class="form-control" id="descricaoFormulario" name="descricaoFormulario" value="newsletter">
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

    <script defer>
        $(document).unbind("click").ready(function () {
            CarregaFormulario(1);
        });
    </script>

<?php 
'';
?>