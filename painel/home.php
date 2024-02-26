<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['username'])) {
    header('Location: login');
    exit;
}

include_once 'tema/assets/componentes/componentes.php';
?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Painel de controle do site">

    <link rel="icon" type="image/svg" href="../assets/svg/favicon.svg">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="./tema/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./tema/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./tema/assets/vendor/animate-css/vivify.min.css">
    <link rel="stylesheet" href="./tema/assets/vendor/themify-icons/themify-icons.css">

    <link rel="stylesheet" href="./tema/assets/vendor/c3/c3.min.css" />
    <link rel="stylesheet" href="./tema/assets/vendor/toastr/toastr.min.css">
    <link rel="stylesheet" href="./tema/assets/vendor/jquery-steps/jquery.steps.css">
    <!-- Inclua os estilos do Bootstrap Multiselect -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="./tema/assets/css/site.min.css">

</head>

<body class="theme-blue">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><i class="fa fa-cube font-25"></i></div>
            <p>Carregando...</p>
        </div>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <div id="wrapper">

        <?php temaBar(); ?>

        <div id="main-content">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Dashboard</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
            </div>
        </div>

        <div class="modal fade" id="modalMidia" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Title">Midias</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" target="modalMidia" onClick="FechaModal(this)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modalBodyMidia"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" target="modalMidia" onClick="FechaModal(this)">
                            Fechar
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Javascript -->
    <!-- Latest jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="./tema/assets/vendor/jquery/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap 4x JS  -->
    <script src="./tema/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="./tema/assets/bundles/vendorscripts.bundle.js"></script>

    <script src="./tema/assets/bundles/c3.bundle.js"></script>
    <!-- <script src="./tema/assets/bundles/flotscripts.bundle.js"></script>flot charts Plugin Js  -->
    <script src="./tema/assets/bundles/knob.bundle.js"></script>

    <!-- Project Common JS -->
    <script src="./tema/assets/js/common.js"></script>
    <script src="./tema/assets/js/index.js"></script>

    <script defer src="./tema/assets/vendor/ckeditor/ckeditor.js"></script>
    <script defer src="./tema/assets/vendor/toastr/toastr.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <!-- Inclua o Bootstrap JS -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <!-- Inclua o Bootstrap Multiselect JS -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        window.addEventListener('DOMContentLoaded', function() {

            const nav = document.querySelectorAll('.nav-link');
            const tab = document.querySelectorAll('.tab-pane');
            for (let i = 0; i < nav.length; i++) {
                nav[i].addEventListener('click', function() {
                    const id = nav[i].id;

                    for (let j = 0; j < nav.length; j++) {
                        nav[j].classList.remove('active');
                    }

                    nav[i].classList.add('active');

                    for (let i = 0; i < tab.length; i++) {
                        tab[i].id === id ? tab[i].classList.add('active') : tab[i].classList.remove('active');
                    }
                });
            }

        });

        function Pagina(elemento) {
            const divScripts = document.getElementById('scripts');
            const paginaSelecionada = elemento.getAttribute('pagina');
            const categoriaId = elemento.getAttribute('categoria');
            const nomePagina = elemento.getAttribute('nomePagina');
            $.ajax({
                type: 'POST',
                url: "frontend/pagina-" + paginaSelecionada + "",
                data: {
                    paginaSelecionada: paginaSelecionada,
                    nomePagina: nomePagina,
                    categoriaId: categoriaId,
                    modal: "false",
                    nomeModal: "",
                    inputImagem: "",
                    formConteudo: ""
                },
            }).done(function(data) {
                // Cria um elemento <div> temporário para inserir o HTML retornado pela requisição
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = data;

                // Encontra os scripts retornados no conteúdo
                const scripts = tempDiv.getElementsByTagName('script');
                const scriptsToExecute = [];
                for (let i = 0; i < scripts.length; i++) {
                    const scriptContent = scripts[i].textContent;
                    const scriptSrc = scripts[i].getAttribute('src');

                    if (scriptSrc) {
                        // Se o script tiver atributo src, criamos um novo elemento <script> com o src definido
                        const newScript = document.createElement('script');
                        newScript.setAttribute('src', scriptSrc);
                        scriptsToExecute.push(newScript);
                    } else {
                        // Se o script não tiver atributo src, criamos um novo elemento <script> com o conteúdo interno
                        const newScript = document.createElement('script');
                        newScript.textContent = scriptContent;
                        scriptsToExecute.push(newScript);
                    }
                }

                // Agora que os scripts foram extraídos do conteúdo retornado, atualiza o conteúdo de 'main-content'
                document.getElementById('main-content').innerHTML = tempDiv.innerHTML;

                divScripts.innerHTML = '';

                // Executa os scripts após o conteúdo ser atualizado
                for (const scriptElement of scriptsToExecute) {
                    divScripts.appendChild(scriptElement);
                }
            });
        }

        function AbreModal(elemento) {
            const nomeModal = elemento.getAttribute('target');
            const inputImagem = elemento.getAttribute('imagem');
            const formConteudo = elemento.getAttribute('formConteudo');
            const modal = document.getElementById(nomeModal);
            const divScripts = document.getElementById('scriptsModal');

            document.body.classList.toggle('modal-open');

            $.ajax({
                type: 'POST',
                url: "frontend/pagina-listaMidia.php",
                data: {
                    nomePagina: "",
                    modal: "true",
                    nomeModal: nomeModal,
                    inputImagem: inputImagem,
                    formConteudo: formConteudo
                },
            }).done(function(data) {
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = data;

                const scripts = tempDiv.getElementsByTagName('script');
                const scriptsToExecute = [];
                for (let i = 0; i < scripts.length; i++) {
                    const scriptContent = scripts[i].textContent;
                    const scriptSrc = scripts[i].getAttribute('src');

                    if (scriptSrc) {
                        const newScript = document.createElement('script');
                        newScript.setAttribute('src', scriptSrc);
                        scriptsToExecute.push(newScript);
                    } else {
                        const newScript = document.createElement('script');
                        newScript.textContent = scriptContent;
                        scriptsToExecute.push(newScript);
                    }
                }

                document.getElementById('modalBodyMidia').innerHTML = tempDiv.innerHTML;

                divScripts.innerHTML = '';

                for (const scriptElement of scriptsToExecute) {
                    divScripts.appendChild(scriptElement);
                }

                modal.classList.toggle('show');
            });
        }

        function FechaModal(elemento) {
            const nomeModal = elemento.getAttribute('target');
            const modal = document.getElementById(nomeModal);
            const divScripts = document.getElementById('scriptsModal');

            document.body.classList.toggle('modal-open');

            modal.classList.toggle('show');
            divScripts.innerHTML = '';
        }

        function SelecionarImagem(inputImagem, imagem, nomeModal, formConteudo) {

            let input = "";

            if (formConteudo) {
                const formulario = $("#form-" + formConteudo);
                input = formulario.find("#" + inputImagem)[0];
            } else {
                input = document.getElementById(inputImagem);
            }

            input.src = "../assets/uploads/" + imagem;

            const modal = document.getElementById(nomeModal);
            document.body.classList.toggle('modal-open');
            modal.classList.toggle('show');
        }

        function mascaraTel(telefone) {
            setTimeout(function() {
                var v = ajustaTel(telefone.value);
                if (v != telefone.value) {
                    telefone.value = v;
                }
            }, 1);
        }

        function ajustaTel(v) {
            var r = v.replace(/\D/g, "");
            r = r.replace(/^0/, "");
            if (r.length > 10) {
                r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
            } else if (r.length > 5) {
                r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
            } else if (r.length > 2) {
                r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
            } else {
                r = r.replace(/^(\d*)/, "($1");
            }
            return r;
        }

        function AtualizaSeo() {
            const formSeo = $("#formSeo");
            const botaoAtualiza = formSeo.find("#btn-atualiza-seo")[0];
            const inputFields = formSeo.find("input");
            const input = document.getElementById("previewImagemSeo");
            const imagemPagina = document.getElementById("imagemPagina");
            imagemPagina.value = input.src;

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

                $.ajax({
                    type: "POST",
                    url: "backend/atualiza-conteudo.php",
                    data: $("#formSeo").serialize()
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

        }

        function CarregaSeo(idPagina) {

            $.ajax({
                type: "POST",
                url: "backend/carrega-conteudo.php",
                data: {
                    origem: "seo",
                    idPagina: idPagina
                },
            }).done(function(data) {
                const conteudoPagina = JSON.parse(data);

                $("#idPagina").val(conteudoPagina.idPagina);
                $("#tituloPagina").val(conteudoPagina.tituloPagina);
                $("#nomePaginaNew").val(conteudoPagina.nomePagina);
                $("#nomePagina").val(conteudoPagina.nomePagina);
                $("#categoriaId").val(conteudoPagina.categoriaId);
                $("#descricaoPagina").val(conteudoPagina.descricaoPagina);
                $("#previewImagemSeo")[0].src = conteudoPagina.imagemPagina;
                $("#legendaImagemPagina").val(conteudoPagina.legendaImagemPagina);
                $("#palavrasChavesPagina").val(conteudoPagina.palavrasChavesPagina);

            });
        }

        function ListaConteudo(sequencia) {
            const tabela = $('#tabela-conteudo-' + sequencia).DataTable();
            const listaConteudo = document.getElementById("listaconteudo" + sequencia);
            const divTabela = $("#tabela-" + sequencia);
            const formulario = $("#form-" + sequencia);
            const paginaId = formulario.find("#paginaId").val();
            const btnVolta = $("#btn-volta-conteudo-" + sequencia);
            const btnAdd = $("#btn-adiciona-conteudo-" + sequencia);

            let nomeBlocoTexto = "textoConteudo" + sequencia;

            if (!CKEDITOR.instances[nomeBlocoTexto]) {
                CKEDITOR.replace(nomeBlocoTexto);
            }

            btnVolta.hide();
            formulario.hide();
            divTabela.show();
            btnAdd.show();

            tabela.clear().draw();

            listaConteudo.innerHTML = `
        <span style="display: block; width: 200px; height: 200px;"></span>
        <div class="loader">Carregando
            <span></span>
        </div>
        `;

            $.ajax({
                type: "POST",
                url: "backend/carrega-conteudo.php",
                data: {
                    origem: "listaConteudo",
                    paginaId: paginaId,
                    numeroConteudo: sequencia
                },
            }).done(function(data) {
                const conteudoPagina = JSON.parse(data);

                listaConteudo.innerHTML = "";

                conteudoPagina.forEach(function(conteudo) {

                    const linha = document.createElement("tr");
                    linha.classList.add("bg-cinza");
                    const primeiraLinha = mostrarPrimeiraLinha(conteudo.textoConteudo);

                    let imagem1 = false;
                    let imagem2 = false;

                    if (conteudo.imagem1Conteudo !== null) {
                        imagem1 = conteudo.imagem1Conteudo.endsWith("null") == true ? false : true;
                    }
                    if (conteudo.imagem2Conteudo !== null) {
                        imagem2 = conteudo.imagem2Conteudo.endsWith("null") == true ? false : true;
                    }

                    linha.innerHTML = `
                    ${conteudo.tituloConteudo ? `<td><span class="texto-limitado">${conteudo.tituloConteudo}</span></td>` : ''}
                    ${imagem1 ? `<td><img src="../assets/uploads/${conteudo.imagem1Conteudo}" class="wauto h120 objContain"></td>` : ''}
                    ${imagem2 ? `<td><img src="../assets/uploads/${conteudo.imagem2Conteudo}" class="wauto h120 objContain"></td>` : ''}           
                    <td><span class="texto-limitado">${primeiraLinha}</span></td>
                    <td>
                        <div style="display: flex; justify-content: flex-end;">
                            <button class="btn btn-success btn-sm btn-mostra-conteudo ml-2" id="${conteudo.idConteudo}" onClick="MostraEdicao(this.id,${sequencia})">Editar</button>
                            <button class="btn btn-danger btn-sm btn-deleta-conteudo ml-2" id="${conteudo.idConteudo}" onClick="DeletaConteudo(this.id,${sequencia})">Deletar</button>
                        </div>
                    </td>
                `;

                    tabela.row.add(linha).draw();
                });
                if (conteudoPagina.length == 0) {
                    tabela.clear().draw();
                }

                const limiteCaracteres = 50;

                const textosLimitados = document.querySelectorAll(".texto-limitado");

                textosLimitados.forEach(texto => {
                    if (texto.textContent.length > limiteCaracteres) {
                        const textoTruncado = texto.textContent.substring(0, limiteCaracteres) + "...";
                        texto.textContent = textoTruncado;
                    }
                });

            });
        }

        function MostraCadastro(sequencia) {
            $("#tabela-" + sequencia).hide();
            $("#btn-adiciona-conteudo-" + sequencia).hide();
            $("#form-" + sequencia).find("#btn-atualiza-conteudo-" + sequencia).hide();

            $("#form-" + sequencia).show();
            $("#btn-volta-conteudo-" + sequencia).show();
            $("#form-" + sequencia).find("#btn-cadastra-conteudo-" + sequencia).show();
        }

        function MostraEdicao(id, sequencia) {
            $("#tabela-" + sequencia).hide();
            $("#btn-adiciona-conteudo-" + sequencia).hide();
            $("#form-" + sequencia).find("#btn-cadastra-conteudo-" + sequencia).hide();

            $("#form-" + sequencia).show();
            $("#btn-volta-conteudo-" + sequencia).show();
            $("#form-" + sequencia).find("#btn-atualiza-conteudo-" + sequencia).show();

            $("#form-" + sequencia).find("#idConteudo")[0].value = id;

            CarregaConteudo(sequencia);
        }

        function CarregaConteudo(sequencia) {

            const formulario = $("#form-" + sequencia);
            const idConteudo = formulario.find("#idConteudo")[0];
            const paginaId = formulario.find("#paginaId")[0];
            const numeroConteudo = formulario.find("#numeroConteudo")[0];
            const tituloConteudo = formulario.find("#tituloConteudo")[0];
            const imagem1Conteudo = formulario.find("#imagem1Conteudo")[0];
            const imagem2Conteudo = formulario.find("#imagem2Conteudo")[0];
            const imagem3Conteudo = formulario.find("#imagem3Conteudo")[0];
            const imagem4Conteudo = formulario.find("#imagem4Conteudo")[0];
            const legendaImagem1Conteudo = formulario.find("#legendaImagem1Conteudo")[0];
            const legendaImagem2Conteudo = formulario.find("#legendaImagem2Conteudo")[0];
            const legendaImagem3Conteudo = formulario.find("#legendaImagem3Conteudo")[0];
            const legendaImagem4Conteudo = formulario.find("#legendaImagem4Conteudo")[0];
            const linkVideoConteudo = formulario.find("#linkVideoConteudo")[0];
            const nomeBotao1 = formulario.find("#nomeBotao1")[0];
            const linkBotao1 = formulario.find("#linkBotao1")[0];
            const targetBotao1 = formulario.find("#targetBotao1")[0];
            const nomeBotao2 = formulario.find("#nomeBotao2")[0];
            const linkBotao2 = formulario.find("#linkBotao2")[0];
            const targetBotao2 = formulario.find("#targetBotao2")[0];

            let nomeBlocoTexto = "textoConteudo" + sequencia;

            if (!CKEDITOR.instances[nomeBlocoTexto]) {
                CKEDITOR.replace(nomeBlocoTexto);
            }

            const editor = CKEDITOR.instances[nomeBlocoTexto];

            if (idConteudo.value == "0" || idConteudo.value == "") {

                editor.on('instanceReady', function() {
                    $.ajax({
                        type: "POST",
                        url: "backend/carrega-conteudo.php",
                        data: {
                            origem: "carregaConteudo",
                            idConteudo: idConteudo.value,
                            paginaId: paginaId.value,
                            numeroConteudo: numeroConteudo.value
                        }
                    }).done(function(data) {

                        const conteudoPagina = JSON.parse(data);

                        editor.setData(conteudoPagina.textoConteudo);

                        idConteudo.value = conteudoPagina.idConteudo;
                        tituloConteudo.value = conteudoPagina.tituloConteudo;
                        legendaImagem1Conteudo.value = conteudoPagina.legendaImagem1Conteudo;
                        legendaImagem2Conteudo.value = conteudoPagina.legendaImagem2Conteudo;
                        legendaImagem3Conteudo.value = conteudoPagina.legendaImagem3Conteudo;
                        legendaImagem4Conteudo.value = conteudoPagina.legendaImagem4Conteudo;
                        linkVideoConteudo.value = conteudoPagina.linkVideoConteudo;
                        nomeBotao1.value = conteudoPagina.nomeBotao1;
                        linkBotao1.value = conteudoPagina.linkBotao1;
                        targetBotao1.value = conteudoPagina.targetBotao1;
                        nomeBotao2.value = conteudoPagina.nomeBotao2;
                        linkBotao2.value = conteudoPagina.linkBotao2;
                        targetBotao2.value = conteudoPagina.targetBotao2;

                        imagem1Conteudo.src = "../assets/uploads/" + conteudoPagina.imagem1Conteudo;
                        imagem2Conteudo.src = "../assets/uploads/" + conteudoPagina.imagem2Conteudo;
                        imagem3Conteudo.src = "../assets/uploads/" + conteudoPagina.imagem3Conteudo;
                        imagem4Conteudo.src = "../assets/uploads/" + conteudoPagina.imagem4Conteudo;
                    });
                });

            } else {

                $.ajax({
                    type: "POST",
                    url: "backend/carrega-conteudo.php",
                    data: {
                        origem: "carregaConteudo",
                        idConteudo: idConteudo.value,
                        paginaId: paginaId.value,
                        numeroConteudo: numeroConteudo.value
                    }
                }).done(function(data) {

                    const conteudoPagina = JSON.parse(data);

                    editor.setData(conteudoPagina.textoConteudo);

                    idConteudo.value = conteudoPagina.idConteudo;
                    tituloConteudo.value = conteudoPagina.tituloConteudo;
                    legendaImagem1Conteudo.value = conteudoPagina.legendaImagem1Conteudo;
                    legendaImagem2Conteudo.value = conteudoPagina.legendaImagem2Conteudo;
                    legendaImagem3Conteudo.value = conteudoPagina.legendaImagem3Conteudo;
                    legendaImagem4Conteudo.value = conteudoPagina.legendaImagem4Conteudo;
                    linkVideoConteudo.value = conteudoPagina.linkVideoConteudo;
                    nomeBotao1.value = conteudoPagina.nomeBotao1;
                    linkBotao1.value = conteudoPagina.linkBotao1;
                    targetBotao1.value = conteudoPagina.targetBotao1;
                    nomeBotao2.value = conteudoPagina.nomeBotao2;
                    linkBotao2.value = conteudoPagina.linkBotao2;
                    targetBotao2.value = conteudoPagina.targetBotao2;

                    imagem1Conteudo.src = "../assets/uploads/" + conteudoPagina.imagem1Conteudo;
                    imagem2Conteudo.src = "../assets/uploads/" + conteudoPagina.imagem2Conteudo;
                    imagem3Conteudo.src = "../assets/uploads/" + conteudoPagina.imagem3Conteudo;
                    imagem4Conteudo.src = "../assets/uploads/" + conteudoPagina.imagem4Conteudo;
                });

            }

        }

        function CadastraConteudo(sequencia) {
            const formulario = $("#form-" + sequencia);
            const paginaId = formulario.find("#paginaId")[0];
            const numeroConteudo = formulario.find("#numeroConteudo")[0];
            const tituloConteudo = formulario.find("#tituloConteudo")[0];
            const imagem1Conteudo = formulario.find("#imagem1Conteudo")[0];
            const imagem2Conteudo = formulario.find("#imagem2Conteudo")[0];
            const imagem3Conteudo = formulario.find("#imagem3Conteudo")[0];
            const imagem4Conteudo = formulario.find("#imagem4Conteudo")[0];
            const legendaImagem1Conteudo = formulario.find("#legendaImagem1Conteudo")[0];
            const legendaImagem2Conteudo = formulario.find("#legendaImagem2Conteudo")[0];
            const legendaImagem3Conteudo = formulario.find("#legendaImagem3Conteudo")[0];
            const legendaImagem4Conteudo = formulario.find("#legendaImagem4Conteudo")[0];
            const linkVideoConteudo = formulario.find("#linkVideoConteudo")[0];
            const nomeBotao1 = formulario.find("#nomeBotao1")[0];
            const linkBotao1 = formulario.find("#linkBotao1")[0];
            const targetBotao1 = formulario.find("#targetBotao1")[0];
            const nomeBotao2 = formulario.find("#nomeBotao2")[0];
            const linkBotao2 = formulario.find("#linkBotao2")[0];
            const targetBotao2 = formulario.find("#targetBotao2")[0];

            const botaoCadastra = formulario.find("#btn-cadastra-conteudo-" + sequencia)[0];

            let nomeBlocoTexto = "textoConteudo" + sequencia;

            const editor = CKEDITOR.instances[nomeBlocoTexto];

            const textoConteudo = editor.getData();

            const srcImagem1Conteudo = obterUltimoSegmentoDaURL(imagem1Conteudo.src);
            const srcImagem2Conteudo = obterUltimoSegmentoDaURL(imagem2Conteudo.src);
            const srcImagem3Conteudo = obterUltimoSegmentoDaURL(imagem3Conteudo.src);
            const srcImagem4Conteudo = obterUltimoSegmentoDaURL(imagem4Conteudo.src);

            const formData = new FormData();
            formData.append("origem", "cadastraConteudo");
            formData.append("paginaId", paginaId.value);
            formData.append("numeroConteudo", numeroConteudo.value);
            formData.append("tituloConteudo", tituloConteudo.value);
            formData.append("imagem1Conteudo", srcImagem1Conteudo);
            formData.append("imagem2Conteudo", srcImagem2Conteudo);
            formData.append("imagem3Conteudo", srcImagem3Conteudo);
            formData.append("imagem4Conteudo", srcImagem4Conteudo);
            formData.append("legendaImagem1Conteudo", legendaImagem1Conteudo.value);
            formData.append("legendaImagem2Conteudo", legendaImagem2Conteudo.value);
            formData.append("legendaImagem3Conteudo", legendaImagem3Conteudo.value);
            formData.append("legendaImagem4Conteudo", legendaImagem4Conteudo.value);
            formData.append("linkVideoConteudo", linkVideoConteudo.value);
            formData.append("textoConteudo", textoConteudo);
            formData.append("nomeBotao1", nomeBotao1.value);
            formData.append("linkBotao1", linkBotao1.value);
            formData.append("targetBotao1", targetBotao1.value);
            formData.append("nomeBotao2", nomeBotao2.value);
            formData.append("linkBotao2", linkBotao2.value);
            formData.append("targetBotao2", targetBotao2.value);

            botaoCadastra.innerHTML = "<i class='fa fa-spinner fa-spin'></i> <span>Carregando...</span>";

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
                    formulario[0].reset();
                    imagem1Conteudo.src = "null";
                    imagem2Conteudo.src = "null";
                    imagem3Conteudo.src = "null";
                    imagem4Conteudo.src = "null";
                } else {
                    toastr["error"]("Falha ao cadastrar!");
                }

            });
        }

        function AtualizaConteudo(sequencia) {
            const formulario = $("#form-" + sequencia);
            const idConteudo = formulario.find("#idConteudo")[0];
            const paginaId = formulario.find("#paginaId")[0];
            const numeroConteudo = formulario.find("#numeroConteudo")[0];
            const tituloConteudo = formulario.find("#tituloConteudo")[0];
            const imagem1Conteudo = formulario.find("#imagem1Conteudo")[0];
            const imagem2Conteudo = formulario.find("#imagem2Conteudo")[0];
            const imagem3Conteudo = formulario.find("#imagem3Conteudo")[0];
            const imagem4Conteudo = formulario.find("#imagem4Conteudo")[0];
            const legendaImagem1Conteudo = formulario.find("#legendaImagem1Conteudo")[0];
            const legendaImagem2Conteudo = formulario.find("#legendaImagem2Conteudo")[0];
            const legendaImagem3Conteudo = formulario.find("#legendaImagem3Conteudo")[0];
            const legendaImagem4Conteudo = formulario.find("#legendaImagem4Conteudo")[0];
            const linkVideoConteudo = formulario.find("#linkVideoConteudo")[0];
            const nomeBotao1 = formulario.find("#nomeBotao1")[0];
            const linkBotao1 = formulario.find("#linkBotao1")[0];
            const targetBotao1 = formulario.find("#targetBotao1")[0];
            const nomeBotao2 = formulario.find("#nomeBotao2")[0];
            const linkBotao2 = formulario.find("#linkBotao2")[0];
            const targetBotao2 = formulario.find("#targetBotao2")[0];

            const botaoAtualiza = formulario.find("#btn-atualiza-conteudo-" + sequencia)[0];

            let nomeBlocoTexto = "textoConteudo" + sequencia;

            const editor = CKEDITOR.instances[nomeBlocoTexto];

            const textoConteudo = editor.getData();

            const srcImagem1Conteudo = obterUltimoSegmentoDaURL(imagem1Conteudo.src);
            const srcImagem2Conteudo = obterUltimoSegmentoDaURL(imagem2Conteudo.src);
            const srcImagem3Conteudo = obterUltimoSegmentoDaURL(imagem3Conteudo.src);
            const srcImagem4Conteudo = obterUltimoSegmentoDaURL(imagem4Conteudo.src);

            const formData = new FormData();
            formData.append("origem", "atualizaConteudo");
            formData.append("idConteudo", idConteudo.value);
            formData.append("paginaId", paginaId.value);
            formData.append("numeroConteudo", numeroConteudo.value);
            formData.append("tituloConteudo", tituloConteudo.value);
            formData.append("imagem1Conteudo", srcImagem1Conteudo);
            formData.append("imagem2Conteudo", srcImagem2Conteudo);
            formData.append("imagem3Conteudo", srcImagem3Conteudo);
            formData.append("imagem4Conteudo", srcImagem4Conteudo);
            formData.append("legendaImagem1Conteudo", legendaImagem1Conteudo.value);
            formData.append("legendaImagem2Conteudo", legendaImagem2Conteudo.value);
            formData.append("legendaImagem3Conteudo", legendaImagem3Conteudo.value);
            formData.append("legendaImagem4Conteudo", legendaImagem4Conteudo.value);
            formData.append("linkVideoConteudo", linkVideoConteudo.value);
            formData.append("textoConteudo", textoConteudo);
            formData.append("nomeBotao1", nomeBotao1.value);
            formData.append("linkBotao1", linkBotao1.value);
            formData.append("targetBotao1", targetBotao1.value);
            formData.append("nomeBotao2", nomeBotao2.value);
            formData.append("linkBotao2", linkBotao2.value);
            formData.append("targetBotao2", targetBotao2.value);

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

        function DeletaConteudo(id, sequencia) {

            const formData = new FormData();
            formData.append("origem", "deletaConteudo");
            formData.append("idConteudo", id);

            $.ajax({
                type: "POST",
                url: "backend/deleta-conteudo.php",
                data: formData,
                contentType: false, // Importante: não defina o tipo de conteúdo
                processData: false, // Importante: não processar os dados
            }).done(function(data) {

                toastr.options.timeOut = "2000";

                if (data) {
                    toastr["success"]("Deletado com sucesso!");
                    ListaConteudo(sequencia);
                } else {
                    toastr["error"]("Falha ao deletar!");
                }

            });
        }

        function mostrarPrimeiraLinha(texto) {
            if (texto) {
                const posicaoQuebraLinha = texto.indexOf('\n');
                const posicaoFinalTexto = texto.length;

                const primeiraLinha = texto.substring(0, posicaoQuebraLinha !== -1 ? posicaoQuebraLinha : posicaoFinalTexto);

                const primeiraLinhaComSuspensao = primeiraLinha + (posicaoQuebraLinha !== -1 ? "..." : "");

                return primeiraLinhaComSuspensao;
            } else {
                return "*nenhum conteudo escrito*";
            }
        }

        function obterUltimoSegmentoDaURL(url) {
            // Divide a URL usando "/" como delimitador e pega o último elemento do array resultante
            var partes = url.split("/");
            var ultimoSegmento = partes[partes.length - 1];
            return ultimoSegmento;
        }

        function CarregaFormulario(sequencia) {

            const formulario = $("#formEmail" + sequencia);
            const idFormulario = formulario.find("#idFormulario")[0];
            const paginaId = formulario.find("#paginaId")[0];
            const descricaoFormulario = formulario.find("#descricaoFormulario")[0];
            const emailFormulario = formulario.find("#emailFormulario")[0];
            const select1Formulario = formulario.find("#select1Formulario")[0];
            const select2Formulario = formulario.find("#select2Formulario")[0];
            const select3Formulario = formulario.find("#select3Formulario")[0];
            const select4Formulario = formulario.find("#select4Formulario")[0];
            const select5Formulario = formulario.find("#select5Formulario")[0];
            const select6Formulario = formulario.find("#select6Formulario")[0];

            console.log(formulario);

            $.ajax({
                type: "POST",
                url: "backend/carrega-conteudo.php",
                data: {
                    origem: "carregaFormulario",
                    idFormulario: idFormulario.value,
                    paginaId: paginaId.value,
                    descricaoFormulario: descricaoFormulario.value
                }
            }).done(function(data) {

                const conteudoPagina = JSON.parse(data);

                console.log(conteudoPagina);

                idFormulario.value = conteudoPagina.idFormulario;
                descricaoFormulario.value = conteudoPagina.descricaoFormulario;
                emailFormulario.value = conteudoPagina.emailFormulario;
                select1Formulario.value = conteudoPagina.select1Formulario;
                select2Formulario.value = conteudoPagina.select2Formulario;
                select3Formulario.value = conteudoPagina.select3Formulario;
                select4Formulario.value = conteudoPagina.select4Formulario;
                select5Formulario.value = conteudoPagina.select5Formulario;
                select6Formulario.value = conteudoPagina.select6Formulario;
            });
        }

        function AtualizaFormulario(sequencia) {
            const formulario = $("#formEmail" + sequencia);
            const idFormulario = formulario.find("#idFormulario")[0];
            const paginaId = formulario.find("#paginaId")[0];
            const descricaoFormulario = formulario.find("#descricaoFormulario")[0];
            const emailFormulario = formulario.find("#emailFormulario")[0];
            const select1Formulario = formulario.find("#select1Formulario")[0];
            const select2Formulario = formulario.find("#select2Formulario")[0];
            const select3Formulario = formulario.find("#select3Formulario")[0];
            const select4Formulario = formulario.find("#select4Formulario")[0];
            const select5Formulario = formulario.find("#select5Formulario")[0];
            const select6Formulario = formulario.find("#select6Formulario")[0];

            const botaoAtualiza = formulario.find("#btn-atualiza-formulario-" + sequencia)[0];

            const formData = new FormData();
            formData.append("origem", "atualizaFormulario");
            formData.append("idFormulario", idFormulario.value);
            formData.append("paginaId", paginaId.value);
            formData.append("descricaoFormulario", descricaoFormulario.value);
            formData.append("emailFormulario", emailFormulario.value);
            formData.append("select1Formulario", select1Formulario.value);
            formData.append("select2Formulario", select2Formulario.value);
            formData.append("select3Formulario", select3Formulario.value);
            formData.append("select4Formulario", select4Formulario.value);
            formData.append("select5Formulario", select5Formulario.value);
            formData.append("select6Formulario", select6Formulario.value);

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

    <div id="scripts"></div>
    <div id="scriptsModal"></div>

</body>

</html>