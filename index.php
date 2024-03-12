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

$sqlBlogs = $con->prepare("SELECT p.*, c.* FROM paginas p, blogs c WHERE c.paginaId = p.idPagina AND c.status = 1");
$sqlBlogs->execute();
$blogsArray = $sqlBlogs->fetchAll(PDO::FETCH_ASSOC);
$blogsArray = json_decode(json_encode($blogsArray));

$sqlCategorias = $con->prepare("SELECT * FROM categorias c, paginas p WHERE c.paginaId = p.idPagina AND c.tipoCategoria = :tipoCategoria");
$sqlCategorias->bindValue(":tipoCategoria", 1);
$sqlCategorias->execute();
$categoriasArray = $sqlCategorias->fetchAll(PDO::FETCH_ASSOC);
$categoriasArray = json_decode(json_encode($categoriasArray));

$sqlClientes = $con->prepare("SELECT * FROM clientes WHERE status = 1");
$sqlClientes->execute();
$clientesArray = $sqlClientes->fetchAll(PDO::FETCH_ASSOC);
$clientesArray = json_decode(json_encode($clientesArray));

$sqlEmpresas = $con->prepare("SELECT p.*, c.* FROM paginas p, business c WHERE c.paginaId = p.idPagina AND c.status = 1");
$sqlEmpresas->execute();
$empresasArray = $sqlEmpresas->fetchAll(PDO::FETCH_ASSOC);
$empresasArray = json_decode(json_encode($empresasArray));

$sqlFormulario = $con->prepare("SELECT * FROM formularios WHERE descricaoFormulario = :descricaoFormulario");
$sqlFormulario->bindValue(":descricaoFormulario", 'newsletter');
$sqlFormulario->execute();
$formulario = $sqlFormulario->fetch(PDO::FETCH_ASSOC);

ob_start();
redesSociais("marrom");
$redesMarrom = ob_get_clean();

