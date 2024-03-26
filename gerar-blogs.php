<?php

include_once "painel/backend/conexao-banco.php";

$sql = $con->prepare("SELECT * FROM blog_old");
$sql->execute();
$blogsOld = $sql->fetchAll(PDO::FETCH_ASSOC);
$blogsOld = json_decode(json_encode($blogsOld));

$ok = false;

foreach ($blogsOld as $blog) {
    $sql = $con->prepare('INSERT INTO paginas(categoriaId, nomePagina, tituloPagina, descricaoPagina, imagemPagina, legendaImagemPagina, palavrasChavesPagina) VALUES(:categoriaId, :nomePagina, :tituloPagina, :descricaoPagina, :imagemPagina, :legendaImagemPagina, :palavrasChavesPagina)');
    $sql->bindValue(":categoriaId", 10);
    $sql->bindValue(":nomePagina", $blog->slug);
    $sql->bindValue(":tituloPagina", $blog->seo_title);
    $sql->bindValue(":descricaoPagina", $blog->seo_description);
    $sql->bindValue(":imagemPagina", null);
    $sql->bindValue(":legendaImagemPagina", 'colocar');
    $sql->bindValue(":palavrasChavesPagina", 'colocar');

    if ($sql->execute()) {

        $paginaId = $con->lastInsertId();

        $sql = $con->prepare('INSERT INTO 
        blogs(paginaId, tituloBlog, subTituloBlog, imagemBlog, legendaImagemBlog, fonteImagemBlog, nomeAutorBlog, imagemAutorBlog, dataBlog, tempoLeituraBlog, tagsBlog, textoBlog, status) 
        VALUES(:paginaId, :tituloBlog, :subTituloBlog, :imagemBlog, :legendaImagemBlog, :fonteImagemBlog, :nomeAutorBlog, :imagemAutorBlog, :dataBlog, :tempoLeituraBlog, :tagsBlog, :textoBlog, :status)');
        $sql->bindValue(":paginaId", $paginaId);
        $sql->bindValue(":tituloBlog", $blog->title);
        $sql->bindValue(":subTituloBlog", $blog->lead);
        $sql->bindValue(":imagemBlog", $blog->image);
        $sql->bindValue(":legendaImagemBlog", $blog->title);
        $sql->bindValue(":fonteImagemBlog", 'COLOCAR');
        $sql->bindValue(":nomeAutorBlog", 'COLOCAR');
        $sql->bindValue(":imagemAutorBlog", NULL);
        $sql->bindValue(":dataBlog", $blog->date_update);
        $sql->bindValue(":tempoLeituraBlog", $blog->time_read);
        $sql->bindValue(":tagsBlog", $blog->tags);
        $sql->bindValue(":textoBlog", $blog->text);
        $sql->bindValue(":status", 1);
        if ($sql->execute()) {
            $numerosConteudo = [1];
    
            foreach ($numerosConteudo as $numero) {
                $sql = $con->prepare('INSERT INTO conteudos(paginaId, numeroConteudo) VALUES(:paginaId, :numeroConteudo)');
                $sql->bindValue(":paginaId", $paginaId);
                $sql->bindValue(":numeroConteudo", $numero);
                
                if ($sql->execute()) {
                    $ok = true;
                } else {
                    echo 'erro conteudo';
                }
            }
        } else {
            echo 'erro blog';
        }

    }
}

if($ok){
    $sql = $con->prepare("DROP TABLE blog_old");
    $sql->execute();
}

?>
