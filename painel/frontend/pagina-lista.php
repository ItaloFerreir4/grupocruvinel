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
            if ($_POST['categoriaId'] == 0) {
                echo '<h2>Paginas</h2>';
            } else {
                echo '<h2>' . $_POST["nomePagina"] . '</h2>';
            }
            ?>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-info mb-2 btn-volta-pagina" style="float: right;" id="btn-volta-pagina" onClick="ListaPaginas(<?php echo $_POST['categoriaId'] ?>)"><span class="sr-only">Voltar</span> <i class="fa fa-reply"></i></button>
            <?php
            if ($_POST['categoriaId'] != 0) {
                echo '<button class="btn btn-primary" style="float: right;" type="button" id="btn-adiciona-pagina" onClick="MostrarCadastro()">Adicionar</button>';
            }
            ?>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="body">
                    <div id="tabela-pagina">
                        <div class="table-responsive">
                            <table class="table table-hover table-custom spacing5" id="tabela-1">
                                <thead>
                                    <th>Titulo</th>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody class="relative" id="listaPaginas">
                                </tbody>
                            </table>
                        </div>
                        <div class="btn-group mt-2" id="paginationPaginas"></div>
                    </div>
                    <form method="post" id="formSeo">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="hidden" class="form-control" name="origem" id="origem" value="cadastraPagina">
                                    <input type="hidden" class="form-control" name="categoriaId" id="categoriaId" value="<?php echo $_POST['categoriaId'] ?>">
                                    <input type="hidden" class="form-control" name="nomeCategoria" id="nomeCategoria" value="">
                                    <input type="hidden" class="form-control" name="nomePagina" id="nomePagina" value="">
                                    <input type="hidden" class="form-control" name="imagemPagina" id="imagemPagina" value="">
                                    <input type="text" class="form-control" placeholder="Titulo da página" name="tituloPagina" id="tituloPagina" onChange="GeraNome(this.value)" onKeyDown="GeraNome(this.value)">
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
                                <button class="btn btn-success btn-cadastra" type="button" id="btn-cadastra-seo" onClick="CadastraSeo()">Cadastrar</button>
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

        const categoriaId = <?php echo $_POST['categoriaId'] ?>;

        $("#formSeo").hide();
        $("#btn-volta-pagina").hide();

        ListaPaginas(categoriaId);

        const nome = NomeCategoria('<?php echo $_POST['nomePagina'] ?>');


    });

    function destruirTodasAsInstancias() {
        for (const instanceName in CKEDITOR.instances) {
            if (CKEDITOR.instances.hasOwnProperty(instanceName)) {
                CKEDITOR.instances[instanceName].destroy();
                delete CKEDITOR.instances[instanceName];
            }
        }
    }

    function ListaPaginas(categoriaId) {
        $("#formSeo").hide();
        $("#btn-volta-pagina").hide();
        $("#btn-adiciona-pagina").show();
        $("#tabela-pagina").show();

        let tabela1 = $('#tabela-1').DataTable();

        const lista = document.getElementById("listaPaginas");

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
                origem: "listaPagina",
                categoriaId: categoriaId
            },
        }).done(function(data) {
            const nomeCategoria = NomeCategoria('<?php echo $_POST['nomePagina'] ?>');
            const conteudoPagina = JSON.parse(data);
            conteudoPagina.paginas.forEach(function(pagina) {

                const linha = document.createElement("tr");
                linha.classList.add("bg-cinza");

                linha.innerHTML = `
                        <td><span>${pagina.tituloPagina}</span></td>
                        <td><span>${pagina.descricaoPagina}</span></td>
                        <td>
                            <div style="display: flex; justify-content: flex-end;">
                                <button class="btn btn-success btn-sm btn-mostra-pagina ml-2" id="${pagina.idPagina}" onClick="EditaPagina('${pagina.categoriaId !== 0 ? pagina.categoriaId : pagina.nomePagina}', '${pagina.tituloPagina}', '${pagina.categoriaId}' , '${pagina.idPagina}' , '${pagina.nomePagina}')">Editar</button>
                                ${pagina.categoriaId !== 0 ? `<button class="btn btn-danger btn-sm btn-deleta-pagina ml-2" id="${pagina.idPagina}" onClick="DeletaPagina('${pagina.categoriaId}', '${nomeCategoria}',this.id)">Deletar</button>` : ''}
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

    function CadastraSeo() {
        const formSeo = $("#formSeo");
        const botaoCadastra = formSeo.find("#btn-cadastra-seo")[0];
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

            botaoCadastra.innerHTML = "<i class='fa fa-spinner fa-spin'></i> <span>Carregando...</span>";

            $.ajax({
                type: "POST",
                url: "backend/cadastro-conteudo.php",
                data: $("#formSeo").serialize()
            }).done(function(data) {

                toastr.options.timeOut = "2000";

                botaoCadastra.innerHTML = "Cadastrar";

                if (data) {

                    const conteudoPagina = JSON.parse(data);

                    if (conteudoPagina.data) {

                        toastr["success"]("Cadastrado com sucesso. Aguarde o redirecionamento!");

                        EditaPagina(conteudoPagina.pagina.categoriaId, conteudoPagina.pagina.tituloPagina, conteudoPagina.pagina.categoriaId, conteudoPagina.pagina.idPagina, conteudoPagina.pagina.nomePagina);
                    } else {
                        toastr["error"]("Falha ao cadastrar!");
                    }
                } else {
                    toastr["error"]("Falha ao cadastrar!");
                }



            });

        }
    }

    function EditaPagina(paginaSelecionada, tituloPagina, categoriaId, idPagina, nomePagina) {

        destruirTodasAsInstancias();

        $.ajax({
            type: 'POST',
            url: "frontend/pagina-" + paginaSelecionada + ".php",
            data: {
                paginaSelecionada: paginaSelecionada,
                tituloPagina: tituloPagina,
                categoriaId: categoriaId,
                idPagina: idPagina,
                nomePagina: nomePagina
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

            // Executa os scripts após o conteúdo ser atualizado
            for (const scriptElement of scriptsToExecute) {
                document.body.appendChild(scriptElement);
            }
        });
    }

    function DeletaPagina(categoriaId, nomeCategoria, id) {
        $.ajax({
            type: "POST",
            url: "backend/deleta-conteudo.php",
            data: {
                origem: "deletaPagina",
                idPagina: id,
                nomeDiretorio: nomeCategoria
            },
        }).done(function(data) {

            console.log(data);

            toastr.options.timeOut = "2000";

            if (data) {
                toastr["success"]("Deletado com sucesso!");
                ListaPaginas(categoriaId);
            } else {
                toastr["error"]("Falha ao deletar!");
            }

        });
    }

    function GeraNome(nome) {
        const inputNome = document.getElementById("nomePagina");

        const nomeSemAcentos = nome.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        const nomeFormatado = nomeSemAcentos.replace(/[^a-zA-Z0-9-\s]/g, "");
        const nomeFinal = nomeFormatado.toLowerCase().replace(/\s/g, "-");

        inputNome.value = nomeFinal;
    }

    function NomeCategoria(nome) {
        const inputNome = document.getElementById("nomeCategoria");
        // const nomeSemAcentos = nome.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        // const nomeFormatado = nomeSemAcentos.replace(/[^a-zA-Z0-9-]/g, "");
        const nomeFinal = nome.toLowerCase().replace(/\s/g, "-");

        inputNome.value = nomeFinal;
        return nomeFinal;
    }

    function MostrarCadastro() {
        $("#tabela-pagina").hide();
        $("#btn-adiciona-pagina").hide();
        $("#formSeo").show();
        $("#btn-volta-pagina").show();
    }
</script>
<?php
'';
?>