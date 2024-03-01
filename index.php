<?php

include_once "assets/componentes.php";
include_once "painel/backend/conexao-banco.php";

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE idPagina = :idPagina");
$sqlSeo->bindValue(":idPagina", 1);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlConteudos->execute();
$conteudosArray = $sqlConteudos->fetchAll(PDO::FETCH_ASSOC);
$conteudosArray = json_decode(json_encode($conteudosArray));

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tags Open Graph -->
    <meta property="og:title" content="<?php echo $conteudoSeo["tituloPagina"] ?>">
    <meta property="og:description" content="<?php echo $conteudoSeo["descricaoPagina"] ?>">
    <meta property="og:url" content="<?php echo BASE_URL.'/'. $conteudoSeo["nomePagina"] ?>">
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


    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <main>
        <div class="swiper-inicial">
            <div class="slide">
                <img src="" alt="" class="fundo-desktop">
                <img src="" alt="" class="fundo-mobile">
                <div class="container">
                    <div class="texto">
                        <h1>Um grupo com DNA nos resultados</h1>
                    </div>
                    <a class="btn-saiba-mais" href="">
                        Saiba Mais
                        <img src="" alt="" class="seta">
                    </a>
                </div>
            </div>
        </div>
        <div class="atuacao">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="bloco-atuacao-1">
                            <div class="redes"></div>
                            <div class="titulo">

                            </div>
                            <div class="texto">

                            </div>
                            <a class="btn-saiba-mais" href="">
                                Saiba Mais
                                <img src="" alt="" class="seta">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="bloco-atuacao-2">
                            <img src="" alt="">
                            <div class="texto"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="resultados">
            <img src="" alt="" class="fundo">
            <div class="container">
                <h1 class="titulo-secao">Resultados Financeiros</h1>
    
                <div class="swiper-resultados">
                    <div class="slide">
                        <img src="" alt="">
                        <h1>SOMOS 350</h1>
                        <div class="texto">
                            <p>texto do resultado esperado</p>
                        </div>
                    </div>
                </div>
                <div class="redes"></div>
            </div>
        </div>
        <div class="container depoimentos">
            <h1 class="titulo-secao">Depoimentos</h1>

            <div class="swiper-depoimentos">
                <div class="slide">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <img src="" alt="">
                            <h1 class="autor"></h1>
                            <h1 class="funcao"></h1>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="texto">

                            </div>
                            <div class="btn-ler-mais">
                                Ler Mais
                                <img src="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
</body>

</html>