<?php
include_once "../assets/componentes.php";
include_once "../painel/backend/conexao-banco.php";

$nomeDoArquivoCompleto = $_SERVER["SCRIPT_FILENAME"];
$nomeDoArquivoSemExtensao = pathinfo($nomeDoArquivoCompleto, PATHINFO_FILENAME);

$paginaSelecionada = $nomeDoArquivoSemExtensao;

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE nomePagina = :nomePagina AND categoriaId = :categoriaId");
$sqlSeo->bindValue(":nomePagina", $paginaSelecionada);
$sqlSeo->bindValue(":categoriaId", 12);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlLivros = $con->prepare("SELECT p.*, c.* FROM paginas p, livros c WHERE c.paginaId = :idPagina AND c.paginaId = p.idPagina AND c.status = 1");
$sqlLivros->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlLivros->execute();
$livro = $sqlLivros->fetch(PDO::FETCH_ASSOC);

$sqlLivros = $con->prepare("SELECT p.*, c.* FROM paginas p, livros c WHERE c.paginaId = p.idPagina AND c.tipoLivro = :tipoLivro AND c.status = 1");
$sqlLivros->bindValue(":tipoLivro", 'Livro');
$sqlLivros->execute();
$livrosArray = $sqlLivros->fetchAll(PDO::FETCH_ASSOC);
$livrosArray = json_decode(json_encode($livrosArray));

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
    <link rel="stylesheet" href="../css/livro-detalhes.css" />
</head>

<body>
    <?php cHeader(); ?>
    <main>
        <div class="banner">
            <?php
            foreach ($conteudosArray as $conteudo) {
                if ($conteudo->numeroConteudo == 2) {
                    echo <<<HTML
                        <img class="img-background desktop" src="../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" />
                        <img class="img-background mobile" src="../assets/uploads/{$conteudo->imagem2Conteudo}" alt="{$conteudo->legendaImagem2Conteudo}" />
                        <div class="container">
                            <div class="row">
                                <div class="col-12 bloco-1">
                                    <div class="title">
                                        <div class="pages">
                                            <a href="../">Home</a>
                                            <a href="../livros">Livros</a>
                                        </div>
                                        <p>{$livro["tituloLivro"]}</p>
                                        <div class="bottom">
                                            <a class="btn-mais" href="#textoLivro">Ler mais</a>
                                            <div class="caption-social-media">
                                                <span>Compartilhar: </span>
                                                <div class="social-media">
                                                    {$redes}
                                                </div>
                                            </div>
                                            <div class="date">
                                                <h2>{$livro["dataLivro"]}</h2>
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
        <section class="white-bg row" id="textoLivro">
            <div class="col-12 col-lg-5 blog-content">
                <?php echo $livro['textoLivro']; ?>
            </div>
            <div class="col-12 col-lg-7 blog-img">
                <img loading="lazy" src="../assets/uploads/<?php echo $livro['imagemLivro']; ?>" alt="<?php echo $livro['legendaImagemLivro']; ?>" />
                <div class="video-social">
                    <div class="video">
                        <?php
                            foreach ($conteudosArray as $conteudo) {
                                if ($conteudo->numeroConteudo == 3) {
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
                                        <img loading="lazy" src="../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" class="video-bg" />
                                        <img loading="lazy" src="../assets/svg/play.svg" alt="Assistir" class="play cursor-pointer" onClick="PopUpVideo('{$videoId}')" />
                                        HTML;
                                }
                            }
                        ?>                        
                    </div>
                    <div class="social">
                        <span>siga minhas redes sociais</span>
                        <div class="social-media">
                            <?php echo $redes; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="learn">
            <h1>O que vai aprender com o livro</h1>
            <div class="learn-swiper">
                <?php
                foreach ($conteudosArray as $conteudo) {
                    if ($conteudo->numeroConteudo == 1) {
                        echo <<<HTML
                            <div class="learn-card">
                                {$conteudo->textoConteudo}
                            </div>
                            HTML;
                    }
                }
                ?>
            </div>
        </section>
        <section class="buy-book">
            <?php
                foreach ($conteudosArray as $conteudo) {
                    if ($conteudo->numeroConteudo == 4) {
                        echo <<<HTML
                            <img loading="lazy" src="../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" class="desktop" />
                            <img loading="lazy" src="../assets/uploads/{$conteudo->imagem2Conteudo}" alt="{$conteudo->legendaImagem2Conteudo}" class="mobile" />
                            <div class="container">
                                <div class="row">
                                <div class="col-12 col-lg-6"></div>
                                <div class="col-12 col-lg-6 content">
                                    <span>Livro</span>
                                    {$conteudo->textoConteudo}
                                    <a href="{$conteudo->linkBotao1}" title="{$conteudo->nomeBotao1}" target="{$conteudo->targetBotao1}" class="blue-btn small">{$conteudo->nomeBotao1}</a>
                                </div>
                                </div>
                            </div>
                            HTML;
                    }
                }
            ?>
            
        </section>
        <section class="others">
            <h1>Outros livros</h1>
            <div class="other-books-swiper">
                <?php 
                    $idPagina = $livro["idPagina"];
                    foreach ($livrosArray as $livro) {
                        if($livro->idPagina != $idPagina){
                            $dataLivro = $livro->dataLivro;
    
                            $mesesEmPortugues = array(
                                "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
                                "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
                            );
    
                            $diaDataLivro = date("d", strtotime($dataLivro));
                            $mesDataLivro = date("m", strtotime($dataLivro));
                            $anoDataLivro = date("y", strtotime($dataLivro));
                            $mesPtDataLivro = $mesesEmPortugues[(int)date("m", strtotime($dataLivro)) - 1];
                            
                            echo <<<HTML
                            <a href="../livro-detalhes/{$livro->nomePagina}" class="card-book-wrapper">
                                <div class="book-card">
                                    <div class="img-container">
                                        <img loading="lazy" src="../assets/uploads/{$livro->imagemLivro}" alt="{$livro->legendaImagemLivro}" />
                                    </div>
                                    <div class="card-content">
                                        <div class="author">
                                            <img loading="lazy" src="../assets/uploads/{$livro->imagemAutorLivro}" alt="{$livro->nomeAutorLivro}" />
                                            <span>{$livro->nomeAutorLivro}</span>
                                        </div>
                                        <h1>{$livro->tituloLivro}</h1>
                                        <p> {$livro->subTituloLivro} </p>
                                        <div class="bottom">
                                            <button class="blue-btn">Veja mais</button>
                                            <div class="date"><span>{$diaDataLivro} de {$mesPtDataLivro} de {$anoDataLivro}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            HTML;
                        }
                    }
                ?>
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
        const learnSwiper = document.querySelector(".learn-swiper");
        window.addEventListener("DOMContentLoaded", () => {
        addContainerClassToDesktop(whiteBg);
        addContainerClassToDesktop(learnSwiper);
        });

        window.addEventListener("resize", () => {
        addContainerClassToDesktop(whiteBg);
        addContainerClassToDesktop(learnSwiper);
        });
    </script>
    <script>
        $(document).ready(function () {
        $(".learn-swiper").slick({
            infinite: true,
            slidesToShow: 3,
            dots: true,
            responsive: [
            {
                breakpoint: 992,
                settings: {
                slidesToShow: 1,
                },
            },
            ],
        });
        $(".other-books-swiper").slick({
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
        });
    </script>
</body>

</html>