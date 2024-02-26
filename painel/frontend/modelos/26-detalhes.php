<?php
include_once "../../assets/componentes.php";
include_once "../../painel/backend/conexao-banco.php";

$nomeDoArquivoCompleto = $_SERVER["SCRIPT_FILENAME"];
$nomeDoArquivoSemExtensao = pathinfo($nomeDoArquivoCompleto, PATHINFO_FILENAME);

$paginaSelecionada = $nomeDoArquivoSemExtensao;

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE nomePagina = :nomePagina AND categoriaId = :categoriaId");
$sqlSeo->bindValue(":nomePagina", $paginaSelecionada);
$sqlSeo->bindValue(":categoriaId", 26);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlArtigos = $con->prepare("SELECT p.*, c.* FROM paginas p, artigos c WHERE c.paginaId = p.idPagina AND c.status = 1");
$sqlArtigos->execute();
$artigosArray = $sqlArtigos->fetchAll(PDO::FETCH_ASSOC);
$artigosArray = json_decode(json_encode($artigosArray));

$sqlDestaque = $con->prepare("SELECT * FROM paginas p, destaques d, artigos b WHERE p.idPagina = d.idItem AND p.idPagina = b.paginaId AND b.status = 1 AND d.categoria = :categoria ORDER BY p.idPagina DESC");
$sqlDestaque->bindValue(":categoria", "pagina-artigo");
$sqlDestaque->execute();
$artigosDestaqueArray = $sqlDestaque->fetchAll(PDO::FETCH_ASSOC);
$artigosDestaqueArray = json_decode(json_encode($artigosDestaqueArray));

$sqlCategorias = $con->prepare("SELECT * FROM categorias c, paginas p WHERE c.paginaId = p.idPagina AND c.tipoCategoria = :tipoCategoria");
$sqlCategorias->bindValue(":tipoCategoria", 5);
$sqlCategorias->execute();
$categoriasArray = $sqlCategorias->fetchAll(PDO::FETCH_ASSOC);
$categoriasArray = json_decode(json_encode($categoriasArray));

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", 25);
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

    <link rel="icon" type="image/svg" href="../../assets/svg/favicon.svg">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="../../css/bootstrap.css" />
    <link rel="stylesheet" href="../../css/global.css" />
    <link rel="stylesheet" href="../../css/artigos.css" />
</head>

