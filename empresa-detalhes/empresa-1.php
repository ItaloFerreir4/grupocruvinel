<?php
include_once "../assets/componentes.php";
include_once "../painel/backend/conexao-banco.php";

$nomeDoArquivoCompleto = $_SERVER["SCRIPT_FILENAME"];
$nomeDoArquivoSemExtensao = pathinfo($nomeDoArquivoCompleto, PATHINFO_FILENAME);

$paginaSelecionada = $nomeDoArquivoSemExtensao;

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE nomePagina = :nomePagina AND categoriaId = :categoriaId");
$sqlSeo->bindValue(":nomePagina", $paginaSelecionada);
$sqlSeo->bindValue(":categoriaId", 3);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlBusiness = $con->prepare("SELECT p.*, c.* FROM paginas p, business c WHERE c.paginaId = :idPagina AND c.paginaId = p.idPagina AND c.status = 1");
$sqlBusiness->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlBusiness->execute();
$business = $sqlBusiness->fetch(PDO::FETCH_ASSOC);

$sqlBusiness = $con->prepare("SELECT p.*, c.* FROM paginas p, business c WHERE c.paginaId = p.idPagina AND c.status = 1");
$sqlBusiness->execute();
$businessArray = $sqlBusiness->fetchAll(PDO::FETCH_ASSOC);
$businessArray = json_decode(json_encode($businessArray));

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
    <link rel="stylesheet" href="../css/business-detalhes.css" />
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
                                            <a href="../business">Business</a>
                                        </div>
                                        <p>{$business["nomeBusiness"]}</p>
                                        <div class="bottom">
                                            <a href="#textoBusiness">Ler mais</a>
                                            <div class="caption-social-media">
                                                <span>Compartilhar: </span>
                                                <div class="social-media">
                                                    {$redes}
                                                </div>
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
        <section class="content" id="textoBusiness">
            <section class="white-bg">
                <img loading="lazy" src="../assets/png/logo-munra-dourado.png" alt="Munrá semijoias" />
                <?php echo $business['textoBusiness']; ?>
            </section>
        </section>
        <div class="watch-video-background">
            <?php
            foreach ($conteudosArray as $conteudo) {
                if ($conteudo->numeroConteudo == 2) {
                    $linkVideo = $conteudo->linkVideoConteudo;

                    if ($linkVideo) {
                        if (strpos($linkVideo, "shorts") !== false) {
                            $linkVideo = str_replace("shorts/", "watch?v=", $linkVideo);
                        }
                        $parts = parse_url($linkVideo);
                        $videoId = "";

                        parse_str($parts['query'], $query);

                        if (isset($query['v'])) {
                            $videoId = $query['v'];
                        }
                    } else {
                        $videoId = "";
                    }
                    
                    echo <<<HTML
                        <img loading="lazy" class="desktop" src="../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" />
                        <img loading="lazy" class="mobile" src="../assets/uploads/{$conteudo->imagem2Conteudo}" alt="{$conteudo->legendaImagem2Conteudo}" />
                        <div class="watch-button cursor-pointer" onClick="PopUpVideo('{$videoId}')">
                            <img loading="lazy" src="../assets/svg/play.svg" alt="Assistir" />
                            <div class="limit-text">{$conteudo->textoConteudo}</div>
                        </div>
                        HTML;
                }
            }
            ?>
        </div>
        <section class="be-a-reseller">
            <div>
                <div class="row">
                    <div class="col-12 col-lg-6 carousel">
                        <div class="resell-swiper">
                            <?php 
                                $idPagina = $business["idPagina"];
                                foreach ($businessArray as $business) {
                                    if($business->idPagina != $idPagina){
                                        echo <<<HTML
                                        <a href="../business-detalhes/{$business->nomePagina}" class="business-card-wrapper">
                                            <img loading="lazy" src="../assets/uploads/{$business->imagemBusiness}" alt="{$business->legendaImagemBusiness}" />
                                        </a>
                                        HTML;
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 logo">
                        <?php
                            foreach ($conteudosArray as $conteudo) {
                                if ($conteudo->numeroConteudo == 3) {
                                    echo <<<HTML
                                        <img src="../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" />
                                        <a class="blue-btn" href="{$conteudo->linkBotao1}" title="{$conteudo->nomeBotao1}" target="{$conteudo->targetBotao1}">{$conteudo->nomeBotao1}</a>
                                        HTML;
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
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
        const resellerContainer = document.querySelector(".be-a-reseller > div");
        window.addEventListener("DOMContentLoaded", () => {
        addContainerClassToDesktop(whiteBg);
        addContainerClassToDesktop(resellerContainer);
        });

        window.addEventListener("resize", () => {
        addContainerClassToDesktop(whiteBg);
        addContainerClassToDesktop(resellerContainer);
        });
    </script>
    <script>
        $(".resell-swiper").slick({
        infinite: true,
        slidesToShow: 1,
        dots: true,
        });
    </script>

</body>

</html>