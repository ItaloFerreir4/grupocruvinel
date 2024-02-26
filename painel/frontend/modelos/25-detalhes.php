<?php
include_once "../assets/componentes.php";
include_once "../painel/backend/conexao-banco.php";

$nomeDoArquivoCompleto = $_SERVER["SCRIPT_FILENAME"];
$nomeDoArquivoSemExtensao = pathinfo($nomeDoArquivoCompleto, PATHINFO_FILENAME);

$paginaSelecionada = $nomeDoArquivoSemExtensao;

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE nomePagina = :nomePagina AND categoriaId = :categoriaId");
$sqlSeo->bindValue(":nomePagina", $paginaSelecionada);
$sqlSeo->bindValue(":categoriaId", 25);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlArtigos = $con->prepare("SELECT p.*, c.* FROM paginas p, artigos c WHERE c.paginaId = :idPagina AND c.paginaId = p.idPagina");
$sqlArtigos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlArtigos->execute();
$artigo = $sqlArtigos->fetch(PDO::FETCH_ASSOC);

$sqlArtigos = $con->prepare("SELECT p.*, c.* FROM paginas p, artigos c WHERE c.paginaId = p.idPagina AND c.status = 1");
$sqlArtigos->execute();
$artigosArray = $sqlArtigos->fetchAll(PDO::FETCH_ASSOC);
$artigosArray = json_decode(json_encode($artigosArray));

$sqlCategorias = $con->prepare("SELECT * FROM categorias c, paginas p WHERE c.paginaId = p.idPagina AND c.tipoCategoria = :tipoCategoria");
$sqlCategorias->bindValue(":tipoCategoria", 5);
$sqlCategorias->execute();
$categoriasArray = $sqlCategorias->fetchAll(PDO::FETCH_ASSOC);
$categoriasArray = json_decode(json_encode($categoriasArray));

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlConteudos->execute();
$conteudosArray = $sqlConteudos->fetchAll(PDO::FETCH_ASSOC);
$conteudosArray = json_decode(json_encode($conteudosArray));

ob_start();
redesSociais("preto");
$redes = ob_get_clean();
redesSociaisCompartilhar("branco");
$redesCompartilhar = ob_get_clean();

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
    <link rel="stylesheet" href="../css/artigo-detalhes.css" />
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
                                            <a href="../artigos">Artigos</a>
                                        </div>
                                        <p>{$artigo["tituloBlog"]}</p>
                                        <div class="bottom">
                                            <a href="#textoArtigo">Ler mais</a>
                                            <div class="caption-social-media">
                                                <span>Compartilhar: </span>
                                                <div class="social-media">
                                                    {$redesCompartilhar}
                                                </div>
                                            </div>
                                            <div class="date">
                                                <h2>{$artigo["dataBlog"]}</h2>
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
        <section class="content">
            <section class="white-bg">
                <div class="article-img">
                    <img loading="lazy" src="../assets/uploads/<?php echo $artigo['imagemBlog']; ?>" alt="<?php echo $artigo['legendaImagemBlog']; ?>" />
                    <div class="tags">
                        <?php
                            $tagsBlog = $artigo['tagsBlog'];

                            $tags = explode(",", $tagsBlog);

                            foreach ($tags as &$tag) {
                                echo <<<HTML
                                <span>{$tag}</span>
                                HTML;
                            }
                        ?>
                    </div>
                </div>
                <?php echo $artigo['textoBlog']; ?>
            </section>
        </section>
        <div class="bio">
            <img loading="lazy" src="../assets/png/fundo-bio.png" alt="Fundo" class="desktop" />
            <h1>SOBRE O AUTOR</h1>
            <div class="bio-info container">
                <?php
                foreach ($conteudosArray as $conteudo) {
                    if ($conteudo->numeroConteudo == 2) {
                        echo <<<HTML
                            <img loading="lazy" src="../assets/svg/fundo-bio-info.svg" alt="Fundo" />
                            <div class="row">
                                <div class="col-12 col-lg-6 info-column">
                                    <h1>{$conteudo->tituloConteudo}</h1>
                                    {$conteudo->textoConteudo}
                                    <a href="{$conteudo->linkBotao1}" class="blue-btn small" title="{$conteudo->nomeBotao1}" target="{$conteudo->targetBotao1}">{$conteudo->nomeBotao1}</a>
                                    <span class="social-media-caption">Siga minhas redes sociais</span>
                                    <div class="social-media">
                                        {$redes}
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 img-column">
                                    <div class="bio-info-img-wrapper">
                                    <img loading="lazy" src="../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" class="bio-info-img" />
                                    </div>
                                </div>
                            </div>
                            HTML;
                    }
                }
                ?>

            </div>
        </div>
        <section class="others">
            <h1>Leia outros <strong>artigos</strong></h1>
            <div class="other-articles-swiper">
                <?php 
                    $idPagina = $artigo["idPagina"];
                    foreach ($artigosArray as $artigo) {
                        if($artigo->idPagina != $idPagina){
                            $dataBlog = $artigo->dataBlog;
                            $categoriasId = $artigo->categoriasId;

                            $mesesEmPortugues = array(
                                "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
                                "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
                            );

                            $diaDataBlog = date("d", strtotime($dataBlog));
                            $mesDataBlog = date("m", strtotime($dataBlog));
                            $anoDataBlog = date("y", strtotime($dataBlog));
                            $mesPtDataBlog = $mesesEmPortugues[(int)date("m", strtotime($dataBlog)) - 1];

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

                            // Remove colchetes e aspas de cada parte entre vírgulas
                            $categoriasBlog = preg_replace('/\["(.*?)"]/', '$1', $categoriasId);

                            // Divide a string em um array usando "," como delimitador
                            $categoriasBlog = explode(',', $categoriasBlog);

                            // Transforma o array em uma string separada por ","
                            $categoriasBlog = implode(',', $categoriasBlog);
                            
                            echo <<<HTML
                            <a href="../artigo-detalhes/{$artigo->nomePagina}" data-tag="{$categoriasBlog}" data-month="{$mesDataBlog}"
                                data-year="{$anoDataBlog}">
                                <div class="article-card">
                                    <img loading="lazy" src="../assets/uploads/{$artigo->imagemBlog}" alt="{$artigo->legendaImagemBlog}" />
                                    <div class="card-content">
                                        <span>{$nomeCategoriaBlog}</span><span>{$diaDataBlog} de {$mesPtDataBlog} de {$anoDataBlog}</span>
                                        <h1>{$artigo->tituloBlog}</h1>
                                        <p>{$artigo->subTituloBlog}</p>
                                        <div class="actions">
                                        <button class="blue-btn small">
                                            Veja mais
                                        </button>
                                        <div class="author">
                                            <img loading="lazy" src="../assets/uploads/{$artigo->imagemAutorBlog}" alt="{$artigo->nomeAutorBlog}" />
                                            <span>{$artigo->nomeAutorBlog}</span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            </a>
                            HTML;
                        }
                    }
                ?>
            </div>
            <a href="../artigos" class="blue-btn center small">Abrir mais</a>
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
        $(".other-articles-swiper").slick({
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
    <script>
        let maxVisibleElements = 6;
        const listElements = document.querySelectorAll(".article-card-wrapper");
    </script>
    <script src="../javascript/filter.js"></script>
</body>

</html>