<?php
include_once "../assets/componentes.php";
include_once "../painel/backend/conexao-banco.php";

$nomeDoArquivoCompleto = $_SERVER["SCRIPT_FILENAME"];
$nomeDoArquivoSemExtensao = pathinfo($nomeDoArquivoCompleto, PATHINFO_FILENAME);

$paginaSelecionada = $nomeDoArquivoSemExtensao;

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE nomePagina = :nomePagina AND categoriaId = :categoriaId");
$sqlSeo->bindValue(":nomePagina", $paginaSelecionada);
$sqlSeo->bindValue(":categoriaId", 10);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlBlogs = $con->prepare("SELECT p.*, c.* FROM paginas p, blogs c WHERE c.paginaId = :idPagina AND c.paginaId = p.idPagina ORDER BY c.dataBlog DESC");
$sqlBlogs->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlBlogs->execute();
$blog = $sqlBlogs->fetch(PDO::FETCH_ASSOC);

$sqlBlogs = $con->prepare("SELECT p.*, c.* FROM paginas p, destaques d, blogs c WHERE p.idPagina = d.idItem AND c.paginaId = p.idPagina AND c.status = 1 ORDER BY c.dataBlog DESC");
$sqlBlogs->execute();
$blogsArray = $sqlBlogs->fetchAll(PDO::FETCH_ASSOC);
$blogsArray = json_decode(json_encode($blogsArray));

$sqlCategorias = $con->prepare("SELECT * FROM categorias c, paginas p WHERE c.paginaId = p.idPagina AND c.tipoCategoria = :tipoCategoria");
$sqlCategorias->bindValue(":tipoCategoria", 1);
$sqlCategorias->execute();
$categoriasArray = $sqlCategorias->fetchAll(PDO::FETCH_ASSOC);
$categoriasArray = json_decode(json_encode($categoriasArray));

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlConteudos->execute();
$conteudosArray = $sqlConteudos->fetchAll(PDO::FETCH_ASSOC);
$conteudosArray = json_decode(json_encode($conteudosArray));

$dataBlogSel = $blog['dataBlog'];
$categoriasId = $blog['categoriasId'];

$dataBlogSel = new DateTime($dataBlogSel);
$dataBlogSel = $dataBlogSel->format('d/m/Y');

$primeiraCategoriaBlog = json_decode($categoriasId);
if ($primeiraCategoriaBlog) {
    $primeiraCategoriaBlog = $primeiraCategoriaBlog[0];

    foreach ($categoriasArray as $rowCat) {
        if ($rowCat->idCategoria == $primeiraCategoriaBlog) {
            $nomeCategoriaBlogSel = $rowCat->nomeCategoria;
        }
    }
} else {
    $nomeCategoriaBlogSel = "";
}

ob_start();
redesSociaisCompartilhar("marrom");
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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/blog-detalhes.css">
</head>

<body>
    <?php cHeader(); ?>
    <div class="banner">
        <img class="img-background" src="../assets/png/banner-blog-detalhes.png" alt="Fundo Imagem">
        <div class="container">
            <div class="row">
                <div class="col-12 bloco-1">
                    <div class="title">
                        <p>BLOG</p>
                    </div>
                    <h1>
                        <?php echo $blog['tituloBlog']; ?>
                    </h1>
                    <div class="bottom">
                        <div class="author">
                            <img loading="lazy" src="../assets/uploads/<?php echo $blog['imagemAutorBlog']; ?>" alt="<?php echo $blog['nomeAutorBlog']; ?>" />
                            <span class="limit-text"><?php echo $blog['nomeAutorBlog']; ?></span>
                        </div>
                        <div class="tag"><span>
                                <?php echo $nomeCategoriaBlogSel; ?>
                            </span></div>
                        <div class="date">
                            <span>
                                <?php echo $dataBlogSel; ?>
                            </span>
                        </div>
                    </div>
                    <div class="outline-button white" onclick="scrollElemento('.post')">
                        Ler mais
                        <img src="../assets/svg/seta-dir-branca.svg" alt="Ler Mais">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="post">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="../assets/uploads/<?php echo $blog['imagemBlog']; ?>" alt="<?php echo $blog['legendaImagemBlog']; ?>">
                    <div class="social-media">
                        <?php echo $redes; ?>
                    </div>
                    <div class="texto-blog">
                        <?php echo $blog['textoBlog']; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="other-blogs">
        <h1>Blog do Grupo</h1>
        <div class="container">
            <div class="swiper-other-blogs">
                <?php
                $paginaId = $conteudoSeo['idPagina'];

                foreach ($blogsArray as $blog) {
                    if ($paginaId != $blog->paginaId) {
                        $dataBlog = $blog->dataBlog;
                        $categoriasId = $blog->categoriasId;

                        $dataBlog = new DateTime($dataBlog);
                        $dataBlog = $dataBlog->format('d/m/Y');

                        $primeiraCategoriaBlog = json_decode($categoriasId);
                        if ($primeiraCategoriaBlog) {
                            $primeiraCategoriaBlog = $primeiraCategoriaBlog[0];

                            foreach ($categoriasArray as $rowCat) {
                                if ($rowCat->idCategoria == $primeiraCategoriaBlog) {
                                    $nomeCategoriaBlog = $rowCat->nomeCategoria;
                                }
                            }
                        } else {
                            $nomeCategoriaBlog = "";
                        }

                        // Remove colchetes e aspas de cada parte entre vírgulas
                        $categoriasBlog = preg_replace('/\["(.*?)"]/', '$1', $categoriasId);

                        // Divide a string em um array usando "," como delimitador
                        $categoriasBlog = explode(',', $categoriasBlog);

                        // Transforma o array em uma string separada por ","
                        $categoriasBlog = implode(',', $categoriasBlog);

                        echo <<<HTML
                            <a data-category="{$categoriasBlog}" data-tag="{$blog->tagsBlog}" href="../blog-detalhes/{$blog->nomePagina}" class="col-12
                                col-lg-6 card-blog-wrapper">
                                <div class="card-blog">
                                    <img src="../assets/uploads/{$blog->imagemBlog}" alt="{$blog->legendaImagemBlog}">
                                    <div class="category-date">
                                        <div class="author">
                                            <img loading="lazy" src="../assets/uploads/{$blog->imagemAutorBlog}" alt="{$blog->nomeAutorBlog}" />
                                            <span class="limit-text">{$blog->nomeAutorBlog}</span>
                                        </div>
                                        <span class="tag">{$nomeCategoriaBlog}</span><span class="date">{$dataBlog}</span>
                                    </div>
                                    <h1>{$blog->tituloBlog}</h1>
                                    <div class="outline-button">
                                        Ler mais
                                        <img src="../assets/svg/seta-dir-marrom.svg" alt="Ler Mais">
                                    </div>
                                </div>
                            </a>
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
        $(document).ready(function() {
            $(".swiper-other-blogs").slick({
                infinite: true,
                dots: true,
                slidesToShow: 3,
                autoplay: true,
                autoplaySpeed: 2500,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                    },
                }, ],
            });
        });
    </script>
    <script src="../javascript/global.js"></script>
</body>

</html>