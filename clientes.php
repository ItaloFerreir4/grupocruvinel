<?php

include_once "assets/componentes.php";
include_once "painel/backend/conexao-banco.php";

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE idPagina = :idPagina");
$sqlSeo->bindValue(":idPagina", 4);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlConteudos->execute();
$conteudosArray = $sqlConteudos->fetchAll(PDO::FETCH_ASSOC);
$conteudosArray = json_decode(json_encode($conteudosArray));

$sqlClientes = $con->prepare("SELECT * FROM clientes WHERE status = 1");
$sqlClientes->execute();
$clientesArray = $sqlClientes->fetchAll(PDO::FETCH_ASSOC);
$clientesArray = json_decode(json_encode($clientesArray));

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

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/clientes.css">
</head>

<body>
    <?php
    foreach ($conteudosArray as $conteudo) {
        if($conteudo->numeroConteudo == 1){
            banner(
                "CLIENTES",
                "{$conteudo->legendaImagem1Conteudo}",
                "{$conteudo->legendaImagem2Conteudo}",
                "./assets/uploads/{$conteudo->imagem1Conteudo}",
                "./assets/uploads/{$conteudo->imagem2Conteudo}"
            ); 
        }
    }
    ?>

    <section class="clients">
        <div class="shaped-content container">
            <div class="grid-content">
                <?php
                foreach ($clientesArray as $cliente) {
                    echo <<<HTML
                    <a href="{$cliente->linkCliente}" class="client-wrapper">
                        <div class="client">
                            <img src="assets/uploads/{$cliente->imagemCliente}" alt="{$cliente->legendaImagemCliente}">
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
    </section>

    <!-- -------------------------------- -->
    <!-- ADICIONAR COMPONENTE DE BUSINESS -->
    <!-- -------------------------------- -->

    <script>
        let maxVisibleElements = 12;
        const listElements = document.querySelectorAll(".client-wrapper");

        sessionStorage.setItem("t", "");
        sessionStorage.setItem("y", new Date().getFullYear().toString().substring(2, 2));
        sessionStorage.setItem("m", "");
    </script>
    <script src="javascript/global.js"></script>
    <script src="javascript/filter.js"></script>
</body>

</html>