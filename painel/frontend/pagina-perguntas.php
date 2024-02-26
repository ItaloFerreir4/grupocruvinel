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
            <button type="button" class="btn btn-info mb-2 btn-volta" style="float: right;" id="btn-volta" onClick="ListaPerguntas()"><span class="sr-only">Voltar</span> <i class="fa fa-reply"></i></button>
            <button class="btn btn-primary" style="float: right;" type="button" id="btn-adiciona" onClick="MostrarCadastroPerguntas()">Adicionar</button>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="body">
                    <div id="tabela-perguntas">
                        <div class="table-responsive">
                            <table class="table table-hover table-custom spacing5" id="tabela-perguntas-1">
                                <thead>
                                    <th>Pagina</th>
                                    <th>Titulo Pergunta</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody class="relative" id="listaPerguntas">
                                </tbody>
                            </table>
                        </div>
                        <div class="btn-group mt-2" id="pagination"></div>
                    </div>
                    <form method="post" id="formPergunta">
                        <div class="row clearfix">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <div class="input-group">
                                        <input type="hidden" class="form-control" id="idPergunta" name="idPergunta">
                                        <input type="text" class="form-control" id="tituloPergunta" name="tituloPergunta">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Pagina</label>
                                    <div class="input-group">
                                        <select class="form-control" id="paginaId" name="paginaId"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Texto</label>
                                    <textarea class="form-control" id="textoPergunta" name="textoPergunta" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success btn-cadastra" type="button" id="btn-cadastra-pergunta" onClick="CadastraPergunta()">Cadastrar</button>
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-pergunta" onClick="AtualizaPergunta()">Atualizar</button>
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
    $(document).unbind("click").ready(function() {
        $("#formPergunta").hide();
        $("#btn-volta").hide();
        ListaPaginas();
        ListaPerguntas();

        let nomeBlocoTexto = "textoPergunta";

        if (!CKEDITOR.instances[nomeBlocoTexto]) {
            CKEDITOR.replace(nomeBlocoTexto);
        }

        const editor = CKEDITOR.instances[nomeBlocoTexto];
    });
</script>

