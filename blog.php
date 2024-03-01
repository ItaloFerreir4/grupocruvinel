<?php

include_once("./assets/componentes.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/blog.css">
</head>

<body>
    <?php banner(
        "BLOG",
        "BLOG",
        "BLOG",
        "./assets/png/banner-blog.png",
        "./assets/png/banner-blog.png"
    ); ?>
    <section class="blogs">
        <div class="shaped-content container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="container">
                        <div class="filter" data-filter="category">
                            <h1>Categorias</h1>
                            <button class="active" data-category="" data-url="/blog">Todas as Categorias</button>
                            <button data-category="1" data-url="/blog-categoria">Dicas</button>
                            <button data-category="2" data-url="/blog-categoria">Blog</button>
                            <button data-category="3" data-url="/blog-categoria">Estilo</button>
                        </div>
                        <div class=" tag-filter">
                            <h1>Tags</h1>
                            <div class="buttons">
                                <button data-tag="Moda">Moda</button>
                                <button data-tag="Estilos">Estilos</button>
                                <button data-tag="Semijoias">Semijoias</button>
                                <button data-tag="Munrá">Munrá</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <a data-category="2" data-tag="Moda" href=" ./blog-detalhes/{$blog->nomePagina}" class="col-12
                            col-lg-6 card-blog-wrapper">
                            <div class="card-blog">
                                <img src="assets/png/blog.png" alt="{$blog->legendaImagemBlog}">
                                <div>
                                    <span class="tag">Tecnologia</span><span class="date">18/jan/2024</span>
                                </div>
                                <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ad dolores voluptatem
                                    repellat labore perferendis?</h1>
                                <div class="outline-button">
                                    Ler mais
                                    <img src="assets/svg/seta-dir-marrom.svg" alt="Ler Mais">
                                </div>
                            </div>
                        </a>
                    </div>
                    <button class="outline-button load-more" onclick="loadMore(listElements)">
                        Carregar Mais
                        <img src="./assets/svg/seta-dir-marrom.svg" alt="Carregar mais">
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- -------------------------------- -->
    <!-- ADICIONAR COMPONENTE DE BUSINESS -->
    <!-- -------------------------------- -->

    <script>
        let maxVisibleElements = 6;
        const listElements = document.querySelectorAll(".card-blog-wrapper");

        sessionStorage.setItem("t", "");
        sessionStorage.setItem("y", new Date().getFullYear().toString().substring(2, 2));
        sessionStorage.setItem("m", "");
    </script>
    <script src="javascript/global.js"></script>
    <script src="javascript/filter.js"></script>
</body>

</html>