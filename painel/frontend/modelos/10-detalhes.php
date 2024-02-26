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

$sqlBlogs = $con->prepare("SELECT p.*, c.* FROM paginas p, blogs c WHERE c.paginaId = :idPagina AND c.paginaId = p.idPagina");
$sqlBlogs->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlBlogs->execute();
$blog = $sqlBlogs->fetch(PDO::FETCH_ASSOC);

$sqlBlogs = $con->prepare("SELECT p.*, c.* FROM paginas p, blogs c WHERE c.paginaId = p.idPagina AND c.status = 1");
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
    <link rel="stylesheet" href="../css/blog-detalhes.css" />
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
                                            <a href="../blog">Blogs</a>
                                        </div>
                                        <p>{$blog["tituloBlog"]}</p>
                                        <div class="bottom">
                                            <a class="btn-mais" href="#textoBlog">Ler mais</a>
                                            <div class="caption-social-media">
                                                <span>Compartilhar: </span>
                                                <div class="social-media">
                                                    {$redes}
                                                </div>
                                            </div>
                                            <div class="date">
                                                <h2>{$blog["dataBlog"]}</h2>
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
        <section class="content" id="textoBlog">
            <section class="white-bg row">
                <div class="col-12 col-lg-5 media-img">
                    <img loading="lazy" src="../assets/uploads/<?php echo $blog['imagemBlog']; ?>" alt="<?php echo $blog['legendaImagemBlog']; ?>" />
                </div>
                <div class="col-12 col-lg-7 media-content">
                    <?php echo $blog['textoBlog']; ?>
                </div>
            </section>
        </section>
        <section class="more-content">
            <h1>Veja mais conteúdos</h1>
            <div class="other-blogs-swiper">
                <?php 
                    $idPagina = $blog["idPagina"];
                    foreach ($blogsArray as $blog) {
                        if($blog->idPagina != $idPagina){
                            $dataBlog = $blog->dataBlog;
                            $categoriasId = $blog->categoriasId;
    
                            $mesesEmPortugues = array(
                                "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
                                "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
                            );
    
                            $diaDataBlog = date("d", strtotime($dataBlog));
                            $mesDataBlog = date("m", strtotime($dataBlog));
                            $anoDataBlog = date("y", strtotime($dataBlog));
                            $mesPtDataBlog = $mesesEmPortugues[(int)date("m", strtotime($dataBlog)) - 1];
    
                            $primeiraCategoriaBlog = json_decode($categoriasId);
                            if($primeiraCategoriaBlog){
                                $primeiraCategoriaBlog = $primeiraCategoriaBlog[0];
    
                                foreach ($categoriasArray as $rowCat) {
                                    if($rowCat->idCategoria == $primeiraCategoriaBlog){
                                        $nomeCategoriaBlog = $rowCat->nomeCategoria;
                                    }
                                }
    
                            }
                            else{
                                $nomeCategoriaBlog = "";
                            }
    
                            // Remove colchetes e aspas de cada parte entre vírgulas
                            $categoriasBlog = preg_replace('/\["(.*?)"]/', '$1', $categoriasId);
    
                            // Divide a string em um array usando "," como delimitador
                            $categoriasBlog = explode(',', $categoriasBlog);
    
                            // Transforma o array em uma string separada por ","
                            $categoriasBlog = implode(',', $categoriasBlog);
                            
                            echo <<<HTML
                            <a href="../blog-detalhes/{$blog->nomePagina}">
                                <div class="blog-card">
                                    <img loading="lazy" src="../assets/uploads/{$blog->imagemBlog}" alt="{$blog->legendaImagemBlog}" />
                                    <div class="card-content">
                                        <span>{$diaDataBlog} de {$mesPtDataBlog} de {$anoDataBlog}</span>
                                        <h1>{$blog->tituloBlog}</h1>
                                        <p>{$blog->subTituloBlog}</p>
                                        <div class="actions">
                                            <span>{$nomeCategoriaBlog}</span>
                                            <div class="author">
                                                <img loading="lazy" src="../assets/uploads/{$blog->imagemAutorBlog}" alt="{$blog->nomeAutorBlog}" />
                                                <span>{$blog->nomeAutorBlog}</span>
                                            </div>
                                            <button class="blue-btn small">
                                                Veja mais
                                            </button>
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
            <a href="../blog" class="blue-btn center small">Abrir mais</a>
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
        const otherBlogsSwiper = document.querySelector(".other-blogs-swiper");
        window.addEventListener("DOMContentLoaded", () => {
        addContainerClassToDesktop(whiteBg);
        addContainerClassToDesktop(otherBlogsSwiper);
        });

        window.addEventListener("resize", () => {
        addContainerClassToDesktop(whiteBg);
        addContainerClassToDesktop(otherBlogsSwiper);
        });
    </script>
    <script>
        $(document).ready(function () {
        $(".other-blogs-swiper").slick({
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
</body>

</html>