<?php

include_once "assets/componentes.php";
include_once "painel/backend/conexao-banco.php";

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE idPagina = :idPagina");
$sqlSeo->bindValue(":idPagina", 1);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlConteudos->execute();
$conteudosArray = $sqlConteudos->fetchAll(PDO::FETCH_ASSOC);
$conteudosArray = json_decode(json_encode($conteudosArray));

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


    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <main>
        <div class="swiper-banner">
            <div class="banner-slide">
                <img src="assets/png/banner-home.png" alt="Banner">
                <div class="content">
                    <h1>Um grupo com DNA de resultados</h1>
                    <div class="outline-button white">
                        Saiba mais
                        <img src="assets/svg/seta-dir-bege.svg" alt="Ler Mais">
                    </div>
                </div>
            </div>
            <div class="banner-slide">
                <img src="assets/png/banner-home.png" alt="Banner">
                <div class="content">
                    <h1>Um grupo com DNA de resultados</h1>
                    <div class="outline-button white">
                        Saiba mais
                        <img src="assets/svg/seta-dir-bege.svg" alt="Ler Mais">
                    </div>
                </div>
            </div>
            <div class="banner-slide">
                <img src="assets/png/banner-home.png" alt="Banner">
                <div class="content">
                    <h1>Um grupo com DNA de resultados</h1>
                    <div class="outline-button white">
                        Saiba mais
                        <img src="assets/svg/seta-dir-bege.svg" alt="Ler Mais">
                    </div>
                </div>
            </div>
        </div>
        <section class="about">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 text">
                        <div class="social-media">
                            <img src="assets/svg/instagram-marrom.svg" alt="Instagram">
                            <img src="assets/svg/facebook-marrom.svg" alt="Facebook">
                            <img src="assets/svg/linkedin-marrom.svg" alt="LinkedIn">
                            <img src="assets/svg/x-marrom.svg" alt="X">
                            <img src="assets/svg/telegram-marrom.svg" alt="Telegram">
                        </div>
                        <h1>Soluções especializadas: Auditorias, Recuperação de Impostos, Tecnologia e Mais</h1>
                        <p>Atuamos em todo o Brasil e globalmente, proporcionando inovação e expertise para impulsionar
                            resultados financeiros e evitar desgastes com fornecedores e matrizes.</p>
                        <div class="outline-button">
                            Saiba Mais
                            <img src="assets/svg/seta-dir-bege.svg" alt="Ler Mais">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 image">
                        <img src="assets/png/solucoes-especializadas-home.png" alt="Soluções especializadas">
                        <div class="brown-box">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia quae illum ullam
                                tempore a
                                iusto sit ex! Quaerat, totam itaque?</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="financial">
            <img src="assets/png/resultados-financeiros-home.png" alt="Fundo">
            <div class="container">
                <h1>Resultados Financeiros Impulsionados por Inovação e Conhecimento</h1>
                <div class="swiper-financial">
                    <div class="financial-card">
                        <img src="assets/png/resultados.png" alt="Resultados">
                        <h1>SOMOS 350</h1>
                        <p>Mais de 350 parceiros e colaboradores especializados</p>
                    </div>
                    <div class="financial-card">
                        <img src="assets/png/resultados.png" alt="Resultados">
                        <h1>SOMOS 350</h1>
                        <p>Mais de 350 parceiros e colaboradores especializados</p>
                    </div>
                    <div class="financial-card">
                        <img src="assets/png/resultados.png" alt="Resultados">
                        <h1>SOMOS 350</h1>
                        <p>Mais de 350 parceiros e colaboradores especializados</p>
                    </div>
                    <div class="financial-card">
                        <img src="assets/png/resultados.png" alt="Resultados">
                        <h1>SOMOS 350</h1>
                        <p>Mais de 350 parceiros e colaboradores especializados</p>
                    </div>
                    <div class="financial-card">
                        <img src="assets/png/resultados.png" alt="Resultados">
                        <h1>SOMOS 350</h1>
                        <p>Mais de 350 parceiros e colaboradores especializados</p>
                    </div>
                    <div class="financial-card">
                        <img src="assets/png/resultados.png" alt="Resultados">
                        <h1>SOMOS 350</h1>
                        <p>Mais de 350 parceiros e colaboradores especializados</p>
                    </div>
                </div>
                <div class="social-media">
                    <img src="assets/svg/instagram-amarelo.svg" alt="Instagram">
                    <img src="assets/svg/facebook-amarelo.svg" alt="Facebook">
                    <img src="assets/svg/linkedin-amarelo.svg" alt="LinkedIn">
                    <img src="assets/svg/x-amarelo.svg" alt="X">
                    <img src="assets/svg/telegram-amarelo.svg" alt="Telegram">
                </div>
            </div>
        </section>
        <section class="testimonials">
            <div class="container white-box">
                <h1>Depoimentos</h1>
                <div class="swiper-testimonials">
                    <div class="slide-testimonial">
                        <div class="row">
                            <div class="col-12 col-lg-3 company">
                                <img src="./assets/png/logo-evidjuri.png" alt="EvidJuri">
                                <span class="person">Sr. Alisson Fernandes</span>
                                <span class="position">Diretor de Processos/TI da
                                    Carmen Steffens</span>
                            </div>
                            <div class="col-12 col-lg-9 testimonial">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil modi ullam autem qui
                                    consequuntur quaerat quidem ipsa cum? Ipsam, reprehenderit?</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis eos dolores,
                                    cumque
                                    eligendi iste nesciunt quia enim quibusdam doloremque natus quis architecto debitis,
                                    officia
                                    odio aspernatur quos minus? Odio est nesciunt laudantium, rem reiciendis quod,
                                    obcaecati
                                    nemo aliquam asperiores minima modi illum blanditiis aut ex?</p>
                                <a href="#" class="read-more">Ler mais <img src="./assets/svg/play-ler-mais.svg"
                                        alt="Ler Mais"></a>
                            </div>
                        </div>
                    </div>
                    <div class="slide-testimonial">
                        <div class="row">
                            <div class="col-12 col-lg-3 company">
                                <img src="./assets/png/logo-evidjuri.png" alt="EvidJuri">
                                <span class="person">Sr. Alisson Fernandes</span>
                                <span class="position">Diretor de Processos/TI da
                                    Carmen Steffens</span>
                            </div>
                            <div class="col-12 col-lg-9 testimonial">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil modi ullam autem qui
                                    consequuntur quaerat quidem ipsa cum? Ipsam, reprehenderit?</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis eos dolores,
                                    cumque
                                    eligendi iste nesciunt quia enim quibusdam doloremque natus quis architecto debitis,
                                    officia
                                    odio aspernatur quos minus? Odio est nesciunt laudantium, rem reiciendis quod,
                                    obcaecati
                                    nemo aliquam asperiores minima modi illum blanditiis aut ex?</p>
                                <a href="#" class="read-more">Ler mais <img src="./assets/svg/play-ler-mais.svg"
                                        alt="Ler Mais"></a>
                            </div>
                        </div>
                    </div>
                    <div class="slide-testimonial">
                        <div class="row">
                            <div class="col-12 col-lg-3 company">
                                <img src="./assets/png/logo-evidjuri.png" alt="EvidJuri">
                                <span class="person">Sr. Alisson Fernandes</span>
                                <span class="position">Diretor de Processos/TI da
                                    Carmen Steffens</span>
                            </div>
                            <div class="col-12 col-lg-9 testimonial">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil modi ullam autem qui
                                    consequuntur quaerat quidem ipsa cum? Ipsam, reprehenderit?</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis eos dolores,
                                    cumque
                                    eligendi iste nesciunt quia enim quibusdam doloremque natus quis architecto debitis,
                                    officia
                                    odio aspernatur quos minus? Odio est nesciunt laudantium, rem reiciendis quod,
                                    obcaecati
                                    nemo aliquam asperiores minima modi illum blanditiis aut ex?</p>
                                <a href="#" class="read-more">Ler mais <img src="./assets/svg/play-ler-mais.svg"
                                        alt="Ler Mais"></a>
                            </div>
                        </div>
                    </div>
                    <div class="slide-testimonial">
                        <div class="row">
                            <div class="col-12 col-lg-3 company">
                                <img src="./assets/png/logo-evidjuri.png" alt="EvidJuri">
                                <span class="person">Sr. Alisson Fernandes</span>
                                <span class="position">Diretor de Processos/TI da
                                    Carmen Steffens</span>
                            </div>
                            <div class="col-12 col-lg-9 testimonial">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil modi ullam autem qui
                                    consequuntur quaerat quidem ipsa cum? Ipsam, reprehenderit?</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis eos dolores,
                                    cumque
                                    eligendi iste nesciunt quia enim quibusdam doloremque natus quis architecto debitis,
                                    officia
                                    odio aspernatur quos minus? Odio est nesciunt laudantium, rem reiciendis quod,
                                    obcaecati
                                    nemo aliquam asperiores minima modi illum blanditiis aut ex?</p>
                                <a href="#" class="read-more">Ler mais <img src="./assets/svg/play-ler-mais.svg"
                                        alt="Ler Mais"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-2"><img class="whatsapp-icon" src="assets/svg/botao-whatsapp-verde.svg"
                            alt="Whatsapp"></div>
                    <div class="col-12 col-lg-4">
                        <p>Receba meus lançamentos e novidades na sua caixa de mensagens ou WhatsApp.</p>
                    </div>
                    <div class="col-12 col-lg-6">
                        <form>
                            <input name="contatoNome" id="contatoNome" type="text" placeholder="Nome" />
                            <input name="contatoEmail" id="contatoEmail" type="text" placeholder="E-mail" />
                            <input name="contatoTelefone" id="contatoTelefone" type="text" placeholder="WhatsApp"
                                onkeyup="mascaraTel(this);" maxlength="15" />
                            <button type="button" class="send botao-enviar" onClick="EnviarFormulario(1)">
                                Enviar
                                <img loading="lazy" src="assets/svg/seta-dir-amarela.svg" alt="Seta" />
                            </button>
                            <label for="contact-checkbox">
                                <input id="contact-checkbox" type="checkbox" name="contatoTermo" id="contatoTermo" />
                                Concordo com os Termos Gerais da Lei Geral de Proteção de Dados.</label>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- -------------------------------- -->
        <!-- ADICIONAR COMPONENTE DE BUSINESS -->
        <!-- -------------------------------- -->

        <section class="what-we-do">
            <img src="assets/svg/fundo-mapa.svg" alt="Fundo">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <h1>O que fazemos?</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam deserunt quod molestiae esse
                            maxime quae nobis, officia ipsum provident at ad voluptatum asperiores nihil ipsam maiores
                            dolorum consequatur ex laborum commodi. Eos natus fugit quas suscipit velit rerum corrupti
                            aliquam labore blanditiis officiis explicabo, sapiente cumque odit molestiae necessitatibus
                            maiores.</p>
                        <div class="outline-button">
                            Saiba mais
                            <img src="assets/svg/seta-dir-marrom.svg" alt="Ler Mais">
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="card"><span>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</span></div>
                        <div class="card"><span>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</span></div>
                        <div class="card"><span>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</span></div>
                        <div class="card"><span>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</span></div>
                        <div class="card"><span>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</span></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="clients">
            <div class="container shaped-content">
                <h1>Nossos clientes</h1>
                <div class="swiper-clients">
                    <div class="client">
                        <img src="assets/png/cliente.png" alt="Cliente">
                    </div>
                    <div class="client">
                        <img src="assets/png/cliente.png" alt="Cliente">
                    </div>
                    <div class="client">
                        <img src="assets/png/cliente.png" alt="Cliente">
                    </div>
                    <div class="client">
                        <img src="assets/png/cliente.png" alt="Cliente">
                    </div>
                    <div class="client">
                        <img src="assets/png/cliente.png" alt="Cliente">
                    </div>
                    <div class="client">
                        <img src="assets/png/cliente.png" alt="Cliente">
                    </div>
                </div>
            </div>
        </section>
        <section class="other-blogs">
            <h1>Blog do Grupo</h1>
            <div class="container">
                <div class="swiper-other-blogs">
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
            </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".swiper-banner").slick({
                infinite: true,
                dots: true,
                slidesToShow: 1,
            });
            $(".swiper-financial").slick({
                infinite: true,
                dots: true,
                slidesToShow: 5,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 1,
                        },
                    },
                ],
            });
            $(".swiper-testimonials").slick({
                infinite: true,
                dots: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 7000,
                slidesToShow: 1,
            });
            $(".swiper-clients").slick({
                infinite: true,
                dots: true,
                slidesToShow: 4,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 1,
                            arrows: false,
                        },
                    },
                ],
            });
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
    <script src="javascript/global.js"></script>
</body>

</html>