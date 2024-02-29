<?php

include_once("./assets/componentes.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa</title>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/empresa-detalhes.css">
</head>

<body>
    <section class="banner">
        <img class="img-background desktop" src="assets/png/banner-empresa-detalhes.png" alt="Banner">
        <img class="img-background mobile" src="assets/png/banner-empresa-detalhes.png" alt="Banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 bloco-1">
                    <div class="title">
                        <p>EVIDJURI</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 bloco-2">
                    <img src="assets/png/logo-evidjuri-branco.png" alt="EvidJuri">
                </div>
            </div>
        </div>
    </section>
    <section class="about">
        <div class="shaped-content container">
            <div class="row">
                <div class="col-12 col-lg-6 company-image">
                    <div class="img-wrapper"><img src="assets/png/empresa-detalhe.png" alt="Sobre a empresa"></div>
                </div>
                <div class="col-12 col-lg-6 company-description">
                    <h1>Empresa de todos os segmentos e advogados que necessitam de apoio técnico</h1>
                    <div class="social-media">
                        <img src="assets/svg/instagram-marrom.svg" alt="Instagram">
                        <img src="assets/svg/facebook-marrom.svg" alt="Facebook">
                        <img src="assets/svg/linkedin-marrom.svg" alt="LinkedIn">
                        <img src="assets/svg/x-marrom.svg" alt="X">
                        <img src="assets/svg/telegram-marrom.svg" alt="Telegram">
                    </div>
                    <p>A EVIDJURI foi o 1° Escritório Técnico Full Service do País com foco em Produção de Provas para
                        Processos Judiciais, contando hoje com + de 350 técnicos espalhados pelo Brasil e vasta atuação
                        de Perícias e Auditorias e atualmente tem + de 2,5 bilhões em portfólio de Ações.</p>
                    <a href="https://google.com" class="outline-button">
                        Saiba Mais
                        <img src="assets/svg/seta-dir-marrom.svg" alt="Saiba Mais">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="field">
        <img src="assets/png/fundo-area-de-atuacao.png" alt="Fundo">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9 field-details">
                    <h1>Área de atuação</h1>
                    <p>Lista das áreas de atuação:</p>
                    <ul>
                        <li>Técnicas de Projetos</li>
                        <li>Licenciamentos</li>
                        <li>ERP</li>
                        <li>Financeira</li>
                        <li>Contábil</li>
                        <li>Contratual</li>
                        <li>Técnicas de Projetos</li>
                        <li>Licenciamentos</li>
                        <li>ERP</li>
                        <li>Financeira</li>
                        <li>Contábil</li>
                        <li>Contratual</li>
                    </ul>
                </div>
                <div class="col-12 col-lg-3 customer-service">
                    <h1>Fale com o nosso atendimento agora mesmo!</h1>
                    <form>
                        <input name="contatoNome" id="contatoNome" type="text" placeholder="Nome" />
                        <input name="contatoEmail" id="contatoEmail" type="text" placeholder="E-mail" />
                        <input name="contatoTelefone" id="contatoTelefone" type="text" placeholder="WhatsApp"
                            onkeyup="mascaraTel(this);" maxlength="15" />
                        <label for="contact-checkbox">
                            <input id="contact-checkbox" type="checkbox" name="contatoTermo" id="contatoTermo" />
                            Concordo com os Termos Gerais da Lei Geral de Proteção de Dados.</label>
                        <button type="button" class="send botao-enviar" onClick="EnviarFormulario(1)">
                            Enviar
                            <img loading="lazy" src="assets/svg/seta-dir-amarela.svg" alt="Seta" />
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
                <img src="assets/svg/instagram-marrom.svg" alt="Instagram">
                <img src="assets/svg/facebook-marrom.svg" alt="Facebook">
                <img src="assets/svg/linkedin-marrom.svg" alt="LinkedIn">
                <img src="assets/svg/x-marrom.svg" alt="X">
                <img src="assets/svg/telegram-marrom.svg" alt="Telegram">
            </div>
            <div class="swiper-services">
                <div class="services-column">
                    <div class="service">
                        <p>Produção de Provas Técnicas para Processos Judiciais</p>
                    </div>
                    <div class="service">
                        <p>Reversão Técnica de Sentença Desfavorável</p>
                    </div>
                    <div class="service">
                        <p>Impugnação Técnica de Litígios Judiciais Desfavoráveis</p>
                    </div>
                </div>
                <div class="services-column">
                    <div class="service">
                        <p>Produção de Provas Técnicas para Processos Judiciais</p>
                    </div>
                    <div class="service">
                        <p>Reversão Técnica de Sentença Desfavorável</p>
                    </div>
                    <div class="service">
                        <p>Impugnação Técnica de Litígios Judiciais Desfavoráveis</p>
                    </div>
                </div>
                <div class="services-column">
                    <div class="service">
                        <p>Produção de Provas Técnicas para Processos Judiciais</p>
                    </div>
                    <div class="service">
                        <p>Reversão Técnica de Sentença Desfavorável</p>
                    </div>
                    <div class="service">
                        <p>Impugnação Técnica de Litígios Judiciais Desfavoráveis</p>
                    </div>
                </div>
                <div class="services-column">
                    <div class="service">
                        <p>Produção de Provas Técnicas para Processos Judiciais</p>
                    </div>
                    <div class="service">
                        <p>Reversão Técnica de Sentença Desfavorável</p>
                    </div>
                    <div class="service">
                        <p>Impugnação Técnica de Litígios Judiciais Desfavoráveis</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- -------------------------------- -->
    <!-- ADICIONAR COMPONENTE DE BUSINESS -->
    <!-- -------------------------------- -->
    
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
</body>

</html>