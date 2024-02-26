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
            echo '<h2>' . $_POST["nomePagina"] . '</h2>';
            ?>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-info mb-2 btn-volta" style="float: right;" id="btn-volta-midia" onClick="ListaImagens(0)"><span class="sr-only">Voltar</span> <i class="fa fa-reply"></i></button>
            <button class="btn btn-primary" style="float: right;" type="button" id="btn-adiciona-midia" onClick="MostrarCadastroImagem()">Adicionar</button>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="body">
                    <div id="tabela-imagens">
                        <div class="table-responsive">
                            <table class="table table-hover table-custom spacing5" id="tabela-midia">
                                <thead>
                                    <th>Imagem</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody class="relative" id="lista">
                                </tbody>
                            </table>
                        </div>
                        <div class="btn-group mt-2" id="pagination"></div>
                    </div>
                    <form method="post" id="formImagem">
                        <div class="row clearfix">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="inputImagem" name="inputImagem" onchange="PreviewImagem(this,'previewImagem')">
                                    </div>
                                    <img class="img-fluid" id="previewImagem" src="vazio.png" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success btn-cadastra" type="button" id="btn-cadastra-imagem" onClick="CadastraImagem()">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script defer src="./tema/assets/vendor/toastr/toastr.js"></script>

<script>
    $(document).unbind("click").ready(function() {
        $("#formImagem").hide();
        $("#btn-volta-midia").hide();

        ListaImagens(0);
    });
</script>

<script>
    function ListaImagens(pag) {
        const tabela1 = $('#tabela-midia').DataTable();

        $("#formImagem").hide();
        $("#btn-volta-midia").hide();
        $("#btn-adiciona-midia").show();
        $("#tabela-imagens").show();

        const lista = document.getElementById("lista");

        tabela1.clear().draw();

        lista.innerHTML = `
            <span style="display: block; width: 200px; height: 200px;"></span>
            <div class="loader">Carregando
                <span></span>
            </div>
            `;

        $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "listaImagens",
                pag: pag
            },
        }).done(function(data) {

            const modal = '<?php echo $_POST["modal"] ?>';
            const nomeModal = '<?php echo $_POST["nomeModal"] ?>';
            const inputImagem = '<?php echo $_POST["inputImagem"] ?>';
            const formConteudo = '<?php echo $_POST["formConteudo"] ?>';

            const conteudoPagina = JSON.parse(data);
            const conteudoLista = document.createElement("span");
            conteudoPagina.paginas.forEach(function(pagina) {

                const linha = document.createElement("tr");
                linha.classList.add("bg-cinza");
                //Voltar depois para <td class="200"><img class="w200" src="../assets/uploads/${pagina.imagem}" alt=""></td>
                linha.innerHTML = `
                            <td class="200"><img class="w200" src="../assets/uploads/${pagina.imagem}" alt=""></td>
                            <td>
                            <div style="display: flex; justify-content: flex-end;">
                                ${modal === "true" ? `<button class="btn btn-primary btn-sm btn-seleciona-imagem ml-2" id="${pagina.idImagem}" onClick="SelecionarImagem('${inputImagem}', '${pagina.imagem}', '${nomeModal}', '${formConteudo}')">Selecionar</button>` : ''}
                                <button class="btn btn-danger btn-sm btn-deleta-imagem ml-2" id="${pagina.idImagem}" onClick="DeletaImagem(this.id)">Deletar</button>
                            </div>
                        </td>
                    `;

                tabela1.row.add(linha).draw();
            });
            if (conteudoPagina.paginas.length == 0) {
                tabela1.clear().draw();
            }

        });
    }

    function PreviewImagem(elemento, idImg) {
        const file = elemento.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const previewImage = document.getElementById(idImg);

                previewImage.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    }

    function MostrarCadastroImagem() {
        $("#tabela-imagens").hide();
        $("#btn-adiciona-midia").hide();
        $("#formImagem").show();
        $("#btn-volta-midia").show();
    }

    function CadastraImagem() {
        const formImagem = $("#formImagem");
        const botaoCadastra = formImagem.find("#btn-cadastra-imagem")[0];
        const inputFields = formImagem.find("input");

        let hasEmptyField = false;

        inputFields.each(function() {
            const fieldValue = $(this).val().trim();

            $(this).removeClass("parsley-error");

            if (fieldValue === "" || fieldValue === " ") {
                hasEmptyField = true;
                $(this).addClass("parsley-error");
            }
        });

        if (hasEmptyField) {

            toastr.options.timeOut = "2000";
            toastr["error"]("Campos vazios!");

        } else {

            botaoCadastra.innerHTML = "<i class='fa fa-spinner fa-spin'></i> <span>Carregando...</span>";

            const arquivoImagem = formImagem.find("#inputImagem")[0].files[0];
            const previewImagem = formImagem.find("#previewImagem")[0];

            console.log(arquivoImagem);

            const formData = new FormData();
            formData.append("origem", "cadastraImagem");
            formData.append("arquivoImagem", arquivoImagem);

            $.ajax({
                type: "POST",
                url: "backend/cadastro-conteudo.php",
                data: formData,
                contentType: false, // Importante: não defina o tipo de conteúdo
                processData: false, // Importante: não processar os dados
            }).done(function(data) {

                toastr.options.timeOut = "2000";

                botaoCadastra.innerHTML = "Cadastrar";

                if (data) {
                    toastr["success"]("Cadastrado com sucesso!");
                    formImagem[0].reset();
                    previewImagem.src = ""
                } else {
                    toastr["error"]("Falha ao cadastrar!");
                }

            });

        }
    }

    function DeletaImagem(id) {
        $.ajax({
            type: "POST",
            url: "backend/deleta-conteudo.php",
            data: {
                origem: "deletaImagem",
                idImagem: id
            },
        }).done(function(data) {

            toastr.options.timeOut = "2000";

            if (data) {
                toastr["success"]("Deletado com sucesso!");
                ListaImagens(0);
            } else {
                toastr["error"]("Falha ao deletar!");
            }

        });
    }
</script>
<?php
'';
?>