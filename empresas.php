<?php

include_once "assets/componentes.php";
include_once "painel/backend/conexao-banco.php";

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE idPagina = :idPagina");
$sqlSeo->bindValue(":idPagina", 3);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlConteudos->execute();
$conteudosArray = $sqlConteudos->fetchAll(PDO::FETCH_ASSOC);
$conteudosArray = json_decode(json_encode($conteudosArray));

$sqlEmpresas = $con->prepare("SELECT p.*, c.* FROM paginas p, business c WHERE c.paginaId = p.idPagina AND c.status = 1");
$sqlEmpresas->execute();
$empresasArray = $sqlEmpresas->fetchAll(PDO::FETCH_ASSOC);
$empresasArray = json_decode(json_encode($empresasArray));

?>

<!DOCTYPE html>
<html lang="pt-br">

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
    
    <link rel="icon" type="image/svg" href="assets/svg/favicon.svg">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/empresas.css">
</head>

<body>
    <?php cHeader(); ?>
    <?php
    foreach ($conteudosArray as $conteudo) {
        if($conteudo->numeroConteudo == 1){
            banner(
                "Empresas",
                "{$conteudo->legendaImagem1Conteudo}",
                "{$conteudo->legendaImagem2Conteudo}",
                "./assets/uploads/{$conteudo->imagem1Conteudo}",
                "./assets/uploads/{$conteudo->imagem2Conteudo}"
            ); 
        }
    }
    ?>

    <section class="companies">
        <div class="shaped-content container">
            <?php
                foreach ($empresasArray as $empresa) {
                    echo <<<HTML
                    <div class="company-card-wrapper">
                        <a href="./empresa-detalhes/{$empresa->nomePagina}">
                            <div class="company-card">
                                <div class="img-container">
                                    <img src="assets/uploads/{$empresa->imagemBusiness}" alt="{$empresa->legendaImagemBusiness}">
                                </div>
                                <div class="content">
                                    <h1>{$empresa->nomeBusiness}</h1>
                                    {$empresa->tituloBusiness}
                                    <a href="./empresa-detalhes/{$empresa->nomePagina}" class="outline-button">
                                        Saiba Mais
                                        <img src="assets/svg/seta-dir-marrom.svg" alt="Saiba Mais">
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                    HTML;
                }
            ?>
            <button class="outline-button load-more" onclick="loadMore(listElements)">
                Carregar Mais
                <img src="./assets/svg/seta-dir-marrom.svg" alt="Carregar mais">
            </button>
        </div>
    </section>
    <?php cFooter(); ?>
    <?php elementosGerais(); ?>
    <?php scriptBody(); ?>
     <script>
        let maxVisibleElements = 6;
        const listElements = document.querySelectorAll(".company-card-wrapper");

        sessionStorage.setItem("t", "");
        sessionStorage.setItem("y", new Date().getFullYear().toString().substring(2, 2));
        sessionStorage.setItem("m", "");
    </script>
    <script src="javascript/global.js"></script>
    <script src="javascript/filter.js"></script>
</body>

</html>