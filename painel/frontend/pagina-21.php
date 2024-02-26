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
                    <h2>Categoria</h2>
                </div>
                <div class="body">
                    <form method="post" id="form-categoria">
                        <div class="row clearfix">
                            <input type="hidden" class="form-control" name="paginaId" id="paginaId" value="<?php echo $_POST["idPagina"]; ?>">
                            <input type="hidden" class="form-control" name="tipoCategoria" id="tipoCategoria" value="">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="nomeCategoria" name="nomeCategoria">
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza" onClick="AtualizaCategoria()">Atualizar</button>
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
        CarregaCategoria(<?php echo $_POST["idPagina"]; ?>);
    });
</script>

<script defer>
    function CarregaCategoria(paginaId) {
        const formulario = $("#form-categoria");
        const nomeCategoria = formulario.find("#nomeCategoria")[0];

        formulario.find("#tipoCategoria")[0].value = "2";

        $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "carregaCategoria",
                paginaId: paginaId
            }
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);

            nomeCategoria.value = conteudoPagina.nomeCategoria;
        });

    }

    function AtualizaCategoria() {
        const formulario = $("#form-categoria");
        const paginaId = formulario.find("#paginaId")[0];
        const nomeCategoria = formulario.find("#nomeCategoria")[0];
        const tipoCategoria = formulario.find("#tipoCategoria")[0];

        const botaoAtualiza = formulario.find("#btn-atualiza")[0];

        const formData = new FormData();
        formData.append("origem", "atualizaCategoria");
        formData.append("paginaId", paginaId.value);
        formData.append("nomeCategoria", nomeCategoria.value);
        formData.append("tipoCategoria", tipoCategoria.value);

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