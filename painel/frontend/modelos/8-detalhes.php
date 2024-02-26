<?php 

$conteudo = '
<?php
include_once "../assets/componentes.php";
include_once "../painel/backend/conexao-banco.php";

$nomeDoArquivoCompleto = $_SERVER["SCRIPT_FILENAME"];
$nomeDoArquivoSemExtensao = pathinfo($nomeDoArquivoCompleto, PATHINFO_FILENAME);

$paginaSelecionada = $nomeDoArquivoSemExtensao;

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE nomePagina = :nomePagina");
$sqlSeo->bindValue(":nomePagina", $paginaSelecionada);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlConsultorias = $con->prepare("SELECT p.*, c.* FROM paginas p, consultorias c WHERE c.paginaId = :idPagina AND c.paginaId = p.idPagina AND c.status = 1");
$sqlConsultorias->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlConsultorias->execute();
$consultoria = $sqlConsultorias->fetch(PDO::FETCH_ASSOC);

$sqlConsultorias = $con->prepare("SELECT p.*, c.* FROM paginas p, consultorias c WHERE c.paginaId = p.idPagina AND c.status = 1 LIMIT 3");
$sqlConsultorias->execute();
$consultoriasArray = $sqlConsultorias->fetchAll(PDO::FETCH_ASSOC);
$consultoriasArray = json_decode(json_encode($consultoriasArray));
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tags Open Graph -->
    <meta property="og:title" content="<?php echo $conteudoSeo["tituloPagina"] ?>">
    <meta property="og:description" content="<?php echo $conteudoSeo["descricaoPagina"] ?>">
    <meta property="og:url" content="http://localhost/fabysampaio/<?php echo $conteudoSeo["nomePagina"] ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo $conteudoSeo["imagemPagina"] ?>">
    <meta property="og:image:alt" content="<?php echo $conteudoSeo["legendaImagemPagina"] ?>">
    <meta name="description" content="<?php echo $conteudoSeo["descricaoPagina"] ?>">
    <meta name="keywords" content="<?php echo $conteudoSeo["palavrasChavesPagina"] ?>">
    <meta name="robots" content="index,follow">
    <meta name="rating" content="General">
    <meta name="revisit-after" content="7 days">
    <title><?php echo $conteudoSeo["tituloPagina"] ?></title>

    <?php linksHead(); ?>

    <link rel="icon" type="image/svg" href="../assets/svg/favicon.svg">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/consultoria-detalhes.css">
</head>

<body>
    <?php cHeader(); ?>
    <div class="banner">
        <img class="banner-desktop" src="../assets/png/img-banner-consultoria-desktop.png" alt="Banner">
        <img class="banner-mobile" src="../assets/png/img-banner-consultoria-mobile.png" alt="Banner">
        <div class="container">
            <div class="row">
                <div id="titulo-pagina" class="col-12 col-md-5">
                    <h1><?php echo $consultoria["tituloConsultoria"] ?></h1>
                    <h2><?php echo $consultoria["subTituloConsultoria"] ?></h2>
                    <div class="saiba-mais" onclick="scrollElemento(".conteudo-fundo-branco .titulo")">
                        <span>Saiba Mais</span>
                        <img loading="lazy" src="../assets/svg/icone-seta-baixo-preta.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="conteudo">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="conteudo-fundo-branco">
                        <div class="titulo">
                            <h1>Para que é a Consultoria</h1>
                        </div>
                        <?php echo $consultoria["textoConsultoria"] ?>
                        <div class="comprar-consultoria">
                            <img loading="lazy" src="../assets/png/img-fundo-preco-consultoria.png" alt="Consultoria">
                            <div class="preco">
                                <div class="parcelas">
                                    <span><?php echo $consultoria["qtdParcelaConsultoria"] ?>x</span>
                                    <h1>R$<?php echo $consultoria["valorParceladoConsultoria"] ?></h1>
                                </div>
                                <h2>ou R$<?php echo $consultoria["valorAvistaConsultoria"] ?></h2>
                            </div>
                            <a href="#" class="botao-comprar">
                                <span>Agendar Consultoria</span>
                                <img loading="lazy" src="../assets/svg/icone-seta-diagonal-preto.svg" alt="Comprar">
                            </a>
                            <img loading="lazy" class="seta-circulo" src="../assets/svg/icone-seta-circulo.svg" alt="Próximo">
                        </div>
                        <div class="agendar-consultoria">
                            <div class="img-wrapper">
                                <img loading="lazy" src="../assets/png/img-agendar-consultoria.png" alt="Agendar Consultoria">
                            </div>
                            <div id="form-agendar-consultoria">
                                <h1>Agende sua mentoria</h1>
                                <form id="formulario-1">
                                    <input type="hidden" name="origem" id="origem" value="formulario">
                                    <input type="hidden" name="email" id="email" value="'.$formulario['emailFormulario'].'">
                                    <input type="hidden" name="tituloPagina" id="tituloPagina" value="">
                                    <input type="text" name="contatoNome" id="contatoNome" placeholder="Nome">
                                    <input type="text" name="contatoEmail" id="contatoEmail" placeholder="Email">
                                    <input type="text" name="contatoWhatsApp" id="contatoWhatsApp" placeholder="WhatsApp" onkeyup="mascaraTel(this);" maxlength="15">
                                    <label class="container-checkbox">Concordo que os dados pessoais fornecidos
                                        acima
                                        serão
                                        utilizados para
                                        envio de conteúdo nos termos da Lei Geral de Proteção de Dados.
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <button class="botao-enviar" type="button" value="enviar">enviar <img loading="lazy"
                                            src="../assets/svg/icone-seta-branco.svg" alt="Enviar"></button>
                                </form>
                            </div>
                        </div>
                        <div class="leia-mais">
                            <div class="subtitulo">
                                <h2>Últimas Consultorias</h2>
                            </div>
                            <div class="conteudo-grid">
                                <?php
                                foreach ($consultoriasArray as $row) {
                                    echo <<<HTML
                                        <a href="../consultoria-detalhes/{$row->nomePagina}" class="link-card">
                                            <div class="card-consultoria">
                                                <img loading="lazy" src="../assets/uploads/{$row->imagemConsultoria}" alt="{$row->legendaImagemConsultoria}">
                                                <h1>{$row->tituloConsultoria}</h1>
                                                <p>{$row->subTituloConsultoria}</p>
                                                <div class="saiba-mais">
                                                    <span>Saiba Mais</span>
                                                    <img loading="lazy" src="../assets/svg/icone-seta-branco.svg" alt="Saiba Mais">
                                                </div>
                                            </div>
                                        </a>
                                    HTML;
                                }
                                ?>
                            </div>
                            <a href="../consultorias" class="ver-todos">
                                <span>Ver Todos</span>
                                <img loading="lazy" src="../assets/svg/icone-seta-branco.svg" alt="Ver Todos">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php formularioNewsletter(); ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php cFooter(); ?>
    <?php elementosGerais(); ?>
    <?php scriptBody(); ?>
    <script src="../javascript/global.js"></script>
    <script>
        let listaResultados = document.querySelectorAll(".link-card");
        sessionStorage.setItem("categoria", "");
        sessionStorage.setItem("tag", "");
        let numResultadosPorPagina = 6;
        carregarConteudo(listaResultados, 1);

    </script>
</body>

</html>
';