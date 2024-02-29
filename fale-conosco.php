<?php

include_once("./assets/componentes.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fale Conosco</title>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/fale-conosco.css">
</head>

<body>
    <?php banner(
        "FALE CONOSCO",
        "FALE CONOSCO",
        "FALE CONOSCO",
        "./assets/png/banner-fale-conosco.png",
        "./assets/png/banner-fale-conosco.png"
    ); ?>

    <section class="contact-us">
        <div class="shaped-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7 contact-form">
                        <h1>Conte para nosso atendimento o que você precisa. E vamos lhe ajudar!</h1>
                        <form id="formulario-1">
                            <input name="contatoNome" id="contatoNome" type="text" placeholder="Nome:" />
                            <input name="contatoEmail" id="contatoEmail" type="text" placeholder="E-mail:" />
                            <select name="contatoAssunto" id="contatoAssunto" type="text" placeholder="Assunto:">
                                <optgroup>
                                    <option value="">Assunto:</option>
                                </optgroup>
                                <option value="{$option}">opcao 1</option>
                            </select>
                            <input name="contatoTelefone" id="contatoTelefone" type="text" placeholder="Telefone:"
                                onkeyup="mascaraTel(this);" maxlength="15" />
                            <textarea rows="4" name="contatoMensagem" id="contatoMensagem" type="text"
                                placeholder="Mensagem:"></textarea>
                            <label for="contact-checkbox">
                                <input id="contact-checkbox" type="checkbox" name="contatoTermo" id="contatoTermo" />
                                Concordo que os dados pessoais fornecidos acima serão utilizados para envio de conteúdo
                                informativo, analítico e publicitário sobre produtos, serviços e assuntos gerais, nos
                                termos da Lei Geral de Proteção de Dados.
                                Voluptatum, necessitatibus?</label>
                            <button type="button" class="send botao-enviar" onClick="EnviarFormulario(1)">
                                Enviar
                                <img loading="lazy" src="assets/svg/seta-dir-amarela.svg" alt="Seta" />
                            </button>
                        </form>
                    </div>
                    <div class="col-12 col-lg-5 images">
                        <img src="assets/png/fale-conosco.png" alt="Fale Conosco" class="main-img">
                        <div class="contact-info">
                            <div>
                                <div class="icon"><img src="assets/svg/email-marrom.svg" alt="Email"></div>
                                <span>assessoria@evidjuri.com.br</span>
                            </div>
                            <div>
                                <div class="icon"><img src="assets/svg/whatsapp-branco.svg" alt="Whatsapp"></div>
                                <strong>(34)
                                    3221-4716</strong>
                            </div>
                            <div>
                                <div class="icon"><img src="assets/svg/telefone-verde.svg" alt="Telefone"></div>
                                <strong>(34) 3221-4716</strong>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="map">
        <div class="container">
            <h2>R. Helvécio Schiavinato, 281 - Vigilato Pereira, Uberlândia - MG, 38408-608</h2>
        </div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.1973529954835!2d-46.6564943!3d-23.5613545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59c8da0aa315%3A0xd59f9431f2c9776a!2sAv.%20Paulista%2C%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1709170155410!5m2!1spt-BR!2sbr"
            width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <section class="other-blogs">
        <h1>Blog do Grupo</h1>
        <div class="swiper-other-blogs container">
            <div class="card-blog">
                <img src="assets/png/blog.png" alt="Blog">
                <div>
                    <span class="tag">Tecnologia</span><span class="date">18/jan/2024</span>
                </div>
                <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, nulla?</h1>
                <div class="outline-button">Ler mais <img src="assets/svg/seta-dir-marrom.svg" alt="Ler Mais">
                </div>
            </div>
            <div class="card-blog">
                <img src="assets/png/blog.png" alt="Blog">
                <div>
                    <span class="tag">Tecnologia</span><span class="date">18/jan/2024</span>
                </div>
                <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, nulla?</h1>
                <div class="outline-button">Ler mais <img src="assets/svg/seta-dir-marrom.svg" alt="Ler Mais">
                </div>
            </div>
            <div class="card-blog">
                <img src="assets/png/blog.png" alt="Blog">
                <div>
                    <span class="tag">Tecnologia</span><span class="date">18/jan/2024</span>
                </div>
                <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, nulla?</h1>
                <div class="outline-button">Ler mais <img src="assets/svg/seta-dir-marrom.svg" alt="Ler Mais">
                </div>
            </div>
            <div class="card-blog">
                <img src="assets/png/blog.png" alt="Blog">
                <div>
                    <span class="tag">Tecnologia</span><span class="date">18/jan/2024</span>
                </div>
                <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, nulla?</h1>
                <div class="outline-button">Ler mais <img src="assets/svg/seta-dir-marrom.svg" alt="Ler Mais">
                </div>
            </div>
            <div class="card-blog">
                <img src="assets/png/blog.png" alt="Blog">
                <div>
                    <span class="tag">Tecnologia</span><span class="date">18/jan/2024</span>
                </div>
                <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, nulla?</h1>
                <div class="outline-button">Ler mais <img src="assets/svg/seta-dir-marrom.svg" alt="Ler Mais">
                </div>
            </div>
            <div class="card-blog">
                <img src="assets/png/blog.png" alt="Blog">
                <div>
                    <span class="tag">Tecnologia</span><span class="date">18/jan/2024</span>
                </div>
                <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, nulla?</h1>
                <div class="outline-button">Ler mais <img src="assets/svg/seta-dir-marrom.svg" alt="Ler Mais">
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".swiper-other-blogs").slick({
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