<?php

include_once "assets/componentes.php";
include_once "painel/backend/conexao-banco.php";

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE idPagina = :idPagina");
$sqlSeo->bindValue(":idPagina", 2);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlConteudos->execute();
$conteudosArray = $sqlConteudos->fetchAll(PDO::FETCH_ASSOC);
$conteudosArray = json_decode(json_encode($conteudosArray));

$sqlBlogs = $con->prepare("SELECT p.*, c.* FROM paginas p, destaques d, blogs c WHERE p.idPagina = d.idItem AND c.paginaId = p.idPagina AND c.status = 1");
$sqlBlogs->execute();
$blogsArray = $sqlBlogs->fetchAll(PDO::FETCH_ASSOC);
$blogsArray = json_decode(json_encode($blogsArray));

$sqlCategorias = $con->prepare("SELECT * FROM categorias c, paginas p WHERE c.paginaId = p.idPagina AND c.tipoCategoria = :tipoCategoria");
$sqlCategorias->bindValue(":tipoCategoria", 1);
$sqlCategorias->execute();
$categoriasArray = $sqlCategorias->fetchAll(PDO::FETCH_ASSOC);
$categoriasArray = json_decode(json_encode($categoriasArray));

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

    <link rel="icon" type="image/svg" href="assets/svg/favicon.svg">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/quem-somos.css">
</head>

<body>
    <?php cHeader(); ?>
    <?php
    foreach ($conteudosArray as $conteudo) {
        if($conteudo->numeroConteudo == 1){
            banner(
                "QUEM SOMOS",
                "{$conteudo->legendaImagem1Conteudo}",
                "{$conteudo->legendaImagem2Conteudo}",
                "./assets/uploads/{$conteudo->imagem1Conteudo}",
                "./assets/uploads/{$conteudo->imagem2Conteudo}"
            ); 
        }
    }
    ?>
    <section class="who-we-are">
        <div class="shaped-content container">
            <div class="row">
                <div class="col-12 col-lg-7 description-text">
                    <?php
                    foreach ($conteudosArray as $conteudo) {
                        if($conteudo->numeroConteudo == 2){
                            echo <<<HTML
                            {$conteudo->textoConteudo}
                            <div class="social-media">
                                {$redes}
                            </div>
                            HTML;
                        }
                    }
                    ?>
                </div>
                <div class="col-12 col-lg-5 description-image">
                    <?php
                    foreach ($conteudosArray as $conteudo) {
                        if($conteudo->numeroConteudo == 3){
                            echo <<<HTML
                            <img src="assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}">
                            <div class="brown-box">
                                {$conteudo->textoConteudo}
                            </div>
                            HTML;
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="white-box">
                        <div class="row">
                            <?php
                            foreach ($conteudosArray as $conteudo) {
                                if($conteudo->numeroConteudo == 4){

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
                                    <div class="col-12 col-lg-4 video">
                                        <div class="watch-video cursor-pointer"  onClick="PopUpVideo('{$videoId}')">
                                            <img src="assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" class="video-bg">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-8 text">
                                        {$conteudo->textoConteudo}
                                    </div>
                                    HTML;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="what-we-do">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>O que fazemos?</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <?php
                    foreach ($conteudosArray as $conteudo) {
                        if($conteudo->numeroConteudo == 5){
                            echo <<<HTML
                            {$conteudo->textoConteudo}
                            HTML;
                        }
                    }
                    ?>
                </div>
                <div class="col-12 col-lg-8">
                    <?php
                    foreach ($conteudosArray as $conteudo) {
                        if($conteudo->numeroConteudo == 6){
                            echo <<<HTML
                            
                            <div class="accordion cursor-pointer">
                                <div class="title">
                                    <div>
                                        <span class="limit-text">{$conteudo->tituloConteudo}</span>
                                    </div>
                                </div>
                                <div class="panel">
                                    {$conteudo->textoConteudo}
                                </div>
                            </div>
                            HTML;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="swiper-photos">
            <?php
            foreach ($conteudosArray as $conteudo) {
                if($conteudo->numeroConteudo == 7){
                    echo <<<HTML
                    <div class="img-wrapper">
                        <img src="assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}">
                    </div>
                    HTML;
                }
            }
            ?>
        </div>
    </section>
    <section class="background-video">
        <?php
        foreach ($conteudosArray as $conteudo) {
            if($conteudo->numeroConteudo == 8){

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

                $url_base = BASE_URL;

                echo <<<HTML
                <iframe loading="lazy" src="{$url_base}/assets/video-fundo-home.html?idVideo={$videoId}"></iframe>
                HTML;
            }
        }
        ?>
    </section>
    <section class="other-blogs">
        <h1>Blog do Grupo</h1>
        <div class="container">
            <div class="swiper-other-blogs">
                <?php
                    foreach ($blogsArray as $blog) {
                        $dataBlog = $blog->dataBlog;
                        $categoriasId = $blog->categoriasId;
                        $dataBlog = new DateTime($dataBlog);
                        $dataBlog = $dataBlog->format('d/m/Y');
                        $primeiraCategoriaBlog = json_decode($categoriasId);
                        if($primeiraCategoriaBlog){
                            $primeiraCategoriaBlog = $primeiraCategoriaBlog[0];
                            foreach ($categoriasArray as $rowCat) {
                                if($rowCat->idCategoria == $primeiraCategoriaBlog){
                                    $nomeCategoriaBlog = $rowCat->nomeCategoria;
                                }
                            }
                        }
                        else{
                            $nomeCategoriaBlog = "";
                        }
            
                        echo <<<HTML
                        <a href="./blog-detalhes/{$blog->nomePagina}">
                            <div class="card-blog">
                                <img src="assets/uploads/{$blog->imagemBlog}" alt="{$blog->legendaImagemBlog}">
                                <div>
                                    <span class="tag">{$nomeCategoriaBlog}</span><span class="date">{$dataBlog}</span>
                                </div>
                                <h1>{$blog->tituloBlog}</h1>
                                <div class="outline-button">
                                    Ler mais
                                    <img src="assets/svg/seta-dir-marrom.svg" alt="Ler Mais">
                                </div>
                            </div>
                        </a>
                        HTML;
                    }
                ?>
            </div>
        </div>
    </section>
    <?php cFooter(); ?>
    <?php elementosGerais(); ?>
    <?php scriptBody(); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".swiper-other-blogs").slick({
                infinite: true,
                dots: true,
                slidesToShow: 3,
                autoplay: true,
                autoplaySpeed: 2500,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 1,
                        },
                    },
                ],
            });
            $(".swiper-photos").slick({
                infinite: true,
                slidesToShow: 3,
                autoplay: true,
                autoplaySpeed: 2500,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 1,
                        },
                    },
                ],
            });
        });
    </script>
    <script src="javascript/global.js"></script>
</body>

</html>