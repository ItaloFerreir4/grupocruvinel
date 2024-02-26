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

$sqlWorkshops = $con->prepare("SELECT p.*, w.* FROM paginas p, workshops w WHERE w.paginaId = :paginaId AND w.paginaId = p.idPagina AND w.status = 1");
$sqlWorkshops->bindValue(":paginaId", $conteudoSeo["idPagina"]);
$sqlWorkshops->execute();
$workshop = $sqlWorkshops->fetch(PDO::FETCH_ASSOC);

$sqlWorkshops = $con->prepare("SELECT p.*, w.* FROM paginas p, workshops w WHERE w.paginaId = p.idPagina AND w.status = 1 LIMIT 3");
$sqlWorkshops->execute();
$workshopsArray = $sqlWorkshops->fetchAll(PDO::FETCH_ASSOC);
$workshopsArray = json_decode(json_encode($workshopsArray));

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" href="../css/workshop-detalhes.css">
</head>

<body>
    <?php cHeader(); ?>
    <div class="banner">
        <img src="../assets/png/banner-workshop-detalhes-desk.png" alt="Banner" class=".banner-workshop-detalhes-desk">
        <div class="container">
            <div class="row">
                <div id="titulo-pagina" class="col-12 col-lg-6">
                    <h1><?php echo $workshop["tituloWorkshop"] ?></h1>
                    <h2><?php echo $workshop["subTituloWorkshop"] ?></h2>
                    <div class="data-local">
                        <div class="data-local-flex">
                            <p><span>Data:</span> <?php echo $workshop["dataWorkshop"] ?></p>
                            <p><span>Horário:</span> Ás <?php echo $workshop["dataWorkshop"] ?></p>
                        </div>
                        <p><span>Local:</span> <?php echo $workshop["localWorkshop"] ?></p>
                    </div>
                    <div class="valor-saiba-mais">
                        <div class="valor-banner">
                            <h3>R$ <?php echo $workshop["valorAvistaWorkshop"] ?></h3>
                            <p>em até <?php echo $workshop["qtdParcelaWorkshop"] ?>x</p>
                        </div>
                        <div class="saiba-mais" onclick="scrollElemento(\'.conteudo-fundo-branco\')">
                            <span>Saiba mais</span>
                            <img loading="lazy" src="../assets/svg/icone-seta-saiba-mais-preta.svg" alt="Seta">
                        </div>
                        <div class="comprar-btn" onclick="scrollElemento(\'.comprar-curso\')">
                            <span>Comprar</span>
                            <img loading="lazy" src="../assets/svg/icone-seta-diagonal-preto.svg" alt="Seta">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <img loading="lazy" src="../assets/uploads/<?php echo $workshop["imagemWorkshop"] ?>" alt="<?php echo $workshop["legendaImagemWorkshop"] ?>" class="img-curso-detalhes">
                </div>
            </div>
        </div>
    </div>
    <div id="conteudo">
        <img loading="lazy" class="fundo-body" src="../assets/png/img-fundo-curso-detalhes.png" alt="Fundo">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <section class="conteudo-fundo-branco">
                        <div class="row">
                            <div class="col-12">
                                <div class="info-curso">
                                    <h1>Sobre o Workshop</h1>
                                    <?php echo $workshop["textoWorkshop"] ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="comprar-curso">
                        <img loading="lazy" src="../assets/png/img-fundo-preco-curso.png" alt="Curso">
                        <div class="preco">
                            <div class="parcelas">
                                <span><?php echo $workshop["qtdParcelaWorkshop"] ?>x</span>
                                <h1>R$<?php echo $workshop["valorParceladoWorkshop"] ?></h1>
                            </div>
                            <h2>ou R$<?php echo $workshop["valorAvistaWorkshop"] ?></h2>
                        </div>
                        <a href="<?php echo $workshop["linkBotaoWorkshop"] ?>" target="<?php echo $workshop["targetBotaoWorkshop"] ?>" class="botao-comprar">
                            <span>Comprar</span>
                            <img loading="lazy" src="../assets/svg/icone-seta-diagonal-preto.svg" alt="Comprar">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="outros-cursos">
                        <div class="subtitulo">
                            <h2>Outros Cursos</h2>
                        </div>
                        <div class="conteudo-grid">
                            <?php
                            foreach ($workshopsArray as $row) {
                                echo <<<HTML
                                    <a href="../workshop-detalhes/{$row->nomePagina}" class="link-card">
                                        <div class="box-card">
                                            <div class="txt-card">
                                                <div class="titulo-subtitulo">
                                                    <h2>{$row->tituloWorkshop}</h2>
                                                    <p>{$row->subTituloWorkshop}</p>
                                                </div>
                                                <div class="btn-workshop-data">
                                                    <div class="ver-workshop">
                                                        <span>Ver Workshop</span>
                                                        <img loading="lazy" src="../assets/svg/icone-seta-branco.svg" alt="seta branca para a direita">
                                                    </div>
                                                    <div class="data-workshop regex-format-date">
                                                        <p>{$row->dataWorkshop}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="img-card">
                                                <div class="content-img">
                                                    <div class="back-imagem-cinza"></div>
                                                    <img loading="lazy" src="../assets/uploads/{$row->imagemWorkshop}" alt="{$row->legendaImagemWorkshop}">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                HTML;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="../workshops" class="ver-todos">
                        <span>Ver Todos</span>
                        <img loading="lazy" src="../assets/svg/icone-seta-branco.svg" alt="Ver Todos">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="newsletter">
                        <img loading="lazy" src="../assets/png/img-fundo-newsletter.png" alt="Fundo Newsletter">
                        <div class="row">
                            <div id="form-img" class="col-12 col-lg-6 col-xl-4">
                                <img loading="lazy" id="newsletter-img" src="../assets/png/img-newsletter.png" alt="Faby">
                            </div>
                            <div id="form-newsletter" class="col-12 col-lg-6 col-xl-8">
                                <h1 class="newsletter-legenda">receba minhas dicas</h1>
                                <form action="">
                                    <input type="text" name="Nome" id="nome" placeholder="Nome">
                                    <input type="text" name="Email" id="email" placeholder="Email">
                                    <input type="text" name="WhatsApp" id="whatsapp" placeholder="WhatsApp">
                                    <label class="container-checkbox">Concordo que os dados pessoais fornecidos acima
                                        serão
                                        utilizados para
                                        envio de conteúdo nos termos da Lei Geral de Proteção de Dados.
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <button class="botao-enviar" type="button" value="enviar">enviar <img
                                            src="../assets/svg/icone-seta-botao-enviar.svg" alt="Enviar"></button>
                                </form>
                            </div>
                        </div>
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
        let listaResultados = document.querySelectorAll(".podcast-wrapper");
        let numResultadosPorPagina = 5;

        sessionStorage.setItem("categoria", "");
        sessionStorage.setItem("tag", "");
    </script>
    <script src="../javascript/ajusteDateRegex.js"></script>
</body>

</html>
';