ob_start();
redesSociais("amarelo");
$redesAmarelo = ob_get_clean();

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
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php cHeader(); ?>
    <main>
        <div class="swiper-banner">
            <?php
            foreach ($conteudosArray as $conteudo) {
                if ($conteudo->numeroConteudo == 1) {

                    $url_base = BASE_URL;
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
                            $iframe = '<iframe class="video-fundo" src="' . $url_base . '/assets/video-fundo-home.html?idVideo=' . $videoId . '"></iframe>';
                        }
                    } else {
                        $iframe = '<img src="assets/uploads/' . $conteudo->imagem1Conteudo . '" alt="' . $conteudo->legendaImagem1Conteudo . '">';
                    }

                    echo <<<HTML
                    <div class="banner-slide">
                        {$iframe}
                        <div class="content">
                            {$conteudo->textoConteudo}
                            <a href="{$conteudo->linkBotao1}" title="{$conteudo->nomeBotao1}" target="{$conteudo->targetBotao1}">
                                <div class="outline-button white">
                                    {$conteudo->nomeBotao1}
                                    <img src="assets/svg/seta-dir-bege.svg" alt="Ler Mais">
                                </div>
                            </a>
                        </div>
                    </div>
                    HTML;
                }
            }
            ?>
        </div>
        <section class="about">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 text">
                        <?php
                        foreach ($conteudosArray as $conteudo) {
                            if ($conteudo->numeroConteudo == 2) {
                                echo <<<HTML
                                <div class="social-media">
                                    {$redesMarrom}
                                </div>
                                <h1 class="limit-text">{$conteudo->tituloConteudo}</h1>
                                {$conteudo->textoConteudo}
                                <a href="{$conteudo->linkBotao1}" title="Saiba Mais"  target="{$conteudo->targetBotao1}">
                                    <div class="outline-button">
                                        Saiba Mais
                                        <img src="assets/svg/seta-dir-bege.svg" alt="Ler Mais">
                                    </div>
                                </a>
                                HTML;
                            }
                        }
                        ?>
                    </div>
                    <div class="col-12 col-lg-6 image">
                        <?php
                        foreach ($conteudosArray as $conteudo) {
                            if ($conteudo->numeroConteudo == 3) {
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
            </div>
        </section>
        <section class="financial">
            <img src="assets/png/resultados-financeiros-home.png" alt="Fundo">
            <div class="container">
                <h1>Resultados Financeiros Impulsionados por Inovação e Conhecimento</h1>
                <div class="swiper-financial">
                    <?php
                    foreach ($conteudosArray as $conteudo) {
                        if ($conteudo->numeroConteudo == 4) {
                            echo <<<HTML
                            <div class="financial-card">
                                <img src="assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}">
                                <h1 class="limit-text">{$conteudo->tituloConteudo}</h1>
                                {$conteudo->textoConteudo}
                            </div>
                            HTML;
                        }
                    }
                    ?>
                </div>
                <div class="social-media">
                    <?php echo $redesAmarelo; ?>
                </div>
            </div>
        </section>
        <section class="testimonials">
            <div class="container white-box">
                <h1>Depoimentos</h1>
                <div class="swiper-testimonials">
                    <?php
                    foreach ($conteudosArray as $conteudo) {
                        if ($conteudo->numeroConteudo == 5) {

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
                            <div class="slide-testimonial cursor-pointer"  onClick="PopUpVideo('{$videoId}')">
                                <div class="row">
                                    <div class="col-12 col-lg-3 company">
                                        <img src="./assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}">
                                        <span class="person limit-text">{$conteudo->legendaImagem2Conteudo}</span>
                                        <span class="position limit-text">{$conteudo->legendaImagem3Conteudo}</span>
                                    </div>
                                    <div class="col-12 col-lg-9 testimonial">
                                        {$conteudo->textoConteudo}
                                        <span class="read-more" target="{$conteudo->targetBotao1}">
                                            Ler mais 
                                            <img src="./assets/svg/play-ler-mais.svg" alt="Ler Mais">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            HTML;
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
        <section class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-2">
                        <img class="whatsapp-icon desktop" src="assets/svg/botao-whatsapp-verde.svg" alt="Whatsapp">
                    </div>
                    <div class="col-12 col-lg-4">
                        <p>Receba meus lançamentos e novidades na sua caixa de mensagens ou WhatsApp.</p>
                    </div>
                    <div class="col-12 col-lg-6">
                        <form id="formulario-1">
                            <input type="hidden" name="origem" id="origem" value="formulario">
                            <input type="hidden" name="newsLetter" id="newsLetter" value="sim">
                            <input type="hidden" name="quemRecebe" id="quemRecebe"
                                value="<?php echo $formulario['emailFormulario']; ?>">
                            <input type="hidden" name="tituloPagina" id="tituloPagina" value="">
                            <input name="contatoNome" id="contatoNome" type="text" placeholder="Nome" />
                            <input name="contatoEmail" id="contatoEmail" type="text" placeholder="E-mail" />
                            <input name="contatoTelefone" id="contatoTelefone" type="text" placeholder="WhatsApp"
                                onkeyup="mascaraTel(this);" maxlength="15" />
                            <button type="button" class="send botao-enviar" onClick="EnviarFormulario(1)">
                                Enviar
                                <img loading="lazy" src="assets/svg/seta-dir-amarela.svg" alt="Seta" />
                            </button>
                            <label for="contact-checkbox">
                                <input id="contact-checkbox" type="checkbox" name="contatoTermo" id="contatoTermo" />
                                Concordo com os Termos Gerais da Lei Geral de Proteção de Dados.</label>
                        </form>
                    </div>
                </div>
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
                                            <div class="limit-text">
                                                {$empresa->textoBusiness}
                                            </div>
                                            <a class="link-completo" href="./empresa-detalhes/{$empresa->nomePagina}" title="{$empresa->tituloPagina}"></a>
                                        </div>
                                        <div class="social-media">
                                            {$redesMarrom}
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
                        if ($conteudo->numeroConteudo == 6) {
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
                <button onclick="scrollElemento('.what-we-do')" class="scroll-down">
                    <img src="assets/svg/seta-baixo-marrom.svg" alt="Seta">
                </button>
            </div>
        </section>

        <section class="what-we-do">
            <img src="assets/svg/fundo-mapa.svg" alt="Fundo">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4 texto">
                        <h1>O que fazemos?</h1>
                        <?php
                        foreach ($conteudosArray as $conteudo) {
                            if ($conteudo->numeroConteudo == 7) {
                                echo <<<HTML
                                {$conteudo->textoConteudo}
                                <a href="{$conteudo->linkBotao1}" titlle="{$conteudo->nomeBotao1}" target="{$conteudo->targetBotao1}">
                                    <div class="outline-button">
                                        {$conteudo->nomeBotao1}
                                        <img src="assets/svg/seta-dir-marrom.svg" alt="Ler Mais">
                                    </div>
                                </a>
                                HTML;
                            }
                        }
                        ?>
                    </div>
                    <div class="col-12 col-lg-8 itens">
                        <?php
                        foreach ($conteudosArray as $conteudo) {
                            if ($conteudo->numeroConteudo == 8) {
                                echo <<<HTML
                                <div class="card"><span>{$conteudo->tituloConteudo}</span></div>
                                HTML;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="clients">
            <div class="container shaped-content">
                <h1>Nossos clientes</h1>
                <div class="swiper-clients">
                    <?php
                    foreach ($clientesArray as $cliente) {
                        echo <<<HTML
                        <a href="{$cliente->linkCliente}" class="client-wrapper" target="_blank">
                            <div class="client">
                                <img src="assets/uploads/{$cliente->imagemCliente}" alt="{$cliente->legendaImagemCliente}">
                            </div>
                        </a>
                        HTML;
                    }
                    ?>
                </div>
            </div>
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
                        if ($primeiraCategoriaBlog) {
                            $primeiraCategoriaBlog = $primeiraCategoriaBlog[0];
                            foreach ($categoriasArray as $rowCat) {
                                if ($rowCat->idCategoria == $primeiraCategoriaBlog) {
                                    $nomeCategoriaBlog = $rowCat->nomeCategoria;
                                }
                            }
                        } else {
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
    </main>
    <?php cFooter(); ?>
    <?php elementosGerais(); ?>
    <?php scriptBody(); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".swiper-banner").slick({
                infinite: true,
                dots: true,
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 3000,
            });
            $(".swiper-financial").slick({
                infinite: true,
                dots: true,
                slidesToShow: 4,
                slidesToScroll: 1,
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
            $(".swiper-business").slick({
                infinite: true,
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 2500,
            });
            $(".swiper-testimonials").slick({
                infinite: true,
                dots: true,
                autoplay: true,
                autoplaySpeed: 2500,
                slidesToShow: 1,
            });
            $(".swiper-clients").slick({
                infinite: true,
                dots: true,
                slidesToShow: 4,
                autoplay: true,
                autoplaySpeed: 2500,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 1,
                            arrows: false,
                        },
                    },
                ],
            });
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
        });
    </script>
    <script src="javascript/global.js"></script>
</body>

</html>