<script defer>
    function ListaPerguntas() {
        $("#formPergunta").hide();
        $("#btn-volta").hide();
        $("#btn-adiciona").show();
        $("#tabela-perguntas").show();

        const tabela1 = $('#tabela-perguntas-1').DataTable();
        const lista = document.getElementById("listaPerguntas");

        lista.innerHTML = `
            <span style="display: block; width: 200px; height: 200px;"></span>
            <div class="loader">Carregando
                <span></span>
            </div>
            `;

        tabela1.clear().draw();

        $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "listaPerguntas"
            },
        }).done(function(data) {
            if(data){
                const conteudoPagina = JSON.parse(data);
                conteudoPagina.forEach(function(pagina) {
    
                    const linha = document.createElement("tr");
                    linha.classList.add("bg-cinza");
    
                    linha.innerHTML = `
                            <td class="200">${pagina.nomePagina}</td>
                            <td class="200">${pagina.tituloPergunta}</td>
                            <td>
                                <div style="display: flex; justify-content: flex-end;">
                                    <button class="btn btn-success btn-sm btn-edita ml-2" id="${pagina.idPergunta}" onClick="EditaPergunta(this.id)">Editar</button>
                                    <button class="btn btn-danger btn-sm btn-deleta ml-2" id="${pagina.idPergunta}" onClick="DeletaPergunta(this.id)">Deletar</button>
                                </div>
                            </td>
                        `;
    
                    tabela1.row.add(linha).draw();
                });
                if (conteudoPagina.length == 0) {
                    tabela1.clear().draw();
                }
            }
            else{
                tabela1.clear().draw();
            }

        });
    }

    function MostrarCadastroPerguntas() {
        $("#tabela-perguntas").hide();
        $("#btn-adiciona").hide();
        $("#btn-atualiza-pergunta").hide();
        $("#btn-cadastra-pergunta").show();
        $("#formPergunta").show();
        $("#btn-volta").show();
    }

    function CadastraPergunta() {
        const formPerguntas = $("#formPergunta");
        const botaoCadastra = formPerguntas.find("#btn-cadastra-pergunta")[0];
        const inputFields = formPerguntas.find("input");

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

            const tituloPergunta = formPerguntas.find("#tituloPergunta")[0];
            const paginaId = formPerguntas.find("#paginaId")[0];

            let nomeBlocoTexto = "textoPergunta";

            if (!CKEDITOR.instances[nomeBlocoTexto]) {
                CKEDITOR.replace(nomeBlocoTexto);
            }

            const editor = CKEDITOR.instances[nomeBlocoTexto];
            const textoPergunta= editor.getData();

            $.ajax({
                type: "POST",
                url: "backend/cadastro-conteudo.php",
                data: {
                    origem: "cadastraPergunta",
                    paginaId: paginaId.value,
                    tituloPergunta: tituloPergunta.value,
                    textoPergunta: textoPergunta,
                }
            }).done(function(data) {

                toastr.options.timeOut = "2000";

                botaoCadastra.innerHTML = "Cadastrar";

                if (data) {
                    toastr["success"]("Cadastrado com sucesso!");
                    formPerguntas[0].reset();
                } else {
                    toastr["error"]("Falha ao cadastrar!");
                }


            });

        }
    }

    function DeletaPergunta(id) {
        $.ajax({
            type: "POST",
            url: "backend/deleta-conteudo.php",
            data: {
                origem: "deletaPergunta",
                idPergunta: id
            },
        }).done(function(data) {

            toastr.options.timeOut = "2000";

            if (data) {
                toastr["success"]("Deletado com sucesso!");
                ListaPerguntas();
            } else {
                toastr["error"]("Falha ao deletar!");
            }

        });
    }

    function EditaPergunta(id) {
        $("#tabela-perguntas").hide();
        $("#btn-adiciona").hide();
        $("#btn-cadastra-pergunta").hide();
        $("#formPergunta").show();
        $("#btn-volta").show();
        $("#btn-atualiza-pergunta").show();

        CarregaPergunta(id);
    }

    function CarregaPergunta(id) {

        const formulario = $("#formPergunta");
        const idPergunta = formulario.find("#idPergunta")[0];
        const paginaId = formulario.find("#paginaId")[0];
        const tituloPergunta = formulario.find("#tituloPergunta")[0];

        let nomeBlocoTexto = "textoPergunta";

        if (!CKEDITOR.instances[nomeBlocoTexto]) {
            CKEDITOR.replace(nomeBlocoTexto);
        }

        const editor = CKEDITOR.instances[nomeBlocoTexto];

        $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "carregaPergunta",
                idPergunta: id
            }
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);

            editor.setData(conteudoPagina.textoPergunta);

            idPergunta.value = conteudoPagina.idPergunta;
            paginaId.value = conteudoPagina.paginaId;
            tituloPergunta.value = conteudoPagina.tituloPergunta;
        });

    }

    function AtualizaPergunta() {
        const formPerguntas = $("#formPergunta");
        const botaoAtualiza = formPerguntas.find("#btn-atualiza-pergunta")[0];
        const inputFields = formPerguntas.find("input");

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

            botaoAtualiza.innerHTML = "<i class='fa fa-spinner fa-spin'></i> <span>Carregando...</span>";

            const idPergunta = formPerguntas.find("#idPergunta")[0];
            const tituloPergunta = formPerguntas.find("#tituloPergunta")[0];
            const paginaId = formPerguntas.find("#paginaId")[0];

            let nomeBlocoTexto = "textoPergunta";

            const editor = CKEDITOR.instances[nomeBlocoTexto];

            const textoPergunta= editor.getData();

            $.ajax({
                type: "POST",
                url: "backend/atualiza-conteudo.php",
                data: {
                    origem: "atualizaPergunta",
                    idPergunta: idPergunta.value,
                    paginaId: paginaId.value,
                    tituloPergunta: tituloPergunta.value,
                    textoPergunta: textoPergunta,
                }
            }).done(function(data) {

                toastr.options.timeOut = "2000";

                botaoAtualiza.innerHTML = "Atualizar";

                if (data) {
                    toastr["success"]("Atualizado com sucesso!");
                } else {
                    toastr["error"]("Falha ao Atualizar!");
                }


            });

        }
    }

    function ListaPaginas() {
        const selectPagina = $("#paginaId");

        selectPagina.empty();

        $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "listaPaginasPerguntas"
            }
        }).done(function(data) {
            if(data){
                const conteudoPagina = JSON.parse(data);
                conteudoPagina.forEach(pagina => {
                    selectPagina.append('<option value="' + pagina.idPagina + '">' + pagina.nomePagina + '</option>')
                });
            }
        });
    }
</script>
<?php
'';
?>