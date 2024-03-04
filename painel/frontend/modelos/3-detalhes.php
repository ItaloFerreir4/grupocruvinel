<?php
include_once "../assets/componentes.php";
include_once "../painel/backend/conexao-banco.php";

$nomeDoArquivoCompleto = $_SERVER["SCRIPT_FILENAME"];
$nomeDoArquivoSemExtensao = pathinfo($nomeDoArquivoCompleto, PATHINFO_FILENAME);

$paginaSelecionada = $nomeDoArquivoSemExtensao;

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE nomePagina = :nomePagina AND categoriaId = :categoriaId");
$sqlSeo->bindValue(":nomePagina", $paginaSelecionada);
$sqlSeo->bindValue(":categoriaId", 3);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlBusiness = $con->prepare("SELECT p.*, c.* FROM paginas p, business c WHERE c.paginaId = :idPagina AND c.paginaId = p.idPagina AND c.status = 1");
$sqlBusiness->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlBusiness->execute();
$business = $sqlBusiness->fetch(PDO::FETCH_ASSOC);

$sqlBusiness = $con->prepare("SELECT p.*, c.* FROM paginas p, business c WHERE c.paginaId = p.idPagina AND c.status = 1");
$sqlBusiness->execute();
$businessArray = $sqlBusiness->fetchAll(PDO::FETCH_ASSOC);
$businessArray = json_decode(json_encode($businessArray));

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlConteudos->execute();
$conteudosArray = $sqlConteudos->fetchAll(PDO::FETCH_ASSOC);
$conteudosArray = json_decode(json_encode($conteudosArray));

$sqlServicos = $con->prepare("SELECT * FROM servicos WHERE status = 1");
$sqlServicos->execute();
$servicosArray = $sqlServicos->fetchAll(PDO::FETCH_ASSOC);
$servicosArray = json_decode(json_encode($servicosArray));

$sqlEmpresas = $con->prepare("SELECT p.*, c.* FROM paginas p, business c WHERE c.paginaId = p.idPagina AND c.status = 1");
$sqlEmpresas->execute();
$empresasArray = $sqlEmpresas->fetchAll(PDO::FETCH_ASSOC);
$empresasArray = json_decode(json_encode($empresasArray));

$sqlFormulario = $con->prepare("SELECT * FROM formularios WHERE paginaId = :paginaId");
$sqlFormulario->bindValue(":paginaId", $conteudoSeo["idPagina"]);
$sqlFormulario->execute();
$formulario = $sqlFormulario->fetch(PDO::FETCH_ASSOC);

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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/empresa-detalhes.css">
</head>

<body>
    <?php cHeader(); ?>
    <section class="banner">
        <?php
        foreach ($conteudosArray as $conteudo) {
            if ($conteudo->numeroConteudo == 1) {
                echo <<<HTML
                <img class="img-background desktop" src="../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}">
                <img class="img-background mobile" src="../assets/uploads/{$conteudo->imagem2Conteudo}" alt="{$conteudo->legendaImagem2Conteudo}">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6 bloco-1">
                            <div class="title">
                                <p>{$business['nomeBusiness']}</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 bloco-2">
                            <img src="../assets/uploads/{$business['imagemBusiness']}" alt="{$business['legendaImagemBusiness']}">
                        </div>
                    </div>
                </div>
                HTML;
            }
        }
        ?>

    </section>
    <section class="about">
        <div class="shaped-content container">
            <div class="row">
                <div class="col-12 col-lg-6 company-image">
                    <div class="img-wrapper">
                        <?php
                        foreach ($conteudosArray as $conteudo) {
                            if ($conteudo->numeroConteudo == 4) {
                                echo <<<HTML
                                <img src="../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}">
                                HTML;
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-12 col-lg-6 company-description">
                    <h1>
                        <?php echo $business['tituloBusiness']; ?>
                    </h1>
                    <div class="social-media">
                        <?php echo $redes; ?>
                    </div>
                    <?php echo $business['textoBusiness']; ?>
                    <button onclick="scrollElemento('.field')" class="outline-button">
                        Saiba Mais
                        <img src="../assets/svg/seta-dir-marrom.svg" alt="Saiba Mais">
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="field">
        <img src="../assets/png/fundo-area-de-atuacao.png" alt="Fundo">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9 field-details">
                    <h1>Área de atuação</h1>
                    <p>Lista das áreas de atuação:</p>
                    <ul>
                        <?php
                        foreach ($conteudosArray as $conteudo) {
                            if ($conteudo->numeroConteudo == 2) {
                                echo <<<HTML
                                <li>$conteudo->tituloConteudo</li>
                                HTML;
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-12 col-lg-3 customer-service">
                    <h1>Fale com o nosso atendimento agora mesmo!</h1>
                    <form id="formulario-1">
                        <input type="hidden" name="origem" id="origem" value="formulario">
                        <input type="hidden" name="quemRecebe" id="quemRecebe" value="<?php echo $formulario['emailFormulario']; ?>">
                        <input type="hidden" name="tituloPagina" id="tituloPagina" value="">
                        <input name="contatoNome" id="contatoNome" type="text" placeholder="Nome" />
                        <input name="contatoEmail" id="contatoEmail" type="text" placeholder="E-mail" />
                        <input name="contatoTelefone" id="contatoTelefone" type="text" placeholder="WhatsApp"
                            onkeyup="mascaraTel(this);" maxlength="15" />
                        <label for="contact-checkbox">
                            <input id="contact-checkbox" type="checkbox" name="contatoTermo" id="contatoTermo" />
                            Concordo com os Termos Gerais da Lei Geral de Proteção de Dados.</label>
                        <button type="button" class="send botao-enviar" onClick="EnviarFormulario(1)">
                            Enviar
                            <img loading="lazy" src="../assets/svg/seta-dir-amarela.svg" alt="Seta" />
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="services">
        <div class="container">

            <h1>Serviços</h1>
            <div class="social-media">
                <?php echo $redes; ?>
            </div>
            <div class="swiper-services">
                <?php
                $numColumns = 3;
                $totalServices = count($servicosArray);

                for ($i = 0; $i < $totalServices; $i += $numColumns) {
                    echo '<div class="services-column">';

                    for ($j = 0; $j < $numColumns && ($i + $j) < $totalServices; $j++) {
                        $servico = $servicosArray[$i + $j];
                        echo <<<HTML
                            <div class="service">
                                <p>{$servico->tituloServico}</p>
                            </div>
                            HTML;
                    }

                    echo '</div>';
                }
                ?>
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
                                            <img src="../assets/uploads/{$empresa->imagemBusiness}" alt="{$empresa->legendaImagemBusiness}" class="business-logo">
                                            <p class="limit-text">
                                                {$empresa->tituloBusiness}
                                            </p>
                                            <a class="link-completo" href="../empresa-detalhes/{$empresa->nomePagina}" title="{$empresa->tituloPagina}"></a>
                                        </div>
                                        <div class="social-media">
                                            {$redes}
                                        </div>
                                        <a href="../empresa-detalhes/{$empresa->nomePagina}" title="{$empresa->tituloPagina}">
                                            <div class="outline-button">Saiba mais <img src="../assets/svg/seta-dir-marrom.svg"
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
                            <img class="video-bg cursor-pointer" onClick="PopUpVideo('{$videoId}')" src="../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}">
                        HTML;
                    }
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
            $(".swiper-services").slick({
                infinite: true,
                dots: true,
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
    <script src="../javascript/global.js"></script>
</body>

</html>