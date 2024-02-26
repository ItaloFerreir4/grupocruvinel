<?php
include_once "../assets/componentes.php";
include_once "../painel/backend/conexao-banco.php";

$nomeDoArquivoCompleto = $_SERVER["SCRIPT_FILENAME"];
$nomeDoArquivoSemExtensao = pathinfo($nomeDoArquivoCompleto, PATHINFO_FILENAME);

$paginaSelecionada = $nomeDoArquivoSemExtensao;

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE nomePagina = :nomePagina AND categoriaId = :categoriaId");
$sqlSeo->bindValue(":nomePagina", $paginaSelecionada);
$sqlSeo->bindValue(":categoriaId", 9);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlEventos = $con->prepare("SELECT p.*, c.* FROM paginas p, eventos c WHERE c.paginaId = :idPagina AND c.paginaId = p.idPagina AND c.status = 1");
$sqlEventos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlEventos->execute();
$evento = $sqlEventos->fetch(PDO::FETCH_ASSOC);

$sqlEventos = $con->prepare("SELECT p.*, c.* FROM paginas p, eventos c WHERE c.paginaId = p.idPagina AND c.status = 1");
$sqlEventos->execute();
$eventosArray = $sqlEventos->fetchAll(PDO::FETCH_ASSOC);
$eventosArray = json_decode(json_encode($eventosArray));

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
    <link rel="stylesheet" href="../css/evento-detalhes.css" />
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
                                            <a href="../eventos">Eventos</a>
                                        </div>
                                        <p>{$evento["tituloEvento"]}</p>
                                        <div class="bottom">
                                        <a href="#sobreEvento">Ler mais</a>
                                        <div class="caption-social-media">
                                            <span>Compartilhar: </span>
                                            <div class="social-media">
                                                {$redes}
                                            </div>
                                        </div>
                                        <div class="date">
                                            <h2>{$evento["dataEvento"]}</h2>
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
        <section class="content" id="sobreEvento">
            <section class="white-bg">
                <?php echo $evento["textoEvento"]; ?>
            </section>
        </section>
        <section class="watch-video-background">
            <?php
            foreach ($conteudosArray as $conteudo) {
                if ($conteudo->numeroConteudo == 2) {
                    echo <<<HTML
                        <img loading="lazy" class="desktop" src="../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" />
                        <img loading="lazy" class="mobile" src="../assets/uploads/{$conteudo->imagem2Conteudo}" alt="{$conteudo->legendaImagem2Conteudo}" />
                        <div class="watch-button">
                            <img loading="lazy" src="../assets/svg/play.svg" alt="Assistir" />
                            <span>{$conteudo->textoConteudo}</span>
                        </div>
                        HTML;
                }
            }
            ?>
        </section>
        <section class="others">
            <h1>Outros eventos</h1>
            <div class="other-events-swiper">
                <?php 
                    $idEvento = $evento["idEvento"];
                    foreach ($eventosArray as $evento) {
                        if($evento->idEvento != $idEvento){
                            $dataEvento = $evento->dataEvento;

                            $mesesEmPortugues = array(
                                "Jan", "Fev", "Mar", "Abr", "Mai", "Jun",
                                "Jul", "Ago", "Set", "Out", "Nov", "Dez"
                            );

                            $diaDataEvento = date("d", strtotime($dataEvento));
                            $mesDataEvento = date("m", strtotime($dataEvento));
                            $anoDataEvento = date("y", strtotime($dataEvento));
                            $mesPtDataEvento = $mesesEmPortugues[(int)date("m", strtotime($dataEvento)) - 1];
                            
                            echo <<<HTML
                            <a href="../evento-detalhes/{$evento->nomePagina}" title="{$evento->tituloPagina}">
                                <div class="event-card">
                                    <img loading="lazy" src="../assets/uploads/{$evento->imagemEvento}" alt="{$evento->legendaImagemEvento}" />
                                    <div class="card-content">
                                        <span>{$diaDataEvento} {$mesPtDataEvento}</span><span>{$evento->localEvento}</span>
                                        <h1 class="limit-text">{$evento->tituloEvento}</h1>
                                        <div class="actions">
                                        <button class="blue-btn small">
                                            Veja mais
                                        </button>
                                        <div class="author">
                                            <img loading="lazy" src="../assets/uploads/{$evento->imagemAutorEvento}" alt="{$evento->nomeAutorEvento}" />
                                            <span>{$evento->nomeAutorEvento}</span>
                                        </div>
                                        </div>
                                    </div>
                                    <hr /> 
                                </div>
                            </a>
                            HTML;
                        }
                    }
                ?>
            </div>
            <a href="../eventos" class="blue-btn center small">Abrir mais</a>
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
        $(".other-events-swiper").slick({
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

</body>

</html>