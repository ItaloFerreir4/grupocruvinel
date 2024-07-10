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
            <button type="button" class="btn btn-info mb-2 btn-volta" style="float: right;" id="btn-volta" onClick="ListaUsuarios(0)"><span class="sr-only">Voltar</span> <i class="fa fa-reply"></i></button>
            <button class="btn btn-primary" style="float: right;" type="button" id="btn-adiciona" onClick="MostrarCadastroUsuarios()">Adicionar</button>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="body">
                    <div id="tabela-Usuarios">
                        <div class="table-responsive">
                            <table class="table table-hover table-custom spacing5" id="tabela-usuarios-1">
                                <thead>
                                    <th>Usuario</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody class="relative" id="listaUsuarios">
                                </tbody>
                            </table>
                        </div>
                        <div class="btn-group mt-2" id="pagination"></div>
                    </div>
                    <form method="post" id="formUsuarios">
                        <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" value="0">
                        <div class="row clearfix">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="emailUsuario" name="emailUsuario">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Senha</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="senhaUsuario" name="senhaUsuario">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success btn-atualiza" type="button" id="btn-atualiza-user" onClick="AtualizaUser()">Atualizar</button>
                                <button class="btn btn-success btn-cadastra" type="button" id="btn-cadastra-user" onClick="CadastraUsuarios()">Cadastrar</button>
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
        $("#formUsuarios").hide();
        $("#btn-volta").hide();

        ListaUsuarios(0);
    });
</script>

<script defer>
    function ListaUsuarios(pag) {
        $("#formUsuarios").hide();
        $("#btn-volta").hide();
        $("#btn-adiciona").show();
        $("#tabela-Usuarios").show();

        const tabela1 = $('#tabela-usuarios-1').DataTable();
        const lista = document.getElementById("listaUsuarios");

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
                origem: "listaUsuarios",
                pag: pag
            },
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);
            conteudoPagina.forEach(function(pagina) {

                const linha = document.createElement("tr");
                linha.classList.add("bg-cinza");

                linha.innerHTML = `
                        <td class="200">${pagina.nomeUsuario}</td>
                        <td>
                            <div style="display: flex; justify-content: flex-end;">
                                <button class="btn btn-success btn-sm ml-2" id="${pagina.idUsuario}" onClick="MostrarEdicaoUser(this.id)">Editar</button>
                                <button class="btn btn-danger btn-sm ml-2" id="${pagina.idUsuario}" onClick="DeletaUsuarios(this.id)">Deletar</button>
                            </div>
                        </td>
                    `;

                tabela1.row.add(linha).draw();
            });
            if (conteudoPagina.length == 0) {
                tabela1.clear().draw();
            }

        });
    }

    function MostrarCadastroUsuarios() {
        $("#tabela-Usuarios").hide();
        $("#btn-adiciona").hide();
        $("#formUsuarios").show();
        $("#btn-volta").show();
        
        $("#btn-cadastra-user").show();
        $("#btn-atualiza-user").hide();
    }

    function CadastraUsuarios() {
        const formUsuarios = $("#formUsuarios");
        const botaoCadastra = formUsuarios.find("#btn-cadastra-user")[0];
        const inputFields = formUsuarios.find("input");

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

            const nomeUsuario = formUsuarios.find("#nomeUsuario")[0];
            const emailUsuario = formUsuarios.find("#emailUsuario")[0];
            const senhaUsuario = formUsuarios.find("#senhaUsuario")[0];

            $.ajax({
                type: "POST",
                url: "backend/cadastro-conteudo.php",
                data: {
                    origem: "cadastraUsuarios",
                    nomeUsuario: nomeUsuario.value,
                    emailUsuario: emailUsuario.value,
                    senhaUsuario: senhaUsuario.value
                }
            }).done(function(data) {

                toastr.options.timeOut = "2000";

                botaoCadastra.innerHTML = "Cadastrar";

                if (data) {
                    toastr["success"]("Cadastrado com sucesso!");
                    formUsuarios[0].reset();
                } else {
                    toastr["error"]("Falha ao cadastrar!");
                }


            });

        }
    }

    function DeletaUsuarios(id) {
        $.ajax({
            type: "POST",
            url: "backend/deleta-conteudo.php",
            data: {
                origem: "deletaUsuarios",
                idUsuario: id
            },
        }).done(function(data) {

            toastr.options.timeOut = "2000";

            if (data) {
                toastr["success"]("Deletado com sucesso!");
                ListaUsuarios(0);
            } else {
                toastr["error"]("Falha ao deletar!");
            }

        });
    }

    function MostrarEdicaoUser(idUser) {
        $("#tabela-Usuarios").hide();
        $("#btn-adiciona").hide();
        $("#formUsuarios").show();
        $("#btn-volta").show();
        
        $("#btn-cadastra-user").hide();
        $("#btn-atualiza-user").show();

        const formulario = $("#formUsuarios");
        const idUsuario = formulario.find("#idUsuario")[0];
        const nomeUsuario = formulario.find("#nomeUsuario")[0];
        const emailUsuario = formulario.find("#emailUsuario")[0];
        const senhaUsuario = formulario.find("#senhaUsuario")[0];

        $.ajax({
            type: "POST",
            url: "backend/carrega-conteudo.php",
            data: {
                origem: "carregaUser",
                idUsuario: idUser,
            }
        }).done(function(data) {

            const conteudoPagina = JSON.parse(data);

            idUsuario.value = conteudoPagina.idUsuario;
            nomeUsuario.value = conteudoPagina.nomeUsuario;
            emailUsuario.value = conteudoPagina.emailUsuario;
            senhaUsuario.value = conteudoPagina.senhaUsuario;
        });
    }

    function AtualizaUser() {
        const formulario = $("#formUsuarios");
        const idUsuario = formulario.find("#idUsuario")[0];
        const nomeUsuario = formulario.find("#nomeUsuario")[0];
        const emailUsuario = formulario.find("#emailUsuario")[0];
        const senhaUsuario = formulario.find("#senhaUsuario")[0];
        const botaoAtualiza = formulario.find("#btn-atualiza-user")[0];

        const formData = new FormData();
        formData.append("origem", "atualizaUsuario");
        formData.append("idUsuario", idUsuario.value);
        formData.append("nomeUsuario", nomeUsuario.value);
        formData.append("emailUsuario", emailUsuario.value);
        formData.append("senhaUsuario", senhaUsuario.value);

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
                toastr["error"]("Falha ao atualizar!");
            }
        });
    }
</script>
<?php
'';
?>