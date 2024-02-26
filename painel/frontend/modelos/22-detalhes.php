<?php
include_once "../../assets/componentes.php";
include_once "../../painel/backend/conexao-banco.php";

$nomeDoArquivoCompleto = $_SERVER["SCRIPT_FILENAME"];
$nomeDoArquivoSemExtensao = pathinfo($nomeDoArquivoCompleto, PATHINFO_FILENAME);

$paginaSelecionada = $nomeDoArquivoSemExtensao;

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE nomePagina = :nomePagina AND categoriaId = :categoriaId");
$sqlSeo->bindValue(":nomePagina", $paginaSelecionada);
$sqlSeo->bindValue(":categoriaId", 22);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlVideos = $con->prepare("SELECT * FROM videos WHERE status = 1");
$sqlVideos->execute();
$videosArray = $sqlVideos->fetchAll(PDO::FETCH_ASSOC);
$videosArray = json_decode(json_encode($videosArray));

$sqlCategorias = $con->prepare("SELECT * FROM categorias c, paginas p WHERE c.paginaId = p.idPagina AND c.tipoCategoria = :tipoCategoria");
$sqlCategorias->bindValue(":tipoCategoria", 3);
$sqlCategorias->execute();
$categoriasArray = $sqlCategorias->fetchAll(PDO::FETCH_ASSOC);
$categoriasArray = json_decode(json_encode($categoriasArray));

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", 14);
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

    <link rel="icon" type="image/svg" href="../../assets/svg/favicon.svg">
    <link rel="stylesheet" href="../../css/global.css" />
    <link rel="stylesheet" href="../../css/bootstrap.css" />
    <link rel="stylesheet" href="../../css/videos.css" />
</head>


<body>
    <?php cHeader(); ?>
    <main>
        <div class="banner">
            <?php 
                foreach ($conteudosArray as $conteudo) {
                    if($conteudo->numeroConteudo == 1){
                        echo <<<HTML
                        <img class="img-background desktop" src="../../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" />
                        <img class="img-background mobile" src="../../assets/uploads/{$conteudo->imagem2Conteudo}" alt="{$conteudo->legendaImagem2Conteudo}" />
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6 bloco-1">
                                    <div class="title">
                                        <p>{$conteudo->tituloConteudo}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 bloco-2"></div>
                            </div>
                        </div>
                        HTML;
                    }
                }
            ?>
        </div>
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
                                <button data-url="/videos" data-category="" data-count="34">
                                Todas as Categorias
                                </button>
                                <?php
                                    foreach ($categoriasArray as $categoria) {
                                        echo <<<HTML
                                        <button data-url="/video-detalhes/categorias/{$categoria->nomePagina}" title="{$categoria->tituloPagina}" data-category="{$categoria->idCategoria}" data-count="7">{$categoria->nomeCategoria}</button>
                                        HTML;
                                    }
                                ?>
                            </div>
                            <div class="container tag-filter desktop">
                                <?php
                                    foreach ($videosArray as $row) {
                                        $tagsVideo = $row->tagsVideo;

                                        $tags = explode(",", $tagsVideo);

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
                    <div class="col-lg-8 col-12 blog">
                        <div>
                            <div class="counter-title">
                                <span>Você está vendo 0 vídeos</span>
                            </div>
                            <div class="row">
                                <?php 
                                    foreach ($videosArray as $video) {
                                        $dataVideo = $video->dataVideo;
                                        $categoriasId = $video->categoriasId;

                                        $mesesEmPortugues = array(
                                            "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
                                            "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
                                        );

                                        $diaDataVideo = date("d", strtotime($dataVideo));
                                        $mesDataVideo = date("m", strtotime($dataVideo));
                                        $anoDataVideo = date("y", strtotime($dataVideo));
                                        $mesPtDataVideo = $mesesEmPortugues[(int)date("m", strtotime($dataVideo)) - 1];

                                        $primeiraCategoriaVideo = json_decode($categoriasId);
                                        if($primeiraCategoriaVideo){
                                            $primeiraCategoriaVideo = $primeiraCategoriaVideo[0];

                                            foreach ($categoriasArray as $rowCat) {
                                                if($rowCat->idCategoria == $primeiraCategoriaVideo){
                                                    $nomeCategoriaVideo = $rowCat->nomeCategoria;
                                                }
                                            }

                                        }
                                        else{
                                            $nomeCategoriaVideo = "";
                                        }

                                        // Remove colchetes e aspas de cada parte entre vírgulas
                                        $categoriasVideo = preg_replace('/\["(.*?)"]/', '$1', $categoriasId);

                                        // Divide a string em um array usando "," como delimitador
                                        $categoriasVideo = explode(',', $categoriasVideo);

                                        // Transforma o array em uma string separada por ","
                                        $categoriasVideo = implode(',', $categoriasVideo);

                                        $linkVideo = $video->iframeVideo;

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
                                            <div class="col-12 col-lg-6 video-card-wrapper" data-category="{$categoriasVideo}" data-tag="{$video->tagsVideo}">
                                                <div class="video-card">
                                                    <iframe loading="lazy" src="https://www.youtube.com/embed/{$videoId}" width="100%" height="100%" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                    <h1 class="limit-text">
                                                        {$video->tituloVideo}
                                                    </h1>
                                                    <div class="bottom">
                                                        <span>{$diaDataVideo} de {$mesPtDataVideo} de {$anoDataVideo}</span>
                                                        <div class="category"><span>{$nomeCategoriaVideo}</span></div>
                                                        <div class="author">
                                                            <img loading="lazy" src="../../assets/uploads/{$video->imagemAutorVideo}" alt="{$video->nomeAutorVideo}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        HTML;
                                    }
                                ?>
                            </div>
                            <button class="load-more blue-btn center" onclick="loadMore(listElements)">
                                Carregar Mais
                            </button>
                            <div class="container tag-filter mobile">
                                <?php
                                    foreach ($videosArray as $row) {
                                        $tagsVideo = $row->tagsVideo;

                                        $tags = explode(",", $tagsVideo);

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
        <?php echo formEmailNewsletter(); ?>
    </main>
    <?php cFooter(); ?>
    <?php elementosGerais(); ?>
    <?php scriptBody(); ?>
    <script src="../../javascript/global.js"></script>
    <script>
        let maxVisibleElements = 6;
        const paginaCategoria = "videos-categoria";
        const listElements = document.querySelectorAll(".video-card-wrapper");

        const contentContainer = document.querySelector(".content > div");

        window.addEventListener("resize", () => {
        addContainerClassToDesktop(contentContainer);
        });

        window.addEventListener("DOMContentLoaded", () => {
        addContainerClassToDesktop(contentContainer);
        });
    </script>
    <script src="../../javascript/filter.js"></script>
</body>

</html>