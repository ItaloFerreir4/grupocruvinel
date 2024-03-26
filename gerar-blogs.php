<?php

include_once "painel/backend/conexao-banco.php";

$sql = $con->prepare("SELECT * FROM blogsold");
$sql->execute();
$blogsOld = $sql->fetchAll(PDO::FETCH_ASSOC);
$blogsOld = json_decode(json_encode($blogsOld));

foreach ($blogsOld as $blog) {
    $sql = $con->prepare('INSERT INTO paginas(categoriaId, nomePagina, tituloPagina, descricaoPagina, imagemPagina, legendaImagemPagina, palavrasChavesPagina) VALUES(:categoriaId, :nomePagina, :tituloPagina, :descricaoPagina, :imagemPagina, :legendaImagemPagina, :palavrasChavesPagina)');
    $sql->bindValue(":categoriaId", 10);
    $sql->bindValue(":nomePagina", $blog->titulo);
    $sql->bindValue(":tituloPagina", $blog->titulo);
    $sql->bindValue(":descricaoPagina", $blog->titulo);
    $sql->bindValue(":imagemPagina", $blog->titulo);
    $sql->bindValue(":legendaImagemPagina", $blog->titulo);
    $sql->bindValue(":palavrasChavesPagina", $blog->titulo);

    if ($sql->execute()) {

        $last_id = $con->lastInsertId();

        $sql = $con->prepare('INSERT INTO blogs(paginaId) VALUES(:paginaId)');
        $sql->bindValue(":paginaId", $last_id);
        if ($sql->execute()) {
            // echo true;
        } else {
            echo false;
        }

        $numerosConteudo = [1];

        foreach ($numerosConteudo as $numero) {
            $sql = $con->prepare('INSERT INTO conteudos(paginaId, numeroConteudo) VALUES(:paginaId, :numeroConteudo)');
            $sql->bindValue(":paginaId", $last_id);
            $sql->bindValue(":numeroConteudo", $numero);
            
            if ($sql->execute()) {
                // echo true;
            } else {
                echo false;
            }
        }
    }
}

?>
