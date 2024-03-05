<?php

include_once "assets/componentes.php";
include_once "painel/backend/conexao-banco.php";

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE idPagina = :idPagina");
$sqlSeo->bindValue(":idPagina", 4);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlConteudos->execute();
$conteudosArray = $sqlConteudos->fetchAll(PDO::FETCH_ASSOC);
$conteudosArray = json_decode(json_encode($conteudosArray));

$sqlClientes = $con->prepare("SELECT * FROM clientes WHERE status = 1");
$sqlClientes->execute();
$clientesArray = $sqlClientes->fetchAll(PDO::FETCH_ASSOC);
$clientesArray = json_decode(json_encode($clientesArray));

$sqlEmpresas = $con->prepare("SELECT p.*, c.* FROM paginas p, business c WHERE c.paginaId = p.idPagina AND c.status = 1");
$sqlEmpresas->execute();
$empresasArray = $sqlEmpresas->fetchAll(PDO::FETCH_ASSOC);
$empresasArray = json_decode(json_encode($empresasArray));

ob_start();
redesSociais("marrom");
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

    <link rel="icon" type="image/svg" href="assets/svg/favicon.svg">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/clientes.css">
</head>

<body>
    <?php cHeader(); ?>
    <?php
    foreach ($conteudosArray as $conteudo) {
        if ($conteudo->numeroConteudo == 1) {
            banner(
                "CLIENTES",
                "{$conteudo->legendaImagem1Conteudo}",
                "{$conteudo->legendaImagem2Conteudo}",
                "./assets/uploads/{$conteudo->imagem1Conteudo}",
                "./assets/uploads/{$conteudo->imagem2Conteudo}"
            );
        }
    }
    ?>

    <section class="clients">
        <div class="shaped-content container">
            <div class="grid-content">
                <?php
                foreach ($clientesArray as $cliente) {
                    echo <<<HTML
                    <a href="{$cliente->linkCliente}" class="client-wrapper">
                        <div class="client">
                            <img src="assets/uploads/{$cliente->imagemCliente}" alt="{$cliente->legendaImagemCliente}">
                        </div>
                    </a>
                    HTML;
                }
                ?>
            </div>
            <button class="outline-button load-more" onclick="loadMore(listElements)">
                Carregar Mais
                <img src="./assets/svg/seta-dir-marrom.svg" alt="Carregar mais">
            </button>
        </div>
    </section>

    <section class="business">
        <h1>Empresas do <strong>Grupo Cruvinel</strong></h1>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="swiper-business">
                    <?php
                    foreach ($empresasArray as $empresa) {
                        echo <<<HTML
                            <div class="business-card">
                                <div class="business-info">
                                    <div class="info-content">
                                        <div class="yellow-highlight">
                                            <img src="assets/uploads/{$empresa->imagemBusiness}" alt="{$empresa->legendaImagemBusiness}" class="business-logo">
                                            <p class="limit-text">
                                                {$empresa->tituloBusiness}
                                            </p>
                                            <a class="link-completo" href="./empresa-detalhes/{$empresa->nomePagina}" title="{$empresa->tituloPagina}"></a>
                                        </div>
                                        <div class="social-media">
                                            {$redes}
                                        </div>
                                        <a href="./empresa-detalhes/{$empresa->nomePagina}" title="{$empresa->tituloPagina}">
                                            <div class="outline-button">Saiba mais <img src="assets/svg/seta-dir-marrom.svg"
                                                    alt="Saiba Mais">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            HTML;
                    }
                    ?>
                </div>
            </div>
            <div class="col-12 col-lg-6 business-video">
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
                            <img class="video-bg cursor-pointer" onClick="PopUpVideo('{$videoId}')" src="assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}">
                        HTML;
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <?php cFooter(); ?>
    <?php elementosGerais(); ?>
    <?php scriptBody(); ?>
    <script>
        $(document).ready(function () {
            $(".swiper-business").slick({
                infinite: true,
                slidesToShow: 1,
            });
        });
    </script>
    <script>
        let maxVisibleElements = 12;
        const listElements = document.querySelectorAll(".client-wrapper");

        sessionStorage.setItem("t", "");
        sessionStorage.setItem("y", new Date().getFullYear().toString().substring(2, 2));
        sessionStorage.setItem("m", "");
    </script>
    <script src="javascript/global.js"></script>
    <script src="javascript/filter.js"></script>
</body>

</html>