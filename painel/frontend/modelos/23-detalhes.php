<?php
include_once "../../assets/componentes.php";
include_once "../../painel/backend/conexao-banco.php";

$nomeDoArquivoCompleto = $_SERVER["SCRIPT_FILENAME"];
$nomeDoArquivoSemExtensao = pathinfo($nomeDoArquivoCompleto, PATHINFO_FILENAME);

$paginaSelecionada = $nomeDoArquivoSemExtensao;

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE nomePagina = :nomePagina AND categoriaId = :categoriaId");
$sqlSeo->bindValue(":nomePagina", $paginaSelecionada);
$sqlSeo->bindValue(":categoriaId", 23);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlPodcasts = $con->prepare("SELECT * FROM podcasts WHERE status = 1");
$sqlPodcasts->execute();
$podcastsArray = $sqlPodcasts->fetchAll(PDO::FETCH_ASSOC);
$podcastsArray = json_decode(json_encode($podcastsArray));

$sqlCategorias = $con->prepare("SELECT * FROM categorias c, paginas p WHERE c.paginaId = p.idPagina AND c.tipoCategoria = :tipoCategoria");
$sqlCategorias->bindValue(":tipoCategoria", 4);
$sqlCategorias->execute();
$categoriasArray = $sqlCategorias->fetchAll(PDO::FETCH_ASSOC);
$categoriasArray = json_decode(json_encode($categoriasArray));

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", 15);
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
    <link rel="stylesheet" href="../../css/podcast.css" />
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
                                <button data-url="/podcast" data-category="" data-count="34">
                                    Todas as Categorias
                                </button>
                                <?php
                                    foreach ($categoriasArray as $categoria) {
                                        echo <<<HTML
                                        <button data-url="/podcast-detalhes/categorias/{$categoria->nomePagina}" title="{$categoria->tituloPagina}" data-category="{$categoria->idCategoria}" data-count="7">{$categoria->nomeCategoria}</button>
                                        HTML;
                                    }
                                ?>
                            </div>
                            <div class="container tag-filter desktop">
                                <?php
                                    foreach ($podcastsArray as $row) {
                                        $tagsPodcast = $row->tagsPodcast;

                                        $tags = explode(",", $tagsPodcast);

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
                                <span>Você está vendo 0 podcasts</span>
                            </div>
                            <?php 
                                foreach ($podcastsArray as $podcast) {
                                    $dataPodcast = $podcast->dataPodcast;
                                    $categoriasId = $podcast->categoriasId;

                                    $mesesEmPortugues = array(
                                        "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
                                        "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
                                    );

                                    $diaDataPodcast = date("d", strtotime($dataPodcast));
                                    $mesDataPodcast = date("m", strtotime($dataPodcast));
                                    $anoDataPodcast = date("y", strtotime($dataPodcast));
                                    $mesPtDataPodcast = $mesesEmPortugues[(int)date("m", strtotime($dataPodcast)) - 1];

                                    $primeiraCategoriaPodcast = json_decode($categoriasId);
                                    if($primeiraCategoriaPodcast){
                                        $primeiraCategoriaPodcast = $primeiraCategoriaPodcast[0];

                                        foreach ($categoriasArray as $rowCat) {
                                            if($rowCat->idCategoria == $primeiraCategoriaPodcast){
                                                $nomeCategoriaPodcast = $rowCat->nomeCategoria;
                                            }
                                        }

                                    }
                                    else{
                                        $nomeCategoriaPodcast = "";
                                    }

                                    // Remove colchetes e aspas de cada parte entre vírgulas
                                    $categoriasPodcast = preg_replace('/\["(.*?)"]/', '$1', $categoriasId);

                                    // Divide a string em um array usando "," como delimitador
                                    $categoriasPodcast = explode(',', $categoriasPodcast);

                                    // Transforma o array em uma string separada por ","
                                    $categoriasPodcast = implode(',', $categoriasPodcast);
                                    
                                    echo <<<HTML
                                        <div class="podcast-card-wrapper" data-category="{$categoriasPodcast}" data-tag="{$podcast->tagsPodcast}" >
                                            <div class="accordion accordion-podcast">
                                                <div class="title">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-5 podcast-img">
                                                            <img loading="lazy" src="../../assets/uploads/{$podcast->imagemPodcast}" alt="{$podcast->legendaImagemPodcast}" />
                                                        </div>
                                                        <div class="col-12 col-lg-7 podcast-details">
                                                            <div class="categories">
                                                                <span>{$nomeCategoriaPodcast}</span><span>feat. {$podcast->nomeAutorPodcast}</span>
                                                            </div>
                                                            <h1>{$podcast->tituloPodcast}</h1>
                                                            <div class="episode-info">
                                                                <button class="blue-btn">Ouvir</button
                                                                ><button class="play">
                                                                <img loading="lazy" src="../../assets/svg/play-red.svg" alt="Play" />
                                                                </button>
                                                                <div class="episode"><span>Episódio {$podcast->qtdEpPodcast}</span></div>
                                                                <div class="length"><span>{$podcast->tempoPodcast}min</span></div>
                                                            </div>
                                                            <div class="date">
                                                                <span>{$diaDataPodcast} de {$mesPtDataPodcast} de {$anoDataPodcast}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel">
                                                    {$podcast->iframePodcast}
                                                </div>
                                            </div>
                                        </div>
                                    HTML;
                                }
                            ?>
                            <button class="load-more blue-btn center" onclick="loadMore(listElements, 3)" >
                                Carregar Mais
                            </button>
                            <div class="container tag-filter mobile">
                                <?php
                                    foreach ($podcastsArray as $row) {
                                        $tagsPodcast = $row->tagsPodcast;

                                        $tags = explode(",", $tagsPodcast);

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
      const paginaCategoria = "podcast-categoria";
      const listElements = document.querySelectorAll(".podcast-card-wrapper");
       
      sessionStorage.setItem("t", "");
      sessionStorage.setItem("y", new Date().getFullYear().toString().substring(2, 2));
      sessionStorage.setItem("m", "");

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