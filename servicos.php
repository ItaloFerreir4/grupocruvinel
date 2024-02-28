<?php

include_once "assets/componentes.php";
include_once "painel/backend/conexao-banco.php";

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE idPagina = :idPagina");
$sqlSeo->bindValue(":idPagina", 5);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlConteudos->execute();
$conteudosArray = $sqlConteudos->fetchAll(PDO::FETCH_ASSOC);
$conteudosArray = json_decode(json_encode($conteudosArray));

$sqlServicos = $con->prepare("SELECT * FROM servicos WHERE status = 1");
$sqlServicos->execute();
$servicosArray = $sqlServicos->fetchAll(PDO::FETCH_ASSOC);
$servicosArray = json_decode(json_encode($servicosArray));

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços</title>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/servicos.css">
</head>

<body>
    <?php
    foreach ($conteudosArray as $conteudo) {
        if($conteudo->numeroConteudo == 1){
            banner(
                "SERVIÇOS",
                "{$conteudo->legendaImagem1Conteudo}",
                "{$conteudo->legendaImagem2Conteudo}",
                "./assets/uploads/{$conteudo->imagem1Conteudo}",
                "./assets/uploads/{$conteudo->imagem2Conteudo}"
            ); 
        }
    }
    ?>

    <section class="services">
        <div class="shaped-content container">
            <div class="grid-content">
                <?php
                foreach ($servicosArray as $servico) {
                    echo <<<HTML
                    <div class="card-service">
                        <img src="assets/uploads/{$servico->imagemServico}" alt="{$servico->legendaImagemServico}">
                        <h1>$servico->tituloServico</h1>
                    </div>
                    HTML;
                }
                ?>
            </div>
            <button class="outline-button load-more" onclick="loadMore(listElements)">
                Carregar Mais
                <img src="./assets/svg/seta-dir-marrom.svg" alt="Carregar mais">
            </button>
        </div>
    </section>

    <section class="business">
        <h1>Empresas do <strong>Grupo Cruvinel</strong></h1>
        <div class="swiper-business">
            <div class="business-card">
                <div class="row">
                    <div class="col-12 col-lg-6 business-info">
                        <div class="info-content">
                            <div class="yellow-highlight">
                                <img src="assets/png/logo-evidjuri.png" alt="EvidJuri" class="business-logo">
                                <p class="limit-text">A EVIDJURI foi o 1° Escritório Técnico Full Service do País com
                                    foco
                                    em
                                    Produção de Provas
                                    para Processos Judiciais, contando hoje com + de 350 técnicos espalhados pelo Brasil
                                    e
                                    vasta
                                    atuação de Perícias e Auditorias e atualmente tem + de 2,5 bilhões em portfólio de
                                    Ações.
                                </p>
                            </div>
                            <div class="social-media">
                                <img src="assets/svg/instagram-marrom.svg" alt="Instagram"><img
                                    src="assets/svg/facebook-marrom.svg" alt="Facebook"><img
                                    src="assets/svg/linkedin-marrom.svg" alt="LinkedIn"><img
                                    src="assets/svg/x-marrom.svg" alt="X"><img src="assets/svg/telegram-marrom.svg"
                                    alt="Telegram">
                            </div>
                            <div class="outline-button">Saiba mais <img src="assets/svg/seta-dir-marrom.svg"
                                    alt="Saiba Mais">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 business-video">
                        <img src="assets/png/video-fundo.png" alt="Vídeo" class="video-bg">
                        <img src="assets/svg/play.svg" alt="Play" class="play-video">
                    </div>
                </div>
            </div>
            <div class="business-card">
                <div class="row">
                    <div class="col-12 col-lg-6 business-info">
                        <div class="info-content">
                            <div class="yellow-highlight">
                                <img src="assets/png/logo-evidjuri.png" alt="EvidJuri" class="business-logo">
                                <p class="limit-text">A EVIDJURI foi o 1° Escritório Técnico Full Service do País com
                                    foco
                                    em
                                    Produção de Provas
                                    para Processos Judiciais, contando hoje com + de 350 técnicos espalhados pelo Brasil
                                    e
                                    vasta
                                    atuação de Perícias e Auditorias e atualmente tem + de 2,5 bilhões em portfólio de
                                    Ações.
                                </p>
                            </div>
                            <div class="social-media">
                                <img src="assets/svg/instagram-marrom.svg" alt="Instagram"><img
                                    src="assets/svg/facebook-marrom.svg" alt="Facebook"><img
                                    src="assets/svg/linkedin-marrom.svg" alt="LinkedIn"><img
                                    src="assets/svg/x-marrom.svg" alt="X"><img src="assets/svg/telegram-marrom.svg"
                                    alt="Telegram">
                            </div>
                            <div class="outline-button">Saiba mais <img src="assets/svg/seta-dir-marrom.svg"
                                    alt="Saiba Mais">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 business-video">
                        <img src="assets/png/video-fundo.png" alt="Vídeo" class="video-bg">
                        <img src="assets/svg/play.svg" alt="Play" class="play-video">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".swiper-business").slick({
                infinite: true,
                slidesToShow: 1,
            });
        });
    </script>
    <script>
        let maxVisibleElements = 6;
        const listElements = document.querySelectorAll(".card-service");

        sessionStorage.setItem("t", "");
        sessionStorage.setItem("y", new Date().getFullYear().toString().substring(2, 2));
        sessionStorage.setItem("m", "");
    </script>
    <script src="javascript/global.js"></script>
    <script src="javascript/filter.js"></script>
</body>

</html>