<body>
    <?php cHeader(); ?>
    <main>
        <div class="banner-thin">
            <?php 
                foreach ($conteudosArray as $conteudo) {
                    if($conteudo->numeroConteudo == 1){
                        echo <<<HTML
                        <img src="../../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" />
                        HTML;
                    }
                }
            ?>
        </div>
        <section class="swiper-banner-articles">
            <?php 
                foreach ($artigosDestaqueArray as $artigo) {
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
                    <a href="/artigo-detalhes/{$artigo->nomePagina}" title="{$artigo->tituloPagina}">
                        <div class="banner-article-card">
                            <img loading="lazy" src="../../assets/uploads/{$artigo->imagemBlog}" alt="{$artigo->legendaImagemBlog}" />
                            <div class="info">
                            <span>{$nomeCategoriaBlog}</span><span>{$diaDataBlog} de {$mesPtDataBlog} de {$anoDataBlog}</span>
                            <h1 class="limit-text">{$artigo->tituloBlog}</h1>
                            <div class="bottom">
                                <span class="read-more">Ler Mais <img loading="lazy" src="../../assets/svg/seta-branca.svg" alt="Ler mais" /></span>
                                <div class="author">
                                <img loading="lazy" src="../../assets/uploads/{$artigo->imagemAutorBlog}" alt="{$artigo->nomeAutorBlog}" />
                                <span>{$artigo->nomeAutorBlog}</span>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                    HTML;
                }
            ?>
        </section>
        <section class="content">
            <div>
                <div class="row">
                <div class="col-lg-4 col-12 filters">
                    <div class="container">
                    <div class="search">
                        <input type="text" placeholder="Pesquisar..." />
                        <button>
                        <img loading="lazy" src="../../assets/svg/pesquisar.svg" alt="Pesquisar" />
                        </button>
                    </div>
                    <hr />
                    <div class="filter" data-filter="category">
                        <button data-url="/artigos" data-category="" data-count="34">
                        Todas as Categorias
                        </button>
                        <?php
                            foreach ($categoriasArray as $categoria) {
                                echo <<<HTML
                                <button data-url="/artigo-detalhes/categorias/{$categoria->nomePagina}" title="{$categoria->tituloPagina}" data-category="{$categoria->idCategoria}" data-count="7">{$categoria->nomeCategoria}</butt>
                                HTML;
                            }
                        ?>
                    </div>
                    <div class="container tag-filter desktop">
                        <?php
                            foreach ($artigosArray as $row) {
                                $tagsBlog = $row->tagsBlog;

                                $tags = explode(",", $tagsBlog);

                                foreach ($tags as &$tag) {
                                    echo <<<HTML
                                    <button data-tag="{$tag}">{$tag}</button>
                                    HTML;
                                }
                            }
                        ?>
                    </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 articles">
                    <div>
                        <div class="counter-title">
                            <span>Você está vendo 0 artigos</span>
                        </div>
                        <?php 
                            foreach ($artigosArray as $artigo) {
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
                                <a href="../../artigo-detalhes/{$artigo->nomePagina}" class="article-card-wrapper"  data-category="{$categoriasBlog}" data-tag="{$artigo->tagsBlog}" data-month="{$mesDataBlog}"
                                    data-year="{$anoDataBlog}">
                                    <div class="article-card">
                                        <img loading="lazy" src="../../assets/png/artigo.png" alt="Evento" />
                                        <div class="card-content">
                                            <span>{$nomeCategoriaBlog}</span><span>{$diaDataBlog} de {$mesPtDataBlog} de {$anoDataBlog}</span>
                                            <h1 class="limit-text">{$artigo->tituloBlog}</h1>
                                            <p class="limit-text">{$artigo->subTituloBlog}</p>
                                            <div class="actions">
                                            <button class="blue-btn small">
                                                Veja mais
                                            </button>
                                            <div class="author">
                                                <img loading="lazy" src="../../assets/uploads/{$artigo->imagemAutorBlog}" alt="{$artigo->nomeAutorBlog}" />
                                                <span>{$artigo->nomeAutorBlog}</span>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                </a>
                                HTML;
                            }
                        ?>
                        <button class="load-more blue-btn center" onclick="loadMore(listElements)">
                            Carregar Mais
                        </button>
                        <div class="container tag-filter mobile">
                            <?php
                                foreach ($artigosArray as $row) {
                                    $tagsBlog = $row->tagsBlog;

                                    $tags = explode(",", $tagsBlog);

                                    foreach ($tags as &$tag) {
                                        echo <<<HTML
                                        <button data-tag="{$tag}">{$tag}</button>
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
        <?php echo tabs(); ?>
        <?php echo formEmailNewsletter(); ?>
    </main>
    <?php cFooter(); ?>
    <?php elementosGerais(); ?>
    <?php scriptBody(); ?>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="../../javascript/global.js"></script>
    <script>
        $(document).ready(function () {
        $(".swiper-banner-articles").slick({
            infinite: true,
            slidesToShow: 2,
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
        });
        $(document).ready(function () {
        $(".swiper-saiu-na-midia").slick({
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
        $(".swiper-blog").slick({
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
        $(".swiper-artigos").slick({
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
        $(".swiper-eventos").slick({
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
    <script>
        let maxVisibleElements = 6;
        const listElements = document.querySelectorAll(".article-card-wrapper");
    </script>
    <script>
        const swiperArticles = document.querySelector(".swiper-banner-articles");
        const contentContainer = document.querySelector(".content > div");
        window.addEventListener("resize", () => {
        addContainerClassToDesktop(swiperArticles);
        addContainerClassToDesktop(contentContainer);
        });

        window.addEventListener("DOMContentLoaded", () => {
        addContainerClassToDesktop(swiperArticles);
        addContainerClassToDesktop(contentContainer);
        });
    </script>
    <script src="../../javascript/filter.js"></script>
    <script>
        window.addEventListener("DOMContentLoaded", () => {
            const visibleArticles = document.querySelectorAll('.article-card-wrapper[style^="display: block"]');
            visibleArticles.forEach((element, index) => {
                if (!(index % 2)) {
                    element.classList.add('invert');
                }
            });
        })
    </script>
</body>

</html>