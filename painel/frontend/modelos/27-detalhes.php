<?php
include_once "../assets/componentes.php";
include_once "../painel/backend/conexao-banco.php";

$nomeDoArquivoCompleto = $_SERVER["SCRIPT_FILENAME"];
$nomeDoArquivoSemExtensao = pathinfo($nomeDoArquivoCompleto, PATHINFO_FILENAME);

$paginaSelecionada = $nomeDoArquivoSemExtensao;

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE nomePagina = :nomePagina AND categoriaId = :categoriaId");
$sqlSeo->bindValue(":nomePagina", $paginaSelecionada);
$sqlSeo->bindValue(":categoriaId", 27);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlLivros = $con->prepare("SELECT p.*, c.* FROM paginas p, livros c WHERE c.paginaId = :idPagina AND c.paginaId = p.idPagina AND c.status = 1");
$sqlLivros->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlLivros->execute();
$livro = $sqlLivros->fetch(PDO::FETCH_ASSOC);

$sqlLivros = $con->prepare("SELECT p.*, c.* FROM paginas p, livros c WHERE c.paginaId = p.idPagina AND c.tipoLivro = :tipoLivro AND c.status = 1");
$sqlLivros->bindValue(":tipoLivro", 'E-book');
$sqlLivros->execute();
$livrosArray = $sqlLivros->fetchAll(PDO::FETCH_ASSOC);
$livrosArray = json_decode(json_encode($livrosArray));

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlConteudos->execute();
$conteudosArray = $sqlConteudos->fetchAll(PDO::FETCH_ASSOC);
$conteudosArray = json_decode(json_encode($conteudosArray));

$sqlFormulario = $con->prepare("SELECT * FROM formularios WHERE paginaId = :paginaId");
$sqlFormulario->bindValue(":paginaId", $conteudoSeo["idPagina"]);
$sqlFormulario->execute();
$formulario = $sqlFormulario->fetch(PDO::FETCH_ASSOC);

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
    <link rel="stylesheet" href="../css/ebook-detalhes.css" />
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
                                            <a href="../ebooks">Ebooks</a>
                                        </div>
                                        <p>{$livro["tituloLivro"]}</p>
                                        <div class="bottom">
                                            <a href="#textoLivro">Ler mais</a>
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
        <section class="content" id="textoLivro">
            <section class="row white-bg">
                <div class="col-12 col-lg-6 about">
                    <?php echo $livro['textoLivro']; ?>
                </div>
                <div class="col-12 col-lg-6 download">
                    <form id="formulario-1">
                        <input type="hidden" name="origem" id="origem" value="formulario">
                        <input type="hidden" name="quemRecebe" id="quemRecebe" value="<?php echo $formulario['emailFormulario'] ?>">
                        <input type="hidden" name="tituloPagina" id="tituloPagina" value="">
                        <input type="hidden" name="linkEbook" id="linkEbook" value="<?php echo $formulario['select1Formulario'] ?>">
                        <input type="text" name="contatoNome" id="contatoNome" placeholder="Nome:" />
                        <input type="text" name="contatoEmail" id="contatoEmail" placeholder="E-mail:" />
                        <input type="text" name="contatoTelefone" id="contatoTelefone" placeholder="Telefone:" onkeyup="mascaraTel(this);" maxlength="15" />
                        <button type="button" class="blue-btn botao-enviar" onClick="EnviarFormulario(1)">Fazer Download</button>
                        <label for="email-checkbox"><input id="email-checkbox" type="checkbox" name="contatoTermo" id="contatoTermo" />Lorem ipsum dolor sit
                        amet consectetur adipisicing elit.
                        Voluptatum, necessitatibus?</label>
                    </form>
                </div>
            </section>
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
        <div class="watch-video-background">
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
                        <img loading="lazy" class="desktop" src="../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" />
                        <img loading="lazy" class="mobile" src="../assets/uploads/{$conteudo->imagem2Conteudo}" alt="{$conteudo->legendaImagem2Conteudo}" />
                        <div class="watch-button cursor-pointer" onClick="PopUpVideo('{$videoId}')">
                            <img loading="lazy" src="../assets/svg/play.svg" alt="Assistir" />
                            <span>{$conteudo->textoConteudo}</span>
                        </div>
                        HTML;
                }
            }
            ?>
        </div>
        <section class="others">
            <h1>Outros ebooks</h1>
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
                            <a href="./ebook-detalhes/{$livro->nomePagina}" class="ebook-card-wrapper">
                            <div class="ebook-card">
                                <img loading="lazy" src="assets/uploads/{$livro->imagemLivro}" alt="{$livro->legendaImagemLivro}" />
                                <div class="card-content">
                                    <div class="author">
                                        <img loading="lazy" src="assets/uploads/{$livro->imagemAutorLivro}" alt="{$livro->nomeAutorLivro}" />
                                        <span>{$livro->nomeAutorLivro}</span>
                                    </div>
                                    <h1 class="limit-text">{$livro->tituloLivro}</h1>
                                    <p class="limit-text">{$livro->subTituloLivro}</p>
                                    <div class="bottom">
                                        <button class="blue-btn">Veja mais</button>
                                        <div class="date">
                                            <span>{$diaDataLivro} de {$mesPtDataLivro} de {$anoDataLivro}</span>
                                        </div>
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