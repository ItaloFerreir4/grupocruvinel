<?php

include_once "painel/backend/conexao-banco.php";

$sql = $con->prepare("SELECT * FROM blog_category");
$sql->execute();
$blogsOld = $sql->fetchAll(PDO::FETCH_ASSOC);
$blogsOld = json_decode(json_encode($blogsOld));

$ok = false;

foreach ($blogsOld as $blog) {
    $sql = $con->prepare('INSERT INTO paginas(categoriaId, nomePagina, tituloPagina, descricaoPagina, imagemPagina, legendaImagemPagina, palavrasChavesPagina) VALUES(:categoriaId, :nomePagina, :tituloPagina, :descricaoPagina, :imagemPagina, :legendaImagemPagina, :palavrasChavesPagina)');
    $sql->bindValue(":categoriaId", 20);
    $sql->bindValue(":nomePagina", $blog->slug);
    $sql->bindValue(":tituloPagina", $blog->seo_title);
    $sql->bindValue(":descricaoPagina", $blog->seo_description);
    $sql->bindValue(":imagemPagina", null);
    $sql->bindValue(":legendaImagemPagina", 'colocar');
    $sql->bindValue(":palavrasChavesPagina", 'colocar');

    if ($sql->execute()) {

        $paginaId = $con->lastInsertId();

        $sql = $con->prepare('INSERT INTO 
        categorias(paginaId, tipoCategoria, nomeCategoria) 
        VALUES(:paginaId, :tipoCategoria, :nomeCategoria)');
        $sql->bindValue(":paginaId", $paginaId);
        $sql->bindValue(":tipoCategoria", '1');
        $sql->bindValue(":nomeCategoria", $blog->title);
        if ($sql->execute()) {
            $ok = true;
        } else {
            echo 'erro categoria';
        }

    }
}

if($ok){
    $sql = $con->prepare("DROP TABLE blog_category");
    $sql->execute();
}

?>
