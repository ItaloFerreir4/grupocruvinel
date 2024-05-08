<?php
session_start();

include_once './conexao-banco.php';
include_once './gerar-pagina.php';

//Verificar se o usuário está logado
if (!isset($_SESSION['idUsuario'])) {
    header('Location: ../login.php');
    exit;
}

if (isset($_POST['origem'])) {

    switch ($_POST['origem']) {

        case "atualizaSeo":
            if ($_POST['categoriaId'] == "0") {
                try {
                    $sql = $con->prepare('UPDATE paginas SET tituloPagina = :tituloPagina, descricaoPagina = :descricaoPagina, imagemPagina = :imagemPagina, legendaImagemPagina = :legendaImagemPagina, palavrasChavesPagina = :palavrasChavesPagina WHERE nomePagina = :nomePagina');
                    $sql->bindValue(":tituloPagina", $_POST['tituloPagina']);
                    $sql->bindValue(":descricaoPagina", $_POST['descricaoPagina']);
                    $sql->bindValue(":imagemPagina", $_POST['imagemPagina']);
                    $sql->bindValue(":legendaImagemPagina", $_POST['legendaImagemPagina']);
                    $sql->bindValue(":palavrasChavesPagina", $_POST['palavrasChavesPagina']);
                    $sql->bindValue(":nomePagina", $_POST['nomePagina']);
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }

                    //Operações do log

                    $sqlInfos = $con->prepare("SELECT * from paginas WHERE nomePagina = :nomePagina");
                    $sqlInfos->bindValue(":nomePagina", $_POST['nomePagina']);
                    if ($sqlInfos->execute()) {
                        $conteudoPagina = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                        $actionLog = "editou as informações de SEO da página fixa: " . $_POST['nomePagina'] . " de ID: " . $conteudoPagina['idPagina'];

                        $dateLog = new DateTime();
                        $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                        $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                        $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                        $sql->bindValue(":acaoLogs", $actionLog);
                        $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                        if ($sql->execute()) {
                            echo true;
                        } else {
                            echo false;
                        }
                    }
                } catch (PDOException $e) {
                    // echo "Erro: " . $e->getMessage();
                    echo false;
                }
            } else {
                try {
                    $sql = $con->prepare('UPDATE paginas SET nomePagina = :nomePaginaNew, tituloPagina = :tituloPagina, descricaoPagina = :descricaoPagina, imagemPagina = :imagemPagina, legendaImagemPagina = :legendaImagemPagina, palavrasChavesPagina = :palavrasChavesPagina WHERE nomePagina = :nomePagina');
                    $sql->bindValue(":nomePaginaNew", $_POST['nomePaginaNew']);
                    $sql->bindValue(":tituloPagina", $_POST['tituloPagina']);
                    $sql->bindValue(":descricaoPagina", $_POST['descricaoPagina']);
                    $sql->bindValue(":imagemPagina", $_POST['imagemPagina']);
                    $sql->bindValue(":legendaImagemPagina", $_POST['legendaImagemPagina']);
                    $sql->bindValue(":palavrasChavesPagina", $_POST['palavrasChavesPagina']);
                    $sql->bindValue(":nomePagina", $_POST['nomePagina']);
                    if ($sql->execute()) {
                        echo true;

                        $categoriaId = $_POST['categoriaId'];
                        $baseDirectory = '../..'; // Substitua pelo caminho real do diretório raiz do seu servidor

                        // Mapeia a categoriaId para o diretório correspondente
                        $mapeamentoDiretorio = [
                            '3' => 'empresa-detalhes',
                            '4' => 'workshop-detalhes',
                            '6' => 'mentoria-detalhes',
                            '8' => 'consultoria-detalhes',
                            '9' => 'evento-detalhes',
                            '10' => 'blog-detalhes',
                            '11' => 'saiu-na-midia-detalhes',
                            '12' => 'livro-detalhes',
                            '13' => 'curso-detalhes',
                            '20' => 'blog-detalhes/categorias',
                            '21' => 'saiu-na-midia-detalhes/categorias',
                            '22' => 'video-detalhes/categorias',
                            '23' => 'podcast-detalhes/categorias',
                            '24' => 'palestra-detalhes',
                            '25' => 'artigo-detalhes',
                            '26' => 'artigo-detalhes/categorias',
                            '27' => 'ebook-detalhes'
                        ];

                        // Verifica se a categoriaId existe no mapeamento
                        if (isset($mapeamentoDiretorio[$categoriaId])) {
                            $diretorio = $mapeamentoDiretorio[$categoriaId];
                            $nomeArquivoAtual = $baseDirectory . '/' . $diretorio . '/' . $_POST['nomePagina'] . '.php';
                            $novoNomeArquivo = $baseDirectory . '/' . $diretorio . '/' . $_POST['nomePaginaNew'] . '.php';

                            geraPagina($categoriaId, $diretorio, $_POST['nomePagina']);

                            if (file_exists($nomeArquivoAtual)) {
                                if (rename($nomeArquivoAtual, $novoNomeArquivo)) {
                                    echo "Arquivo renomeado com sucesso!";
                                } else {
                                    echo false;
                                }
                            } else {
                                echo false;
                            }
                        } else {
                            echo false;
                        }
                    } else {
                        echo false;
                    }

                    //Operações do log

                    $sqlInfos = $con->prepare("SELECT * from paginas WHERE nomePagina = :nomePagina");
                    $sqlInfos->bindValue(":nomePagina", $_POST['nomePagina']);
                    if ($sqlInfos->execute()) {
                        $conteudoPagina = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                        $actionLog = "editou as informações de SEO da página dinâmica: " . $_POST['nomePagina'] . " de ID: " . $conteudoPagina['idPagina'];

                        $dateLog = new DateTime();
                        $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                        $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                        $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                        $sql->bindValue(":acaoLogs", $actionLog);
                        $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                        if ($sql->execute()) {
                            echo true;
                        } else {
                            echo false;
                        }
                    }
                } catch (PDOException $e) {
                    // echo "Erro: " . $e->getMessage();
                    echo false;
                }
            }
            break;

        case "atualizaCategoria":
            try {
                $sql = $con->prepare('UPDATE categorias SET nomeCategoria = :nomeCategoria, tipoCategoria = :tipoCategoria WHERE paginaId = :paginaId');
                $sql->bindValue(":paginaId", $_POST['paginaId']);
                $sql->bindValue(":nomeCategoria", $_POST['nomeCategoria']);
                $sql->bindValue(":tipoCategoria", $_POST['tipoCategoria']);
                if ($sql->execute()) {
                    echo true;
                } else {
                    echo false;
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT * from categorias WHERE paginaId = :paginaId");
                $sqlInfos->bindValue(":paginaId", $_POST['paginaId']);
                if ($sqlInfos->execute()) {
                    $conteudoCategoria = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "editou as informações da categoria de ID: " . $conteudoCategoria['idCategoria'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaRede":
            try {
                $sql = $con->prepare('UPDATE redes SET  instagram = :instagram, facebook = :facebook, linkedin = :linkedin, twitter = :twitter, telegram = :telegram, pinterest = :pinterest, tiktok = :tiktok, youtube = :youtube WHERE idRede = :idRede');
                $sql->bindValue(":idRede", $_POST['idRede']);
                $sql->bindValue(":instagram", $_POST['instagram']);
                $sql->bindValue(":facebook", $_POST['facebook']);
                $sql->bindValue(":linkedin", $_POST['linkedin']);
                $sql->bindValue(":twitter", $_POST['twitter']);
                $sql->bindValue(":telegram", $_POST['telegram']);
                $sql->bindValue(":pinterest", $_POST['pinterest']);
                $sql->bindValue(":tiktok", $_POST['tiktok']);
                $sql->bindValue(":youtube", $_POST['youtube']);
                if ($sql->execute()) {
                    echo true;

                    //Operações do log
                    $actionLog = "editou as informações das redes sociais";

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaFormulario":
            if (isset($_POST['paginaId']) && $_POST['paginaId'] != "0") {
                try {
                    $sql = $con->prepare('UPDATE formularios SET  emailFormulario = :emailFormulario, select1Formulario = :select1Formulario, select2Formulario = :select2Formulario, select3Formulario = :select3Formulario, select4Formulario = :select4Formulario , select5Formulario = :select5Formulario , select6Formulario = :select6Formulario  WHERE paginaId = :paginaId');
                    $sql->bindValue(":paginaId", $_POST['paginaId']);
                    $sql->bindValue(":emailFormulario", $_POST['emailFormulario']);
                    $sql->bindValue(":select1Formulario", $_POST['select1Formulario']);
                    $sql->bindValue(":select2Formulario", $_POST['select2Formulario']);
                    $sql->bindValue(":select3Formulario", $_POST['select3Formulario']);
                    $sql->bindValue(":select4Formulario", $_POST['select4Formulario']);
                    $sql->bindValue(":select5Formulario", $_POST['select5Formulario']);
                    $sql->bindValue(":select6Formulario", $_POST['select6Formulario']);
                    if ($sql->execute()) {
                        echo true;
                    }

                    //Operações do log

                    $sqlInfos = $con->prepare("SELECT * from formularios WHERE paginaId = :paginaId");
                    $sqlInfos->bindValue(":paginaId", $_POST['paginaId']);
                    if ($sqlInfos->execute()) {
                        $conteudoFormulario = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                        $actionLog = "editou as informações do formulário de ID: " . $conteudoFormulario['idFormulario'] . " da página de ID: " . $_POST['paginaId'];

                        $dateLog = new DateTime();
                        $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                        $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                        $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                        $sql->bindValue(":acaoLogs", $actionLog);
                        $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                        if ($sql->execute()) {
                            echo true;
                        } else {
                            echo false;
                        }
                    }
                } catch (PDOException $e) {
                    // echo "Erro: " . $e->getMessage();
                    echo false;
                }
            } else {
                try {
                    $sql = $con->prepare('UPDATE formularios SET  emailFormulario = :emailFormulario, select1Formulario = :select1Formulario, select2Formulario = :select2Formulario, select3Formulario = :select3Formulario, select4Formulario = :select4Formulario , select5Formulario = :select5Formulario , select6Formulario = :select6Formulario  WHERE descricaoFormulario = :descricaoFormulario');
                    $sql->bindValue(":descricaoFormulario", $_POST['descricaoFormulario']);
                    $sql->bindValue(":emailFormulario", $_POST['emailFormulario']);
                    $sql->bindValue(":select1Formulario", $_POST['select1Formulario']);
                    $sql->bindValue(":select2Formulario", $_POST['select2Formulario']);
                    $sql->bindValue(":select3Formulario", $_POST['select3Formulario']);
                    $sql->bindValue(":select4Formulario", $_POST['select4Formulario']);
                    $sql->bindValue(":select5Formulario", $_POST['select5Formulario']);
                    $sql->bindValue(":select6Formulario", $_POST['select6Formulario']);
                    if ($sql->execute()) {
                        echo true;

                        //Operações do log

                        $actionLog = "editou as informações do formulário geral";

                        $dateLog = new DateTime();
                        $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                        $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                        $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                        $sql->bindValue(":acaoLogs", $actionLog);
                        $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                        if ($sql->execute()) {
                            echo true;
                        } else {
                            echo false;
                        }
                    }
                } catch (PDOException $e) {
                    // echo "Erro: " . $e->getMessage();
                    echo false;
                }
            }
            break;

        case "atualizaConteudo":
            try {
                $sql = $con->prepare('UPDATE conteudos SET tituloConteudo = :tituloConteudo, imagem1Conteudo = :imagem1Conteudo, imagem2Conteudo = :imagem2Conteudo, imagem3Conteudo = :imagem3Conteudo, imagem4Conteudo = :imagem4Conteudo, legendaImagem1Conteudo = :legendaImagem1Conteudo, legendaImagem2Conteudo = :legendaImagem2Conteudo, legendaImagem3Conteudo = :legendaImagem3Conteudo, legendaImagem4Conteudo = :legendaImagem4Conteudo, textoConteudo = :textoConteudo, nomeBotao1 = :nomeBotao1, linkBotao1 = :linkBotao1, targetBotao1 = :targetBotao1, nomeBotao2 = :nomeBotao2, linkBotao2 = :linkBotao2, targetBotao2 = :targetBotao2, linkVideoConteudo = :linkVideoConteudo WHERE idConteudo = :idConteudo');
                $sql->bindValue(":idConteudo", $_POST['idConteudo']);
                $sql->bindValue(":tituloConteudo", $_POST['tituloConteudo']);
                $sql->bindValue(":imagem1Conteudo", $_POST['imagem1Conteudo']);
                $sql->bindValue(":imagem2Conteudo", $_POST['imagem2Conteudo']);
                $sql->bindValue(":imagem3Conteudo", $_POST['imagem3Conteudo']);
                $sql->bindValue(":imagem4Conteudo", $_POST['imagem4Conteudo']);
                $sql->bindValue(":legendaImagem1Conteudo", $_POST['legendaImagem1Conteudo']);
                $sql->bindValue(":legendaImagem2Conteudo", $_POST['legendaImagem2Conteudo']);
                $sql->bindValue(":legendaImagem3Conteudo", $_POST['legendaImagem3Conteudo']);
                $sql->bindValue(":legendaImagem4Conteudo", $_POST['legendaImagem4Conteudo']);
                $sql->bindValue(":linkVideoConteudo", $_POST['linkVideoConteudo']);
                $sql->bindValue(":textoConteudo", $_POST['textoConteudo']);
                $sql->bindValue(":nomeBotao1", $_POST['nomeBotao1']);
                $sql->bindValue(":linkBotao1", $_POST['linkBotao1']);
                $sql->bindValue(":targetBotao1", $_POST['targetBotao1']);
                $sql->bindValue(":nomeBotao2", $_POST['nomeBotao2']);
                $sql->bindValue(":linkBotao2", $_POST['linkBotao2']);
                $sql->bindValue(":targetBotao2", $_POST['targetBotao2']);

                if ($sql->execute()) {
                    echo true;

                    //Operações do log

                    $actionLog = "editou as informações do conteúdo de ID: " . $_POST['idConteudo'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                // // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaContato":
            try {
                $sql = $con->prepare('UPDATE contatos SET whatsappContato = :whatsappContato, linkWhatsappContato = :linkWhatsappContato, telefoneContato = :telefoneContato, emailContato = :emailContato, enderecoContato = :enderecoContato, mapa = :mapa WHERE idContato = :idContato');
                $sql->bindValue(":idContato", $_POST['idContato']);
                $sql->bindValue(":whatsappContato", $_POST['whatsappContato']);
                $sql->bindValue(":linkWhatsappContato", $_POST['linkWhatsappContato']);
                $sql->bindValue(":telefoneContato", $_POST['telefoneContato']);
                $sql->bindValue(":enderecoContato", $_POST['enderecoContato']);
                $sql->bindValue(":emailContato", $_POST['emailContato']);
                $sql->bindValue(":mapa", $_POST['mapa']);

                if ($sql->execute()) {
                    echo true;

                    //Operações do log
                    $actionLog = "editou as informações dos contatos";

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                // // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaBlog":
            try {
                $sql = $con->prepare('UPDATE blogs SET tituloBlog = :tituloBlog, subTituloBlog = :subTituloBlog, imagemBlog = :imagemBlog, legendaImagemBlog = :legendaImagemBlog, fonteImagemBlog = :fonteImagemBlog, nomeAutorBlog = :nomeAutorBlog, imagemAutorBlog = :imagemAutorBlog, dataBlog = :dataBlog, tempoLeituraBlog = :tempoLeituraBlog, tagsBlog = :tagsBlog, textoBlog = :textoBlog, categoriasId = :categoriasId, status = :status WHERE paginaId = :paginaId');
                $sql->bindValue(":paginaId", $_POST['paginaId']);
                $sql->bindValue(":tituloBlog", $_POST['tituloBlog']);
                $sql->bindValue(":subTituloBlog", $_POST['subTituloBlog']);
                $sql->bindValue(":imagemBlog", $_POST['imagemBlog']);
                $sql->bindValue(":legendaImagemBlog", $_POST['legendaImagemBlog']);
                $sql->bindValue(":fonteImagemBlog", $_POST['fonteImagemBlog']);
                $sql->bindValue(":nomeAutorBlog", $_POST['nomeAutorBlog']);
                $sql->bindValue(":imagemAutorBlog", $_POST['imagemAutorBlog']);
                $sql->bindValue(":dataBlog", $_POST['dataBlog']);
                $sql->bindValue(":tempoLeituraBlog", $_POST['tempoLeituraBlog']);
                $sql->bindValue(":tagsBlog", $_POST['tagsBlog']);
                $sql->bindValue(":textoBlog", $_POST['textoBlog']);
                $sql->bindValue(":categoriasId", $_POST['categoriasId']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT * from blogs WHERE paginaId = :paginaId");
                $sqlInfos->bindValue(":paginaId", $_POST['paginaId']);
                if ($sqlInfos->execute()) {
                    $conteudoBlog = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "editou as informações do blog de ID: " . $conteudoBlog['idBlog'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                // // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaSaiuNaMidia":
            try {
                $sql = $con->prepare('UPDATE saiunamidias SET tituloBlog = :tituloBlog, subTituloBlog = :subTituloBlog, imagemBlog = :imagemBlog, legendaImagemBlog = :legendaImagemBlog, fonteImagemBlog = :fonteImagemBlog, nomeAutorBlog = :nomeAutorBlog, imagemAutorBlog = :imagemAutorBlog, dataBlog = :dataBlog, tempoLeituraBlog = :tempoLeituraBlog, tagsBlog = :tagsBlog, textoBlog = :textoBlog, categoriasId = :categoriasId, status = :status WHERE paginaId = :paginaId');
                $sql->bindValue(":paginaId", $_POST['paginaId']);
                $sql->bindValue(":tituloBlog", $_POST['tituloBlog']);
                $sql->bindValue(":subTituloBlog", $_POST['subTituloBlog']);
                $sql->bindValue(":imagemBlog", $_POST['imagemBlog']);
                $sql->bindValue(":legendaImagemBlog", $_POST['legendaImagemBlog']);
                $sql->bindValue(":fonteImagemBlog", $_POST['fonteImagemBlog']);
                $sql->bindValue(":nomeAutorBlog", $_POST['nomeAutorBlog']);
                $sql->bindValue(":imagemAutorBlog", $_POST['imagemAutorBlog']);
                $sql->bindValue(":dataBlog", $_POST['dataBlog']);
                $sql->bindValue(":tempoLeituraBlog", $_POST['tempoLeituraBlog']);
                $sql->bindValue(":tagsBlog", $_POST['tagsBlog']);
                $sql->bindValue(":textoBlog", $_POST['textoBlog']);
                $sql->bindValue(":categoriasId", $_POST['categoriasId']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT * from saiunamidias WHERE paginaId = :paginaId");
                $sqlInfos->bindValue(":paginaId", $_POST['paginaId']);
                if ($sqlInfos->execute()) {
                    $conteudoSNM = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "editou as informações do Saiu na Mídia de ID: " . $conteudoSNM['idBlog'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaBusiness":
            try {
                $sql = $con->prepare('UPDATE business SET nomeBusiness = :nomeBusiness, tituloBusiness = :tituloBusiness, imagemBusiness = :imagemBusiness, legendaImagemBusiness = :legendaImagemBusiness, categoriaBusiness = :categoriaBusiness, nomeBotao1 = :nomeBotao1, linkBotao1 = :linkBotao1, targetBotao1 = :targetBotao1, textoBusiness = :textoBusiness, status = :status WHERE paginaId = :paginaId');
                $sql->bindValue(":paginaId", $_POST['paginaId']);
                $sql->bindValue(":nomeBusiness", $_POST['nomeBusiness']);
                $sql->bindValue(":tituloBusiness", $_POST['tituloBusiness']);
                $sql->bindValue(":imagemBusiness", $_POST['imagemBusiness']);
                $sql->bindValue(":legendaImagemBusiness", $_POST['legendaImagemBusiness']);
                $sql->bindValue(":categoriaBusiness", $_POST['categoriaBusiness']);
                $sql->bindValue(":nomeBotao1", $_POST['nomeBotao1']);
                $sql->bindValue(":linkBotao1", $_POST['linkBotao1']);
                $sql->bindValue(":targetBotao1", $_POST['targetBotao1']);
                $sql->bindValue(":textoBusiness", $_POST['textoBusiness']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT * from business WHERE paginaId = :paginaId");
                $sqlInfos->bindValue(":paginaId", $_POST['paginaId']);
                if ($sqlInfos->execute()) {
                    $conteudoBusiness = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "editou as informações do business de ID: " . $conteudoBusiness['idBusiness'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaLivro":
            try {
                $sql = $con->prepare('UPDATE livros SET tituloLivro = :tituloLivro, subTituloLivro = :subTituloLivro, imagemLivro = :imagemLivro, legendaImagemLivro = :legendaImagemLivro, nomeAutorLivro = :nomeAutorLivro, imagemAutorLivro = :imagemAutorLivro, tipoLivro = :tipoLivro, textoLivro = :textoLivro, dataLivro = :dataLivro, categoriasId = :categoriasId, nomeBotao1 = :nomeBotao1, linkBotao1 = :linkBotao1, targetBotao1 = :targetBotao1, status = :status WHERE paginaId = :paginaId');
                $sql->bindValue(":paginaId", $_POST['paginaId']);
                $sql->bindValue(":categoriasId", $_POST['categoriasId']);
                $sql->bindValue(":tituloLivro", $_POST['tituloLivro']);
                $sql->bindValue(":subTituloLivro", $_POST['subTituloLivro']);
                $sql->bindValue(":imagemLivro", $_POST['imagemLivro']);
                $sql->bindValue(":legendaImagemLivro", $_POST['legendaImagemLivro']);
                $sql->bindValue(":nomeAutorLivro", $_POST['nomeAutorLivro']);
                $sql->bindValue(":imagemAutorLivro", $_POST['imagemAutorLivro']);
                $sql->bindValue(":tipoLivro", $_POST['tipoLivro']);
                $sql->bindValue(":textoLivro", $_POST['textoLivro']);
                $sql->bindValue(":dataLivro", $_POST['dataLivro']);
                $sql->bindValue(":nomeBotao1", $_POST['nomeBotao1']);
                $sql->bindValue(":linkBotao1", $_POST['linkBotao1']);
                $sql->bindValue(":targetBotao1", $_POST['targetBotao1']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT * from livros WHERE paginaId = :paginaId");
                $sqlInfos->bindValue(":paginaId", $_POST['paginaId']);
                if ($sqlInfos->execute()) {
                    $conteudoLivro = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "editou as informações do livro de ID: " . $conteudoLivro['idLivro'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                // // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;
        case "atualizaEbook":
            try {
                $sql = $con->prepare('UPDATE livros SET tituloLivro = :tituloLivro, subTituloLivro = :subTituloLivro, imagemLivro = :imagemLivro, legendaImagemLivro = :legendaImagemLivro, nomeAutorLivro = :nomeAutorLivro, imagemAutorLivro = :imagemAutorLivro, tipoLivro = :tipoLivro, textoLivro = :textoLivro, dataLivro = :dataLivro, categoriasId = :categoriasId, nomeBotao1 = :nomeBotao1, linkBotao1 = :linkBotao1, targetBotao1 = :targetBotao1, status = :status WHERE paginaId = :paginaId');
                $sql->bindValue(":paginaId", $_POST['paginaId']);
                $sql->bindValue(":categoriasId", $_POST['categoriasId']);
                $sql->bindValue(":tituloLivro", $_POST['tituloLivro']);
                $sql->bindValue(":subTituloLivro", $_POST['subTituloLivro']);
                $sql->bindValue(":imagemLivro", $_POST['imagemLivro']);
                $sql->bindValue(":legendaImagemLivro", $_POST['legendaImagemLivro']);
                $sql->bindValue(":nomeAutorLivro", $_POST['nomeAutorLivro']);
                $sql->bindValue(":imagemAutorLivro", $_POST['imagemAutorLivro']);
                $sql->bindValue(":tipoLivro", $_POST['tipoLivro']);
                $sql->bindValue(":textoLivro", $_POST['textoLivro']);
                $sql->bindValue(":dataLivro", $_POST['dataLivro']);
                $sql->bindValue(":nomeBotao1", $_POST['nomeBotao1']);
                $sql->bindValue(":linkBotao1", $_POST['linkBotao1']);
                $sql->bindValue(":targetBotao1", $_POST['targetBotao1']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT * from livros WHERE paginaId = :paginaId");
                $sqlInfos->bindValue(":paginaId", $_POST['paginaId']);
                if ($sqlInfos->execute()) {
                    $conteudoLivro = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "editou as informações do livro de ID: " . $conteudoLivro['idLivro'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                // // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaPalestra":
            try {
                $sql = $con->prepare('UPDATE palestras SET tituloPalestra = :tituloPalestra, subTituloPalestra = :subTituloPalestra, imagemPalestra = :imagemPalestra, legendaImagemPalestra = :legendaImagemPalestra, textoPalestra = :textoPalestra, imagemAutorPalestra = :imagemAutorPalestra, nomeAutorPalestra = :nomeAutorPalestra, dataPalestra = :dataPalestra, linkBotao1 = :linkBotao1, targetBotao1 = :targetBotao1, status = :status WHERE paginaId = :paginaId');
                $sql->bindValue(":paginaId", $_POST['paginaId']);
                $sql->bindValue(":tituloPalestra", $_POST['tituloPalestra']);
                $sql->bindValue(":subTituloPalestra", $_POST['subTituloPalestra']);
                $sql->bindValue(":imagemPalestra", $_POST['imagemPalestra']);
                $sql->bindValue(":legendaImagemPalestra", $_POST['legendaImagemPalestra']);
                $sql->bindValue(":imagemAutorPalestra", $_POST['imagemAutorPalestra']);
                $sql->bindValue(":nomeAutorPalestra", $_POST['nomeAutorPalestra']);
                $sql->bindValue(":textoPalestra", $_POST['textoPalestra']);
                $sql->bindValue(":dataPalestra", $_POST['dataPalestra']);
                $sql->bindValue(":linkBotao1", $_POST['linkBotao1']);
                $sql->bindValue(":targetBotao1", $_POST['targetBotao1']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT * from palestras WHERE paginaId = :paginaId");
                $sqlInfos->bindValue(":paginaId", $_POST['paginaId']);
                if ($sqlInfos->execute()) {
                    $conteudoPalestra = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "editou as informações da palestra de ID: " . $conteudoPalestra['idPalestra'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaMentoria":
            try {
                $sql = $con->prepare('UPDATE mentorias SET tituloMentoria = :tituloMentoria, subTituloMentoria = :subTituloMentoria,imagemMentoria = :imagemMentoria, legendaImagemMentoria = :legendaImagemMentoria, nomeAutorMentoria = :nomeAutorMentoria, imagemAutorMentoria = :imagemAutorMentoria, textoMentoria = :textoMentoria, valorAvistaMentoria = :valorAvistaMentoria, valorParceladoMentoria = :valorParceladoMentoria, qtdParcelaMentoria = :qtdParcelaMentoria, status = :status WHERE paginaId = :paginaId');
                $sql->bindValue(":paginaId", $_POST['paginaId']);
                $sql->bindValue(":tituloMentoria", $_POST['tituloMentoria']);
                $sql->bindValue(":subTituloMentoria", $_POST['subTituloMentoria']);
                $sql->bindValue(":imagemMentoria", $_POST['imagemMentoria']);
                $sql->bindValue(":legendaImagemMentoria", $_POST['legendaImagemMentoria']);
                $sql->bindValue(":nomeAutorMentoria", $_POST['nomeAutorMentoria']);
                $sql->bindValue(":imagemAutorMentoria", $_POST['imagemAutorMentoria']);
                $sql->bindValue(":textoMentoria", $_POST['textoMentoria']);
                $sql->bindValue(":valorAvistaMentoria", $_POST['valorAvistaMentoria']);
                $sql->bindValue(":valorParceladoMentoria", $_POST['valorParceladoMentoria']);
                $sql->bindValue(":qtdParcelaMentoria", $_POST['qtdParcelaMentoria']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT * from mentorias WHERE paginaId = :paginaId");
                $sqlInfos->bindValue(":paginaId", $_POST['paginaId']);
                if ($sqlInfos->execute()) {
                    $conteudoMentoria = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "editou as informações da mentoria de ID: " . $conteudoMentoria['idMentoria'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaConsultoria":
            try {
                $sql = $con->prepare('UPDATE consultorias SET tituloConsultoria = :tituloConsultoria, subTituloConsultoria = :subTituloConsultoria,imagemConsultoria = :imagemConsultoria, legendaImagemConsultoria = :legendaImagemConsultoria, nomeAutorConsultoria = :nomeAutorConsultoria, imagemAutorConsultoria = :imagemAutorConsultoria, textoConsultoria = :textoConsultoria, valorAvistaConsultoria = :valorAvistaConsultoria, valorParceladoConsultoria = :valorParceladoConsultoria, qtdParcelaConsultoria = :qtdParcelaConsultoria, status = :status WHERE paginaId = :paginaId');
                $sql->bindValue(":paginaId", $_POST['paginaId']);
                $sql->bindValue(":tituloConsultoria", $_POST['tituloConsultoria']);
                $sql->bindValue(":subTituloConsultoria", $_POST['subTituloConsultoria']);
                $sql->bindValue(":imagemConsultoria", $_POST['imagemConsultoria']);
                $sql->bindValue(":legendaImagemConsultoria", $_POST['legendaImagemConsultoria']);
                $sql->bindValue(":nomeAutorConsultoria", $_POST['nomeAutorConsultoria']);
                $sql->bindValue(":imagemAutorConsultoria", $_POST['imagemAutorConsultoria']);
                $sql->bindValue(":textoConsultoria", $_POST['textoConsultoria']);
                $sql->bindValue(":valorAvistaConsultoria", $_POST['valorAvistaConsultoria']);
                $sql->bindValue(":valorParceladoConsultoria", $_POST['valorParceladoConsultoria']);
                $sql->bindValue(":qtdParcelaConsultoria", $_POST['qtdParcelaConsultoria']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT * from consultorias WHERE paginaId = :paginaId");
                $sqlInfos->bindValue(":paginaId", $_POST['paginaId']);
                if ($sqlInfos->execute()) {
                    $conteudoConsultoria = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "editou as informações da consultoria de ID: " . $conteudoConsultoria['idConsultoria'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaEvento":
            try {
                $sql = $con->prepare('UPDATE eventos SET tituloEvento = :tituloEvento, subTituloEvento = :subTituloEvento, imagemEvento = :imagemEvento, legendaImagemEvento = :legendaImagemEvento, textoEvento = :textoEvento, dataEvento = :dataEvento, localEvento = :localEvento, tagsEvento = :tagsEvento, imagemAutorEvento = :imagemAutorEvento, nomeAutorEvento = :nomeAutorEvento, categoriaEvento = :categoriaEvento, nomeBotao1 = :nomeBotao1, linkBotao1 = :linkBotao1, targetBotao1 = :targetBotao1, nomeBotao2 = :nomeBotao2, linkBotao2 = :linkBotao2, targetBotao2 = :targetBotao2, status = :status WHERE paginaId = :paginaId');
                $sql->bindValue(":paginaId", $_POST['paginaId']);
                $sql->bindValue(":tituloEvento", $_POST['tituloEvento']);
                $sql->bindValue(":subTituloEvento", $_POST['subTituloEvento']);
                $sql->bindValue(":imagemEvento", $_POST['imagemEvento']);
                $sql->bindValue(":legendaImagemEvento", $_POST['legendaImagemEvento']);
                $sql->bindValue(":textoEvento", $_POST['textoEvento']);
                $sql->bindValue(":categoriaEvento", $_POST['categoriaEvento']);
                $sql->bindValue(":tagsEvento", $_POST['tagsEvento']);
                $sql->bindValue(":localEvento", $_POST['localEvento']);
                $sql->bindValue(":imagemAutorEvento", $_POST['imagemAutorEvento']);
                $sql->bindValue(":nomeAutorEvento", $_POST['nomeAutorEvento']);
                $sql->bindValue(":dataEvento", $_POST['dataEvento']);
                $sql->bindValue(":nomeBotao1", $_POST['nomeBotao1']);
                $sql->bindValue(":linkBotao1", $_POST['linkBotao1']);
                $sql->bindValue(":targetBotao1", $_POST['targetBotao1']);
                $sql->bindValue(":nomeBotao2", $_POST['nomeBotao2']);
                $sql->bindValue(":linkBotao2", $_POST['linkBotao2']);
                $sql->bindValue(":targetBotao2", $_POST['targetBotao2']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT * from eventos WHERE paginaId = :paginaId");
                $sqlInfos->bindValue(":paginaId", $_POST['paginaId']);
                if ($sqlInfos->execute()) {
                    $conteudoEvento = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "editou as informações do evento de ID: " . $conteudoEvento['idEvento'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaCurso":
            try {
                $sql = $con->prepare('UPDATE cursos SET tituloCurso = :tituloCurso, subTituloCurso = :subTituloCurso, imagemCurso = :imagemCurso, legendaImagemCurso = :legendaImagemCurso, textoCurso = :textoCurso, valorAvistaCurso = :valorAvistaCurso, valorParceladoCurso = :valorParceladoCurso, qtdParcelaCurso = :qtdParcelaCurso, categoriasId = :categoriasId, linkBotao1 = :linkBotao1, targetBotao1 = :targetBotao1, dataCompraCurso = :dataCompraCurso, cargaHorariaCurso = :cargaHorariaCurso, mentorCurso = :mentorCurso, imagemAutorCurso = :imagemAutorCurso, nomeAutorCurso = :nomeAutorCurso, status = :status WHERE paginaId = :paginaId');
                $sql->bindValue(":paginaId", $_POST['paginaId']);
                $sql->bindValue(":categoriasId", $_POST['categoriasId']);
                $sql->bindValue(":tituloCurso", $_POST['tituloCurso']);
                $sql->bindValue(":subTituloCurso", $_POST['subTituloCurso']);
                $sql->bindValue(":imagemCurso", $_POST['imagemCurso']);
                $sql->bindValue(":legendaImagemCurso", $_POST['legendaImagemCurso']);
                $sql->bindValue(":textoCurso", $_POST['textoCurso']);
                $sql->bindValue(":valorAvistaCurso", $_POST['valorAvistaCurso']);
                $sql->bindValue(":valorParceladoCurso", $_POST['valorParceladoCurso']);
                $sql->bindValue(":qtdParcelaCurso", $_POST['qtdParcelaCurso']);
                $sql->bindValue(":linkBotao1", $_POST['linkBotao1']);
                $sql->bindValue(":targetBotao1", $_POST['targetBotao1']);
                $sql->bindValue(":dataCompraCurso", $_POST['dataCompraCurso']);
                $sql->bindValue(":cargaHorariaCurso", $_POST['cargaHorariaCurso']);
                $sql->bindValue(":mentorCurso", $_POST['mentorCurso']);
                $sql->bindValue(":imagemAutorCurso", $_POST['imagemAutorCurso']);
                $sql->bindValue(":nomeAutorCurso", $_POST['nomeAutorCurso']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT * from cursos WHERE paginaId = :paginaId");
                $sqlInfos->bindValue(":paginaId", $_POST['paginaId']);
                if ($sqlInfos->execute()) {
                    $conteudoCurso = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "editou as informações do curso de ID: " . $conteudoCurso['idCurso'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaVideo":
            try {
                $sql = $con->prepare('UPDATE videos SET tituloVideo = :tituloVideo, imagemVideo = :imagemVideo, legendaImagemVideo = :legendaImagemVideo, nomeAutorVideo = :nomeAutorVideo, imagemAutorVideo = :imagemAutorVideo, dataVideo = :dataVideo, iframeVideo = :iframeVideo, categoriasId = :categoriasId, tagsVideo = :tagsVideo, status = :status WHERE idVideo = :idVideo');
                $sql->bindValue(":idVideo", $_POST['idVideo']);
                $sql->bindValue(":tituloVideo", $_POST['tituloVideo']);
                $sql->bindValue(":imagemVideo", $_POST['imagemVideo']);
                $sql->bindValue(":legendaImagemVideo", $_POST['legendaImagemVideo']);
                $sql->bindValue(":nomeAutorVideo", $_POST['nomeAutorVideo']);
                $sql->bindValue(":imagemAutorVideo", $_POST['imagemAutorVideo']);
                $sql->bindValue(":dataVideo", $_POST['dataVideo']);
                $sql->bindValue(":iframeVideo", $_POST['iframeVideo']);
                $sql->bindValue(":categoriasId", $_POST['categoriasId']);
                $sql->bindValue(":tagsVideo", $_POST['tagsVideo']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;

                    //Operações do log

                    $actionLog = "editou as informações do vídeo de ID: " . $_POST['idVideo'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                // // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaPodcast":
            try {
                $sql = $con->prepare('UPDATE podcasts SET tituloPodcast = :tituloPodcast, imagemPodcast = :imagemPodcast, legendaImagemPodcast = :legendaImagemPodcast, nomeAutorPodcast = :nomeAutorPodcast, imagemAutorPodcast = :imagemAutorPodcast, tempoPodcast = :tempoPodcast, qtdEpPodcast = :qtdEpPodcast, dataPodcast = :dataPodcast, iframePodcast = :iframePodcast, tagsPodcast = :tagsPodcast, categoriasId = :categoriasId, status = :status WHERE idPodcast = :idPodcast');
                $sql->bindValue(":idPodcast", $_POST['idPodcast']);
                $sql->bindValue(":tituloPodcast", $_POST['tituloPodcast']);
                $sql->bindValue(":imagemPodcast", $_POST['imagemPodcast']);
                $sql->bindValue(":legendaImagemPodcast", $_POST['legendaImagemPodcast']);
                $sql->bindValue(":nomeAutorPodcast", $_POST['nomeAutorPodcast']);
                $sql->bindValue(":imagemAutorPodcast", $_POST['imagemAutorPodcast']);
                $sql->bindValue(":tempoPodcast", $_POST['tempoPodcast']);
                $sql->bindValue(":qtdEpPodcast", $_POST['qtdEpPodcast']);
                $sql->bindValue(":dataPodcast", $_POST['dataPodcast']);
                $sql->bindValue(":iframePodcast", $_POST['iframePodcast']);
                $sql->bindValue(":tagsPodcast", $_POST['tagsPodcast']);
                $sql->bindValue(":categoriasId", $_POST['categoriasId']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;

                    //Operações do log

                    $actionLog = "editou as informações do podcast de ID: " . $_POST['idPodcast'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                // // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaAgenda":
            try {
                $sql = $con->prepare('UPDATE agendas SET tituloAgenda = :tituloAgenda, textoAgenda = :textoAgenda, imagemAgenda = :imagemAgenda, legendaImagemAgenda = :legendaImagemAgenda, dataAgenda = :dataAgenda, tipoAgenda = :tipoAgenda, tagsAgenda = :tagsAgenda, localAgenda = :localAgenda,nomeBotao1 = :nomeBotao1, linkBotao1 = :linkBotao1, targetBotao1 = :targetBotao1, status = :status WHERE idAgenda = :idAgenda');
                $sql->bindValue(":idAgenda", $_POST['idAgenda']);
                $sql->bindValue(":tituloAgenda", $_POST['tituloAgenda']);
                $sql->bindValue(":textoAgenda", $_POST['textoAgenda']);
                $sql->bindValue(":imagemAgenda", $_POST['imagemAgenda']);
                $sql->bindValue(":legendaImagemAgenda", $_POST['legendaImagemAgenda']);
                $sql->bindValue(":dataAgenda", $_POST['dataAgenda']);
                $sql->bindValue(":tagsAgenda", $_POST['tagsAgenda']);
                $sql->bindValue(":localAgenda", $_POST['localAgenda']);
                $sql->bindValue(":tipoAgenda", $_POST['tipoAgenda']);
                $sql->bindValue(":nomeBotao1", $_POST['nomeBotao1']);
                $sql->bindValue(":linkBotao1", $_POST['linkBotao1']);
                $sql->bindValue(":targetBotao1", $_POST['targetBotao1']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;

                    //Operações do log

                    $actionLog = "editou as informações da agenda de ID: " . $_POST['idAgenda'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                // // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaPergunta":
            try {
                $sql = $con->prepare('UPDATE perguntas SET paginaId = :paginaId, tituloPergunta = :tituloPergunta, textoPergunta = :textoPergunta WHERE idPergunta = :idPergunta');
                $sql->bindValue(":idPergunta", $_POST['idPergunta']);
                $sql->bindValue(":paginaId", $_POST['paginaId']);
                $sql->bindValue(":tituloPergunta", $_POST['tituloPergunta']);
                $sql->bindValue(":textoPergunta", $_POST['textoPergunta']);

                if ($sql->execute()) {
                    echo true;
                }
            } catch (PDOException $e) {
                // // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;
        case "atualizaArtigo":
            try {
                $sql = $con->prepare('UPDATE artigos SET tituloBlog = :tituloBlog, subTituloBlog = :subTituloBlog, imagemBlog = :imagemBlog, legendaImagemBlog = :legendaImagemBlog, fonteImagemBlog = :fonteImagemBlog, nomeAutorBlog = :nomeAutorBlog, imagemAutorBlog = :imagemAutorBlog, dataBlog = :dataBlog, tempoLeituraBlog = :tempoLeituraBlog, tagsBlog = :tagsBlog, textoBlog = :textoBlog, categoriasId = :categoriasId, status = :status WHERE paginaId = :paginaId');
                $sql->bindValue(":paginaId", $_POST['paginaId']);
                $sql->bindValue(":tituloBlog", $_POST['tituloBlog']);
                $sql->bindValue(":subTituloBlog", $_POST['subTituloBlog']);
                $sql->bindValue(":imagemBlog", $_POST['imagemBlog']);
                $sql->bindValue(":legendaImagemBlog", $_POST['legendaImagemBlog']);
                $sql->bindValue(":fonteImagemBlog", $_POST['fonteImagemBlog']);
                $sql->bindValue(":nomeAutorBlog", $_POST['nomeAutorBlog']);
                $sql->bindValue(":imagemAutorBlog", $_POST['imagemAutorBlog']);
                $sql->bindValue(":dataBlog", $_POST['dataBlog']);
                $sql->bindValue(":tempoLeituraBlog", $_POST['tempoLeituraBlog']);
                $sql->bindValue(":tagsBlog", $_POST['tagsBlog']);
                $sql->bindValue(":textoBlog", $_POST['textoBlog']);
                $sql->bindValue(":categoriasId", $_POST['categoriasId']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT * from artigos WHERE paginaId = :paginaId");
                $sqlInfos->bindValue(":paginaId", $_POST['paginaId']);
                if ($sqlInfos->execute()) {
                    $conteudoArtigo = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "editou as informações do artigo de ID: " . $conteudoArtigo['idArtigo'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                // // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;
        case "atualizaInstagram":
            try {
                $sql = $con->prepare('UPDATE instagram SET token = :token, idUser = :idUser WHERE idInstagram = :idInstagram');
                $sql->bindValue(":idInstagram", 1);
                $sql->bindValue(":token", null);
                $sql->bindValue(":idUser", null);

                if ($sql->execute()) {
                    echo true;
                }

            } catch (PDOException $e) {
                // // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;
        case "atualizaServico":
            try {
                $sql = $con->prepare('UPDATE servicos SET tituloServico = :tituloServico, imagemServico = :imagemServico, legendaImagemServico = :legendaImagemServico, linkServico = :linkServico, status = :status WHERE idServico = :idServico');
                $sql->bindValue(":idServico", $_POST['idServico']);
                $sql->bindValue(":tituloServico", $_POST['tituloServico']);
                $sql->bindValue(":imagemServico", $_POST['imagemServico']);
                $sql->bindValue(":legendaImagemServico", $_POST['legendaImagemServico']);
                $sql->bindValue(":linkServico", $_POST['linkServico']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;

                    //Operações do log

                    $actionLog = "editou as informações do Servico de ID: " . $_POST['idServico'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                // // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;
        case "atualizaCliente":
            try {
                $sql = $con->prepare('UPDATE clientes SET imagemCliente = :imagemCliente, legendaImagemCliente = :legendaImagemCliente, linkCliente = :linkCliente, ordemCliente = :ordemCliente, status = :status WHERE idCliente = :idCliente');
                $sql->bindValue(":idCliente", $_POST['idCliente']);
                $sql->bindValue(":imagemCliente", $_POST['imagemCliente']);
                $sql->bindValue(":legendaImagemCliente", $_POST['legendaImagemCliente']);
                $sql->bindValue(":linkCliente", $_POST['linkCliente']);
                $sql->bindValue(":ordemCliente", $_POST['ordemCliente']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;

                    //Operações do log

                    $actionLog = "editou as informações do cliente de ID: " . $_POST['idCliente'];

                    $dateLog = new DateTime();
                    $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                    $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                    $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                    $sql->bindValue(":acaoLogs", $actionLog);
                    $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } catch (PDOException $e) {
                // // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;
            
        case "atualizaScriptHead":
            try {
                $sql = $con->prepare('UPDATE scripts SET script = :script WHERE tipoScript = :tipoScript');
                $sql->bindValue(":tipoScript", 'head');
                $sql->bindValue(":script", $_POST['script']);

                if ($sql->execute()) {
                    echo true;
                }

            } catch (PDOException $e) {
                // // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaScriptIniBody":
            try {
                $sql = $con->prepare('UPDATE scripts SET script = :script WHERE tipoScript = :tipoScript');
                $sql->bindValue(":tipoScript", 'iniBody');
                $sql->bindValue(":script", $_POST['script']);

                if ($sql->execute()) {
                    echo true;
                }

            } catch (PDOException $e) {
                // // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "atualizaScriptFimBody":
            try {
                $sql = $con->prepare('UPDATE scripts SET script = :script WHERE tipoScript = :tipoScript');
                $sql->bindValue(":tipoScript", 'fimBody');
                $sql->bindValue(":script", $_POST['script']);

                if ($sql->execute()) {
                    echo true;
                }

            } catch (PDOException $e) {
                // // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;
    }
}
