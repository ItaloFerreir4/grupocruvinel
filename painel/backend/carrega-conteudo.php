<?php
session_start();

include_once './conexao-banco.php';

if (isset($_POST['origem'])) {

    switch ($_POST['origem']) {

        case "verificaPagina":
            $sqlCount = $con->prepare("SELECT COUNT(*) AS totalPaginas FROM paginas WHERE nomePagina = :nomePagina");
            $sqlCount->bindValue(":nomePagina", $_POST['nomePagina']);
            if ($sqlCount->execute()) {

                $totalPaginas = $sqlCount->fetch(PDO::FETCH_ASSOC)['totalPaginas'];
            }

            if ($totalPaginas > 0) {
                echo false;
            } else {
                echo true;
            }
            break;

        case "verificaDestaque":
            $sql = $con->prepare("SELECT COUNT(*) AS totalPaginas FROM destaques WHERE idItem = :idItem AND categoria = :categoria");
            $sql->bindValue(":idItem", $_POST['idItem']);
            $sql->bindValue(":categoria", $_POST['categoria']);

            if ($sql->execute()) {

                $totalPaginas = $sql->fetch(PDO::FETCH_ASSOC)['totalPaginas'];
                if ($totalPaginas >= 1) {
                    echo true;
                } else {
                    echo false;
                }
            }
            break;

        case "listaPagina":
            $sqlCount = $con->prepare("SELECT COUNT(*) AS totalPaginas FROM paginas WHERE categoriaId = :categoriaId");
            $sqlCount->bindValue(":categoriaId", $_POST['categoriaId']);
            if ($sqlCount->execute()) {

                $totalPaginas = $sqlCount->fetch(PDO::FETCH_ASSOC)['totalPaginas'];
            }

            $sql = $con->prepare("SELECT * FROM paginas WHERE categoriaId = :categoriaId");
            $sql->bindValue(":categoriaId", $_POST['categoriaId']);

            if ($sql->execute()) {

                $conteudoPagina = $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            $resultado = array(
                'totalPaginas' => $totalPaginas,
                'paginas' => $conteudoPagina
            );

            echo json_encode($resultado);
            break;

        case "listaImagens":
            $sqlCount = $con->prepare("SELECT COUNT(*) AS totalPaginas FROM imagens");
            if ($sqlCount->execute()) {

                $totalPaginas = $sqlCount->fetch(PDO::FETCH_ASSOC)['totalPaginas'];
            }

            $sql = $con->prepare("SELECT * FROM imagens ORDER BY idImagem DESC");

            if ($sql->execute()) {

                $conteudoPagina = $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            $resultado = array(
                'totalPaginas' => $totalPaginas,
                'paginas' => $conteudoPagina
            );

            echo json_encode($resultado);
            break;

        case "seo":
            $idPagina = $_POST['idPagina'];

            $sql = $con->prepare("SELECT * FROM paginas WHERE idPagina = ?");
            $sql->bindValue(1, $idPagina);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaContatos":
            $sql = $con->prepare("SELECT * FROM contatos WHERE idContato = :idContato");
            $sql->bindValue(":idContato", $_POST['idContato']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaRedes":
            $sql = $con->prepare("SELECT * FROM redes WHERE idRede = :idRede");
            $sql->bindValue(":idRede", $_POST['idRede']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaEmails":
            $sql = $con->prepare("SELECT * FROM formularios WHERE idFormulario = :idFormulario");
            $sql->bindValue(":idFormulario", 1);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaConteudo":
            if (isset($_POST['idConteudo']) && $_POST['idConteudo'] != "" && $_POST['idConteudo'] != "0") {
                $sql = $con->prepare("SELECT * FROM conteudos WHERE idConteudo = :idConteudo");
                $sql->bindValue(":idConteudo", $_POST['idConteudo']);

                if ($sql->execute()) {
                    $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                    echo json_encode($conteudoPagina);
                }
            } else {

                $sql = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :paginaId AND numeroConteudo = :numeroConteudo");
                $sql->bindValue(":paginaId", $_POST['paginaId']);
                $sql->bindValue(":numeroConteudo", $_POST['numeroConteudo']);

                if ($sql->execute()) {
                    $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                    echo json_encode($conteudoPagina);
                }
            }
            break;

        case "listaConteudo":
            $sql = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :paginaId AND numeroConteudo = :numeroConteudo");
            $sql->bindValue(":paginaId", $_POST['paginaId']);
            $sql->bindValue(":numeroConteudo", $_POST['numeroConteudo']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetchAll(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "listaCategorias":
            $sql = $con->prepare("SELECT * FROM categorias WHERE tipoCategoria = :tipoCategoria");
            $sql->bindValue(":tipoCategoria", $_POST['tipoCategoria']);

            if ($sql->execute()) {

                $conteudoPagina = $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            echo json_encode($conteudoPagina);
            break;

        case "carregaCategoria":
            $sql = $con->prepare("SELECT * FROM categorias WHERE paginaId = :paginaId");
            $sql->bindValue(":paginaId", $_POST['paginaId']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaBlog":
            $sql = $con->prepare("SELECT * FROM blogs WHERE paginaId = :paginaId");
            $sql->bindValue(":paginaId", $_POST['paginaId']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaSaiuNaMidia":
            $sql = $con->prepare("SELECT * FROM saiunamidias WHERE paginaId = :paginaId");
            $sql->bindValue(":paginaId", $_POST['paginaId']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaArtigo":
            $sql = $con->prepare("SELECT * FROM artigos WHERE paginaId = :paginaId");
            $sql->bindValue(":paginaId", $_POST['paginaId']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaBusiness":
            $sql = $con->prepare("SELECT * FROM business WHERE paginaId = :paginaId");
            $sql->bindValue(":paginaId", $_POST['paginaId']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaLivro":
            $sql = $con->prepare("SELECT * FROM livros WHERE paginaId = :paginaId");
            $sql->bindValue(":paginaId", $_POST['paginaId']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaPalestra":
            $sql = $con->prepare("SELECT * FROM palestras WHERE paginaId = :paginaId");
            $sql->bindValue(":paginaId", $_POST['paginaId']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaMentoria":
            $sql = $con->prepare("SELECT * FROM mentorias WHERE paginaId = :paginaId");
            $sql->bindValue(":paginaId", $_POST['paginaId']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaConsultoria":
            $sql = $con->prepare("SELECT * FROM consultorias WHERE paginaId = :paginaId");
            $sql->bindValue(":paginaId", $_POST['paginaId']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaEvento":
            $sql = $con->prepare("SELECT * FROM eventos WHERE paginaId = :paginaId");
            $sql->bindValue(":paginaId", $_POST['paginaId']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaCurso":
            $sql = $con->prepare("SELECT * FROM cursos WHERE paginaId = :paginaId");
            $sql->bindValue(":paginaId", $_POST['paginaId']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "listaAgendas":
            $sql = $con->prepare("SELECT * FROM agendas");

            if ($sql->execute()) {

                $conteudoPagina = $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            echo json_encode($conteudoPagina);
            break;

        case "carregaAgenda":
            $sql = $con->prepare("SELECT * FROM agendas WHERE idAgenda = :idAgenda");
            $sql->bindValue(":idAgenda", $_POST['idAgenda']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "listaVideos":
            $sql = $con->prepare("SELECT * FROM videos");

            if ($sql->execute()) {

                $conteudoPagina = $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            echo json_encode($conteudoPagina);
            break;

        case "carregaVideo":
            $sql = $con->prepare("SELECT * FROM videos WHERE idVideo = :idVideo");
            $sql->bindValue(":idVideo", $_POST['idVideo']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "listaPodcasts":
            $sql = $con->prepare("SELECT * FROM podcasts");

            if ($sql->execute()) {

                $conteudoPagina = $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            echo json_encode($conteudoPagina);
            break;

        case "carregaPodcast":
            $sql = $con->prepare("SELECT * FROM podcasts WHERE idPodcast = :idPodcast");
            $sql->bindValue(":idPodcast", $_POST['idPodcast']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaWorkshop":
            $sql = $con->prepare("SELECT * FROM workshops WHERE paginaId = :paginaId");
            $sql->bindValue(":paginaId", $_POST['paginaId']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaFormulario":
            if (isset($_POST['paginaId']) && $_POST['paginaId'] != "0") {
                $sql = $con->prepare("SELECT * FROM formularios WHERE paginaId = :paginaId");
                $sql->bindValue(":paginaId", $_POST['paginaId']);

                if ($sql->execute()) {
                    $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                    echo json_encode($conteudoPagina);
                }
            } else {

                $sql = $con->prepare("SELECT * FROM formularios WHERE descricaoFormulario = :descricaoFormulario");
                $sql->bindValue(":descricaoFormulario", $_POST['descricaoFormulario']);

                if ($sql->execute()) {
                    $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                    echo json_encode($conteudoPagina);
                }
            }
            break;

        case "listaLog":

            $sql = $con->prepare("SELECT * FROM logs JOIN usuarios ON usuarios.idUsuario = logs.usuarioId");
            if ($sql->execute()) {
                $conteudos = $sql->fetchAll(PDO::FETCH_ASSOC);

                echo json_encode($conteudos);
            }

            break;

        case "listaPerguntas":

            $sql = $con->prepare("SELECT * FROM perguntas pe, paginas pa WHERE pe.paginaId = pa.idPagina");
            if ($sql->execute()) {
                $conteudos = $sql->fetchAll(PDO::FETCH_ASSOC);

                echo json_encode($conteudos);
            }

            break;

        case "carregaPergunta":

            $sql = $con->prepare("SELECT * FROM perguntas pe, paginas pa WHERE pe.idPergunta = :idPergunta AND pe.paginaId = pa.idPagina");
            $sql->bindValue(":idPergunta", $_POST['idPergunta']);
            if ($sql->execute()) {
                $conteudos = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudos);
            }

            break;

        case "listaPaginasPerguntas":

            $categoriaIds = [13]; // Adicione os IDs das categorias desejadas aqui

            foreach ($categoriaIds as $categoriaId) {
                $sql = $con->prepare("SELECT * FROM paginas WHERE categoriaId = :categoriaId");
                $sql->bindValue(":categoriaId", $categoriaId);

                if ($sql->execute()) {
                    $conteudos = $sql->fetchAll(PDO::FETCH_ASSOC);
                    echo json_encode($conteudos);
                } else {
                    echo false;
                }
            }
            break;
        case "listaEmails":
            $sql = $con->prepare("SELECT * FROM emails");
            if ($sql->execute()) {
                $conteudos = $sql->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($conteudos);
            }
            break;
        case "carregaInstagram":
            $sql = $con->prepare("SELECT * FROM instagram WHERE idInstagram = :idInstagram");
            $sql->bindValue(":idInstagram", 1);
            if ($sql->execute()) {
                $conteudos = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudos);
            }

            break;
        case "listaServicos":
            $sql = $con->prepare("SELECT * FROM servicos");

            if ($sql->execute()) {

                $conteudoPagina = $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            echo json_encode($conteudoPagina);
            break;

        case "carregaServico":
            $sql = $con->prepare("SELECT * FROM servicos WHERE idServico = :idServico");
            $sql->bindValue(":idServico", $_POST['idServico']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;
        case "listaClientes":
            $sql = $con->prepare("SELECT * FROM clientes");

            if ($sql->execute()) {

                $conteudoPagina = $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            echo json_encode($conteudoPagina);
            break;
        
        case "listaUsuarios":
            $sql = $con->prepare("SELECT * FROM usuarios");

            if ($sql->execute()) {

                $conteudoPagina = $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            echo json_encode($conteudoPagina);
            break;

        case "carregaUser":
            $sql = $con->prepare("SELECT * FROM usuarios WHERE idUsuario = :idUsuario");
            $sql->bindValue(":idUsuario", $_POST['idUsuario']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;

        case "carregaCliente":
            $sql = $con->prepare("SELECT * FROM clientes WHERE idCliente = :idCliente");
            $sql->bindValue(":idCliente", $_POST['idCliente']);

            if ($sql->execute()) {
                $conteudoPagina = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudoPagina);
            }
            break;
            
        case "carregaScriptHead":

            $sql = $con->prepare("SELECT * FROM scripts WHERE tipoScript = :tipoScript");
            $sql->bindValue(":tipoScript", 'head');
            if ($sql->execute()) {
                $conteudos = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudos);
            }
        break;

        case "carregaScriptIniBody":

            $sql = $con->prepare("SELECT * FROM scripts WHERE tipoScript = :tipoScript");
            $sql->bindValue(":tipoScript", 'iniBody');
            if ($sql->execute()) {
                $conteudos = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudos);
            }
        break;

        case "carregaScriptFimBody":

            $sql = $con->prepare("SELECT * FROM scripts WHERE tipoScript = :tipoScript");
            $sql->bindValue(":tipoScript", 'fimBody');
            if ($sql->execute()) {
                $conteudos = $sql->fetch(PDO::FETCH_ASSOC);

                echo json_encode($conteudos);
            }
        break;
    
    }
}
