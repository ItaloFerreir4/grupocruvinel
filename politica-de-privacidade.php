<?php

include_once "assets/componentes.php";
include_once "painel/backend/conexao-banco.php";

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE idPagina = :idPagina");
$sqlSeo->bindValue(":idPagina", 2);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
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

ob_start();
redesSociais("marrom");
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

    <link rel="icon" type="image/svg" href="assets/svg/favicon.svg">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/politica-de-privacidade.css">
</head>

<body>
    <?php cHeader(); ?>
    <?php
    foreach ($conteudosArray as $conteudo) {
        if ($conteudo->numeroConteudo == 1) {
            banner(
                "POLÍTICA DE PRIVACIDADE",
                "POLÍTICA DE PRIVACIDADE",
                "POLÍTICA DE PRIVACIDADE",
                "./assets/uploads/{$conteudo->imagem1Conteudo}",
                "./assets/uploads/{$conteudo->imagem2Conteudo}"
            );
        }
    }
    ?>
    <div class="terms">
        <div class="container shaped-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti possimus ipsa repellendus reiciendis.
                Distinctio, quidem dignissimos mollitia recusandae id dolor eaque ipsam doloribus eius unde a
                necessitatibus natus quam expedita consequuntur commodi cum iure adipisci assumenda voluptatem explicabo
                molestiae sapiente provident exercitationem! Obcaecati dicta quam eius adipisci odit rerum magni!</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus ipsa unde vero asperiores eum optio.
                Officia perferendis deserunt atque. Excepturi doloremque unde animi vitae adipisci, at explicabo tempora
                quasi laborum!</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci, quam?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta incidunt quis a, saepe est nihil obcaecati
                commodi. Incidunt blanditiis labore tenetur quos itaque eaque et deleniti recusandae similique. Velit
                quibusdam minus ab expedita perferendis necessitatibus aspernatur cum nobis possimus inventore labore,
                distinctio nihil, eos repellendus autem modi? Aliquid accusamus error dolor libero, beatae vitae,
                aperiam corporis atque expedita culpa recusandae? Tenetur eius nisi beatae aliquam optio ipsum,
                praesentium atque explicabo fugit a reiciendis enim iure doloremque doloribus iste fuga officiis.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, molestias, deleniti tenetur temporibus
                consectetur reprehenderit illo accusamus, fuga tempora omnis rerum quisquam ea! Ratione obcaecati esse
                ex unde, commodi repellendus accusamus beatae culpa voluptatum id pariatur animi nemo aliquid.
                Reiciendis qui voluptatum facilis quam ipsam?</p>
        </div>
    </div>

    <?php cFooter(); ?>
    <?php elementosGerais(); ?>
    <script src="javascript/global.js"></script>
</body>

</html>