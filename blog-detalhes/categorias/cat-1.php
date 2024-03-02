<?php

include_once "../../assets/componentes.php";
include_once "../../painel/backend/conexao-banco.php";

$nomeDoArquivoCompleto = $_SERVER["SCRIPT_FILENAME"];
$nomeDoArquivoSemExtensao = pathinfo($nomeDoArquivoCompleto, PATHINFO_FILENAME);

$paginaSelecionada = $nomeDoArquivoSemExtensao;

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE nomePagina = :nomePagina AND categoriaId = :categoriaId");
$sqlSeo->bindValue(":nomePagina", $paginaSelecionada);
$sqlSeo->bindValue(":categoriaId", 20);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", 10);
$sqlConteudos->execute();
$conteudosArray = $sqlConteudos->fetchAll(PDO::FETCH_ASSOC);
$conteudosArray = json_decode(json_encode($conteudosArray));

$sqlBlogs = $con->prepare("SELECT p.*, c.* FROM paginas p, blogs c WHERE c.paginaId = p.idPagina AND c.status = 1");
$sqlBlogs->execute();
$blogsArray = $sqlBlogs->fetchAll(PDO::FETCH_ASSOC);
$blogsArray = json_decode(json_encode($blogsArray));

$sqlCategorias = $con->prepare("SELECT * FROM categorias c, paginas p WHERE c.paginaId = p.idPagina AND c.tipoCategoria = :tipoCategoria");
$sqlCategorias->bindValue(":tipoCategoria", 1);
$sqlCategorias->execute();
$categoriasArray = $sqlCategorias->fetchAll(PDO::FETCH_ASSOC);
$categoriasArray = json_decode(json_encode($categoriasArray));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tags Open Graph -->
    <meta property="og:title" content="<?php echo $conteudoSeo["tituloPagina"] ?>">
    <meta property="og:description" content="<?php echo $conteudoSeo["descricaoPagina"] ?>">
    <meta property="og:url" content="<?php echo BASE_URL.'/'. $conteudoSeo["nomePagina"] ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo $conteudoSeo["imagemPagina"] ?>">
    <meta property="og:image:alt" content="<?php echo $conteudoSeo["legendaImagemPagina"] ?>">
    <meta name="description" content="<?php echo $conteudoSeo["descricaoPagina"] ?>">
    <meta name="keywords" content="<?php echo $conteudoSeo["palavrasChavesPagina"] ?>">
    <meta name="robots" content="index,follow">
    <meta name="rating" content="General">
    <meta name="revisit-after" content="7 days">
    <title><?php echo $conteudoSeo["tituloPagina"] ?></title>

    <?php linksHead(); ?>

    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../css/blog.css">
</head>

<body>
    <?php
    foreach ($conteudosArray as $conteudo) {
        if($conteudo->numeroConteudo == 1){
            banner(
                "{$conteudoSeo['tituloPagina']}",
                "{$conteudo->legendaImagem1Conteudo}",
                "{$conteudo->legendaImagem2Conteudo}",
                "../../assets/uploads/{$conteudo->imagem1Conteudo}",
                "../../assets/uploads/{$conteudo->imagem2Conteudo}"
            ); 
        }
    }
    ?>

    <section class="blogs">
        <div class="shaped-content container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="container">
                        <div class="filter" data-filter="category">
                            <h1>Categorias</h1>
                            <button class="active" data-category="" data-url="/blog">Todas as Categorias</button>
                            <?php
                                foreach ($categoriasArray as $categoria) {
                                    echo <<<HTML
                                    <button data-url="../../blog-detalhes/categorias/{$categoria->nomePagina}" data-category="{$categoria->idCategoria}">{$categoria->nomeCategoria}</button>
                                    HTML;
                                }
                            ?>
                        </div>
                        <div class=" tag-filter">
                            <h1>Tags</h1>
                            <div class="buttons">
                                <?php
                                    foreach ($blogsArray as $row) {
                                        $tagsBlog = $row->tagsBlog;

                                        $tags = explode(",", $tagsBlog);

                                        foreach ($tags as &$tag) {
                                            echo <<<HTML
                                            <button data-tag="{$tag}">{$tag}</button>
                                            HTML;
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <?php
                            foreach ($blogsArray as $blog) {

                                $dataBlog = $blog->dataBlog;
                                $categoriasId = $blog->categoriasId;

                                $dataBlog = new DateTime($dataBlog);
                                $dataBlog = $dataBlog->format('d/m/Y');

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
                                <a data-category="{$categoriasBlog}" data-tag="{$blog->tagsBlog}" href="../../blog-detalhes/{$blog->nomePagina}" class="col-12
                                    col-lg-6 card-blog-wrapper">
                                    <div class="card-blog">
                                        <img src="../../assets/uploads/{$blog->imagemBlog}" alt="{$blog->legendaImagemBlog}">
                                        <div>
                                            <span class="tag">{$nomeCategoriaBlog}</span><span class="date">{$dataBlog}</span>
                                        </div>
                                        <h1>{$blog->tituloBlog}</h1>
                                        <div class="outline-button">
                                            Ler mais
                                            <img src="../../assets/svg/seta-dir-marrom.svg" alt="Ler Mais">
                                        </div>
                                    </div>
                                </a>
                                HTML;
                            }
                        ?>
                        
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
    <script src="../../javascript/global.js"></script>
    <script src="../../javascript/filter.js"></script>
</body>

</html>