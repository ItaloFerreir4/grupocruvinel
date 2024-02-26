<?php
include_once "../assets/componentes.php";
include_once "../painel/backend/conexao-banco.php";

$nomeDoArquivoCompleto = $_SERVER["SCRIPT_FILENAME"];
$nomeDoArquivoSemExtensao = pathinfo($nomeDoArquivoCompleto, PATHINFO_FILENAME);

$paginaSelecionada = $nomeDoArquivoSemExtensao;

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE nomePagina = :nomePagina AND categoriaId = :categoriaId");
$sqlSeo->bindValue(":nomePagina", $paginaSelecionada);
$sqlSeo->bindValue(":categoriaId", 24);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlPalestras = $con->prepare("SELECT p.*, c.* FROM paginas p, palestras c WHERE c.paginaId = :idPagina AND c.paginaId = p.idPagina AND c.status = 1");
$sqlPalestras->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlPalestras->execute();
$palestra = $sqlPalestras->fetch(PDO::FETCH_ASSOC);

$sqlPalestras = $con->prepare("SELECT p.*, c.* FROM paginas p, palestras c WHERE c.paginaId = p.idPagina AND c.status = 1");
$sqlPalestras->execute();
$palestrasArray = $sqlPalestras->fetchAll(PDO::FETCH_ASSOC);
$palestrasArray = json_decode(json_encode($palestrasArray));

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlConteudos->execute();
$conteudosArray = $sqlConteudos->fetchAll(PDO::FETCH_ASSOC);
$conteudosArray = json_decode(json_encode($conteudosArray));

ob_start();
redesSociaisCompartilhar("branco");
$redes = ob_get_clean();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tags Open Graph -->
    <meta property="og:title" content="<?php echo $conteudoSeo["tituloPagina"] ?>">
    <meta property="og:description" content="<?php echo $conteudoSeo["descricaoPagina"] ?>">
    <meta property="og:url" content="<?php echo BASE_URL . '/' . $conteudoSeo["nomePagina"] ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo $conteudoSeo["imagemPagina"] ?>">
    <meta property="og:image:alt" content="<?php echo $conteudoSeo["legendaImagemPagina"] ?>">
    <meta name="description" content="<?php echo $conteudoSeo["descricaoPagina"] ?>">
    <meta name="keywords" content="<?php echo $conteudoSeo["palavrasChavesPagina"] ?>">
    <meta name="robots" content="index,follow">
    <meta name="rating" content="General">
    <meta name="revisit-after" content="7 days">
    <title>
        <?php echo $conteudoSeo["tituloPagina"] ?>
    </title>

    <?php linksHead(); ?>

    <link rel="icon" type="image/svg" href="../assets/svg/favicon.svg">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/palestra-detalhes.css" />
</head>

<body>
    <?php cHeader(); ?>
    <main>
        <div class="banner">
            <?php
            foreach ($conteudosArray as $conteudo) {
                if ($conteudo->numeroConteudo == 1) {
                    echo <<<HTML
                        <img class="img-background desktop" src="../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" />
                        <img class="img-background mobile" src="../assets/uploads/{$conteudo->imagem2Conteudo}" alt="{$conteudo->legendaImagem2Conteudo}" />
                        <div class="container">
                            <div class="row">
                                <div class="col-12 bloco-1">
                                    <div class="title">
                                        <div class="pages">
                                            <a href="../">Home</a>
                                            <a href="../palestras">Palestras</a>
                                        </div>
                                        <p>{$palestra["tituloPalestra"]}</p>
                                        <div class="bottom">
                                            <a href="#textoPalestra">Ler mais</a>
                                            <div class="caption-social-media">
                                                <span>Compartilhar: </span>
                                                <div class="social-media">
                                                    {$redes}
                                                </div>
                                            </div>
                                            <div class="date">
                                                <h2>{$palestra["dataPalestra"]}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        HTML;
                }
            }
            ?>
        </div>
        <section class="content" id="textoPalestra">
            <section class="white-bg">
                <?php echo $palestra['textoPalestra']; ?>
            </section>
        </section>
        <div class="watch-video-background">
            <?php
            foreach ($conteudosArray as $conteudo) {
                if ($conteudo->numeroConteudo == 2) {
                    echo <<<HTML
                        <img loading="lazy" class="desktop" src="../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" />
                        <img loading="lazy" class="mobile" src="../assets/uploads/{$conteudo->imagem2Conteudo}" alt="{$conteudo->legendaImagem2Conteudo}" />
                        <div class="watch-button">
                            <img loading="lazy" src="../assets/svg/play.svg" alt="Assistir" />
                            <span>{$conteudo->textoConteudo}</span>
                        </div>
                        HTML;
                }
            }
            ?>
        </div>
        <section class="others">
            <h1>Outras Palestras</h1>
            <div class="other-lectures-swiper">
                <?php
                $idPalestra = $palestra['idPalestra'];

                foreach ($palestrasArray as $palestra) {
                    if ($palestra->idPalestra != $idPalestra) {
                        $dataPalestra = $palestra->dataPalestra;

                        $mesesEmPortugues = array(
                            "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
                            "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
                        );

                        $diaDataPalestra = date("d", strtotime($dataPalestra));
                        $mesDataPalestra = date("m", strtotime($dataPalestra));
                        $anoDataPalestra = date("y", strtotime($dataPalestra));
                        $mesPtDataPalestra = $mesesEmPortugues[(int)date("m", strtotime($dataPalestra)) - 1];
                        echo <<<HTML
                        <a href="../palestra-detalhes/{$palestra->nomePagina}" title="{$palestra->tituloPagina}">
                            <div class="lecture-card">
                                <img loading="lazy" src="../assets/uploads/{$palestra->imagemPalestra}" alt="{$palestra->legendaImagemPalestra}" />
                                <div class="card-content">
                                    <div class="author">
                                        <img loading="lazy" src="../assets/uploads/{$palestra->imagemAutorPalestra}" alt="{$palestra->nomeAutorPalestra}" />
                                        <span>{$palestra->nomeAutorPalestra}</span>
                                    </div>
                                    <h1 class="limit-text">{$palestra->tituloPalestra}</h1>
                                    <p class="limit-text">
                                    {$palestra->subTituloPalestra}
                                    </p>
                                    <div class="bottom">
                                        <button class="blue-btn">Veja mais</button>
                                        <div class="date"><span>{$diaDataPalestra} de {$mesPtDataPalestra} de {$anoDataPalestra}</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        HTML;
                    }
                }
                ?>
            </div>
            <a href="../palestras" class="blue-btn center small">Abrir mais</a>
        </section>
        <?php echo formEmailNewsletter(); ?>
    </main>
    <?php cFooter(); ?>
    <?php elementosGerais(); ?>
    <?php scriptBody(); ?>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="../javascript/global.js"></script>
    <script>
        const whiteBg = document.querySelector(".white-bg");
        window.addEventListener("DOMContentLoaded", () => {
        addContainerClassToDesktop(whiteBg);
        });

        window.addEventListener("resize", () => {
        addContainerClassToDesktop(whiteBg);
        });
    </script>
    <script>
        $(".other-lectures-swiper").slick({
        infinite: true,
        slidesToShow: 3,
        responsive: [
            {
            breakpoint: 992,
            settings: {
                slidesToShow: 1,
            },
            },
        ],
        });
    </script>

</body>

</html>