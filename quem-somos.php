<?php

include_once("./assets/componentes.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quem Somos</title>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/quem-somos.css">
</head>

<body>
    <header>
        <img src="assets/svg/logo-cruvinel-dourado.svg" alt="Logo" class="logo">
        <nav>
            <a href="quem-somos.php">QUEM SOMOS</a>
            <a href="empresas.php">EMPRESAS</a>
            <a href="servicos.php">SERVICOS</a>
            <a href="clientes.php">CLIENTES</a>
            <a href="blog.php">BLOG</a>
            <a href="fale-conosco.php">FALE CONOSCO</a>
            <button class="menu">
                <img src="assets/svg/menu.svg" alt="Menu">
            </button>
        </nav>
    </header>
    <?php banner(
        "QUEM SOMOS",
        "QUEM SOMOS",
        "QUEM SOMOS",
        "./assets/png/banner-quem-somos.png",
        "./assets/png/banner-quem-somos.png"
    ); ?>
    <section class="who-we-are">
        <div class="shaped-content container">
            <div class="row">
                <div class="col-12 col-lg-7 description-text">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ipsam, inventore incidunt nam
                        doloremque aperiam magni ad saepe error ipsum blanditiis harum explicabo, quasi nesciunt ratione
                        dignissimos ullam? Earum quos asperiores praesentium saepe eveniet error possimus repudiandae
                        aperiam, ipsa blanditiis ipsam soluta voluptatibus ab ad. Laboriosam aut corrupti perferendis
                        nostrum.</p>
                    <div class="social-media">
                        <img src="assets/svg/instagram-marrom.svg" alt="Instagram"><img
                            src="assets/svg/facebook-marrom.svg" alt="Facebook"><img
                            src="assets/svg/linkedin-marrom.svg" alt="LinkedIn"><img src="assets/svg/x-marrom.svg"
                            alt="X"><img src="assets/svg/telegram-marrom.svg" alt="Telegram">
                    </div>
                </div>
                <div class="col-12 col-lg-5 description-image">
                    <img src="assets/png/quem-somos.png" alt="Quem Somos">
                    <div class="brown-box">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia quae illum ullam tempore a
                            iusto sit ex! Quaerat, totam itaque?</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-12 col-lg-4 video">
                                <div class="watch-video">
                                    <img src="assets/png/video-quem-somos.png" alt="Quem Somos" class="video-bg">
                                    <img src="assets/svg/play.svg" alt="Play" class="play-button">
                                </div>
                            </div>
                            <div class="col-12 col-lg-8 text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non eos voluptatem eveniet
                                    unde nulla blanditiis magnam laboriosam. Cupiditate, mollitia odio repudiandae sunt
                                    maiores quis dolorem perferendis beatae nobis vero, quod rem! Eos hic minima
                                    voluptate vel et obcaecati, error rerum quos quas dicta explicabo incidunt ratione
                                    eum doloribus harum necessitatibus, repudiandae adipisci tempore nesciunt quod qui
                                    possimus quam quis! Nostrum dolore optio deserunt ipsum praesentium dolorem odit
                                    beatae quam vero et. Molestiae voluptate, aliquid saepe possimus asperiores dolores
                                    quibusdam ipsum deleniti rerum sapiente necessitatibus eaque, consequatur
                                    consectetur, quaerat ipsa atque. Voluptatum dolorem facilis ea tempora,
                                    exercitationem autem asperiores! Dignissimos quam, saepe, facilis blanditiis sed
                                    quasi obcaecati at ratione atque perferendis voluptatibus eveniet. Delectus soluta
                                    at consequatur nulla voluptas sed, perferendis cum hic in amet quibusdam placeat
                                    quidem minus voluptate unde ad quo earum repudiandae ipsa doloremque animi!
                                    Distinctio, illo. Doloribus qui eius laudantium soluta laborum maxime reiciendis
                                    omnis quaerat molestiae?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="what-we-do">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>O que fazemos?</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore nobis voluptatum esse odio totam
                        ab quidem quaerat voluptates veniam magni rem officia omnis molestias sit recusandae ea, soluta
                        autem sunt perferendis ipsum! Itaque enim at aliquam possimus minima iste fugiat.</p>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="accordion">
                        <div class="title">
                            <div>
                                <span class="limit-text">agenda 1</span>
                            </div>
                        </div>
                        <div class="panel">
                            <p>Lorem ipsum dolor sit amet consectetur. Aliquam netus et et sed dui eu. In turpis
                                ultrices id tortor aenean. Vestibulum purus lacus maecenas faucibus consectetur orci
                                habitasse in nibh.</p>
                            <p>Sed molestie etiam arcu non turpis semper. Lorem ipsum dolor sit amet consectetur.
                                Aliquam netus et et sed dui eu. In turpis ultrices id tortor aenean. Vestibulum purus
                                lacus maecenas faucibus consectetur orci habitasse in nibh. Sed molestie etiam arcu non
                                turpis semper.</p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="title">
                            <div>
                                <span class="limit-text">agenda 1</span>
                            </div>
                        </div>
                        <div class="panel">
                            <p>Lorem ipsum dolor sit amet consectetur. Aliquam netus et et sed dui eu. In turpis
                                ultrices id tortor aenean. Vestibulum purus lacus maecenas faucibus consectetur orci
                                habitasse in nibh.</p>
                            <p>Sed molestie etiam arcu non turpis semper. Lorem ipsum dolor sit amet consectetur.
                                Aliquam netus et et sed dui eu. In turpis ultrices id tortor aenean. Vestibulum purus
                                lacus maecenas faucibus consectetur orci habitasse in nibh. Sed molestie etiam arcu non
                                turpis semper.</p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="title">
                            <div>
                                <span class="limit-text">agenda 1</span>
                            </div>
                        </div>
                        <div class="panel">
                            <p>Lorem ipsum dolor sit amet consectetur. Aliquam netus et et sed dui eu. In turpis
                                ultrices id tortor aenean. Vestibulum purus lacus maecenas faucibus consectetur orci
                                habitasse in nibh.</p>
                            <p>Sed molestie etiam arcu non turpis semper. Lorem ipsum dolor sit amet consectetur.
                                Aliquam netus et et sed dui eu. In turpis ultrices id tortor aenean. Vestibulum purus
                                lacus maecenas faucibus consectetur orci habitasse in nibh. Sed molestie etiam arcu non
                                turpis semper.</p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="title">
                            <div>
                                <span class="limit-text">agenda 1</span>
                            </div>
                        </div>
                        <div class="panel">
                            <p>Lorem ipsum dolor sit amet consectetur. Aliquam netus et et sed dui eu. In turpis
                                ultrices id tortor aenean. Vestibulum purus lacus maecenas faucibus consectetur orci
                                habitasse in nibh.</p>
                            <p>Sed molestie etiam arcu non turpis semper. Lorem ipsum dolor sit amet consectetur.
                                Aliquam netus et et sed dui eu. In turpis ultrices id tortor aenean. Vestibulum purus
                                lacus maecenas faucibus consectetur orci habitasse in nibh. Sed molestie etiam arcu non
                                turpis semper.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-photos">
            <div class="img-wrapper">
                <img src="assets/png/quem-somos.png" alt="Foto">
            </div>
            <div class="img-wrapper">
                <img src="assets/png/quem-somos.png" alt="Foto">
            </div>
            <div class="img-wrapper">
                <img src="assets/png/quem-somos.png" alt="Foto">
            </div>
            <div class="img-wrapper">
                <img src="assets/png/quem-somos.png" alt="Foto">
            </div>
            <div class="img-wrapper">
                <img src="assets/png/quem-somos.png" alt="Foto">
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
    <footer>
        <div class="links">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-3"><img class="logo" src="assets/svg/logo-cruvinel-dourado.svg"
                            alt="Logo"></div>
                    <div class="col-12 col-lg-6 pages">
                        <a href="quem-somos.php">QUEM SOMOS</a>
                        <a href="empresas.php">NOSSAS EMPRESAS</a>
                        <a href="servicos.php">SERVIÇOS</a>
                        <a href="depoimentos">DEPOIMENTOS</a>
                        <a href="clientes.php">NOSSOS CLIENTES</a>
                        <a href="blog.php">BLOG</a>
                        <a href="fale-conosco.php">FALE CONOSCO</a>
                        <a href="https://google.com">STHEFANO CRUVINEL CEO E FUNDADOR</a>
                    </div>
                    <div class="col-12 col-lg-3 contact">
                        <span>(34) 3221-4716</span>
                        <span>(34) 98435-9365</span>
                        <span class="email">contato@grupocruvinel.com.br</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-3"></div>
                    <div class="col-12 col-lg-6">
                        <span class="label-social-media">Siga meus canais</span>
                        <div class="social-media">
                            <img src="assets/svg/instagram-amarelo.svg" alt="Instagram">
                            <img src="assets/svg/facebook-amarelo.svg" alt="Facebook">
                            <img src="assets/svg/linkedin-amarelo.svg" alt="LinkedIn">
                            <img src="assets/svg/x-amarelo.svg" alt="X">
                            <img src="assets/svg/telegram-amarelo.svg" alt="Telegram">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="location">
            <h1>R. Helvécio Schiavinato, 281 - Vigilato Pereira, Uberlândia - MG, 38408-608</h1>
        </div>
        <div class="terms">
            <a href="#">Termos de uso</a>
            <a href="#">Política de privacidade</a>
            <a href="#">Segurança no Uso da Internet</a>
        </div>
        <div class="rights">
            <div class="container">
                <p>TODOS OS DIREITOS RESERVADOS. Todo o conteúdo do site, todas as fotos, imagens, logotipos, marcas,
                    dizeres, som, software, conjunto imagem, layout, trade dress, aqui veiculados são de propriedade
                    exclusiva da Sthefano Cruvinel. ou de seus parceiros. É vedada qualquer reprodução, total ou
                    parcial, de
                    qualquer elemento de identidade, sem expressa autorização. A violação de qualquer direito mencionado
                    implicará na responsabilização cível e criminal nos termos da Lei.</p>
                <span>© 2024 EvidJuri Desenvolvido por: WMB Marketing Digital</span>
            </div>
        </div>
    </footer>
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
            $(".swiper-photos").slick({
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
    <script src="javascript/global.js"></script>
</body>

</html>