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

        case "deletaPagina":
            try {
                $sqlInfos = $con->prepare("SELECT * FROM paginas WHERE idPagina = :idPagina");
                $sqlInfos->bindValue(":idPagina", $_POST['idPagina']);
                if ($sqlInfos->execute()) {
                    $conteudoPagina = $sqlInfos->fetch(PDO::FETCH_ASSOC);
                }

                $sql = $con->prepare('DELETE FROM paginas WHERE idPagina = :idPagina');
                $sql->bindValue(":idPagina", $_POST['idPagina']);
                if ($sql->execute()) {
                    excluiPagina($_POST['nomeDiretorio'], $conteudoPagina['nomePagina']);

                    switch ($conteudoPagina['categoriaId']) {
                        case 3:
                            try {
                                $sql = $con->prepare('DELETE FROM business WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            try {
                                $sql = $con->prepare('DELETE FROM conteudos WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            try {
                                $sql = $con->prepare('DELETE FROM formularios WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            break;

                        case 4:
                            try {
                                $sql = $con->prepare('DELETE FROM workshops WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            break;

                        case 6:
                            try {
                                $sql = $con->prepare('DELETE FROM mentorias WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            try {
                                $sql = $con->prepare('DELETE FROM formularios WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            break;

                        case 8:
                            try {
                                $sql = $con->prepare('DELETE FROM consultorias WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            try {
                                $sql = $con->prepare('DELETE FROM formularios WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            break;

                        case 9:
                            try {
                                $sql = $con->prepare('DELETE FROM eventos WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            try {
                                $sql = $con->prepare('DELETE FROM conteudos WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            break;

                        case 10:
                            try {
                                $sql = $con->prepare('DELETE FROM blogs WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            try {
                                $sql = $con->prepare('DELETE FROM conteudos WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            break;

                        case 11:
                            try {
                                $sql = $con->prepare('DELETE FROM saiunamidias WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            try {
                                $sql = $con->prepare('DELETE FROM conteudos WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            break;

                        case 12:
                            try {
                                $sql = $con->prepare('DELETE FROM livros WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            try {
                                $sql = $con->prepare('DELETE FROM conteudos WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            break;

                        case 13:
                            try {
                                $sql = $con->prepare('DELETE FROM cursos WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            try {
                                $sql = $con->prepare('DELETE FROM conteudos WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            break;

                        case 20:
                            try {
                                $sql = $con->prepare('DELETE FROM categorias WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            try {
                                $sql = $con->prepare('DELETE FROM conteudos WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            break;

                        case 21:
                            try {
                                $sql = $con->prepare('DELETE FROM categorias WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            break;

                        case 22:
                            try {
                                $sql = $con->prepare('DELETE FROM categorias WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            try {
                                $sql = $con->prepare('DELETE FROM conteudos WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            break;
                        case 24:
                            try {
                                $sql = $con->prepare('DELETE FROM palestras WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            try {
                                $sql = $con->prepare('DELETE FROM conteudos WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            break;
                        case 25:
                            try {
                                $sql = $con->prepare('DELETE FROM artigos WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            try {
                                $sql = $con->prepare('DELETE FROM conteudos WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            break;
                        case 26:
                            try {
                                $sql = $con->prepare('DELETE FROM categorias WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            try {
                                $sql = $con->prepare('DELETE FROM conteudos WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            break;
                        case 27:
                            try {
                                $sql = $con->prepare('DELETE FROM livros WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            try {
                                $sql = $con->prepare('DELETE FROM conteudos WHERE paginaId = :idPagina');
                                $sql->bindValue(":idPagina", $_POST['idPagina']);
                                if ($sql->execute()) {
                                    // echo true;
                                } else {
                                    echo false;
                                }
                            } catch (PDOException $e) {
                                // echo "Erro: " . $e->getMessage();
                                echo false;
                            }
                            break;
                    }

                    //Operações do Log
                    $actionLog = "excluiu a página de ID: " . $conteudoPagina['idPagina'];

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
                } else {
                    echo false;
                }
            } catch (PDOException $e) {
                // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "deletaImagem":
            $sqlInfos = $con->prepare("SELECT * FROM imagens WHERE idImagem = :idImagem");
            $sqlInfos->bindValue(":idImagem", $_POST['idImagem']);

            if ($sqlInfos->execute()) {
                $conteudoPagina = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                $pathParts = pathinfo($conteudoPagina['imagem']);
                $fileNameToDelete = $pathParts['basename'];
                // mudar depois para $filePath = '../../assets/uploads/' . $fileNameToDelete;
                $filePath = '../../assets/uploads/' . $fileNameToDelete;

                echo $fileNameToDelete;

                if (file_exists($filePath)) {
                    if (unlink($filePath)) {
                        echo "Arquivo excluído com sucesso.";
                    } else {
                        echo "Não foi possível excluir o arquivo.";
                    }
                } else {
                    echo "O arquivo não existe.";
                }
            }

            try {
                $sql = $con->prepare('DELETE FROM imagens WHERE idImagem = :idImagem');
                $sql->bindValue(":idImagem", $_POST['idImagem']);
                if ($sql->execute()) {
                    echo true;
                } else {
                    echo false;
                }

                //Operações do Log
                $actionLog = "excluiu a imagem " . $fileNameToDelete;

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
            } catch (PDOException $e) {
                // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "deletaUsuarios":
            try {
                $sql = $con->prepare('DELETE FROM usuarios WHERE idUsuario = :idUsuario');
                $sql->bindValue(":idUsuario", $_POST['idUsuario']);
                if ($sql->execute()) {
                    echo true;

                    //Operações do log

                    $actionLog = "excluiu o usuário de ID: " . $_POST['idUsuario'];

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
                } else {
                    echo false;
                }
            } catch (PDOException $e) {
                // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "deletaConteudo":
            try {
                $sql = $con->prepare('DELETE FROM conteudos WHERE idConteudo = :idConteudo');
                $sql->bindValue(":idConteudo", $_POST['idConteudo']);
                if ($sql->execute()) {
                    echo true;

                    //Operações do log

                    $actionLog = "excluiu o conteúdo de ID: " . $_POST['idConteudo'];

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
                } else {
                    echo false;
                }
            } catch (PDOException $e) {
                // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "deletaVideo":
            try {
                $sql = $con->prepare('DELETE FROM videos WHERE idVideo = :idVideo');
                $sql->bindValue(":idVideo", $_POST['idVideo']);
                if ($sql->execute()) {
                    echo true;

                    //Operações do log

                    $actionLog = "excluiu o vídeo de ID: " . $_POST['idVideo'];

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
                } else {
                    echo false;
                }
            } catch (PDOException $e) {
                // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "deletaPodcast":
            try {
                $sql = $con->prepare('DELETE FROM podcasts WHERE idPodcast = :idPodcast');
                $sql->bindValue(":idPodcast", $_POST['idPodcast']);
                if ($sql->execute()) {
                    echo true;

                    //Operações do log

                    $actionLog = "excluiu o podcast de ID: " . $_POST['idPodcast'];

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
                } else {
                    echo false;
                }
            } catch (PDOException $e) {
                // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "deletaAgenda":
            try {
                $sql = $con->prepare('DELETE FROM agendas WHERE idAgenda = :idAgenda');
                $sql->bindValue(":idAgenda", $_POST['idAgenda']);
                if ($sql->execute()) {
                    echo true;

                    //Operações do log

                    $actionLog = "excluiu a agenda de ID: " . $_POST['idAgenda'];

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
                } else {
                    echo false;
                }
            } catch (PDOException $e) {
                // echo "Erro: " . $e->getMessage();
                echo false;
            }
            break;

        case "tiraDestaque":
            try {
                $sql = $con->prepare('DELETE FROM destaques WHERE idItem = :idItem AND categoria = :categoria');
                $sql->bindValue(":idItem", $_POST['idItem']);
                $sql->bindValue(":categoria", $_POST['categoria']);
                if ($sql->execute()) {
                    echo true;

                    //Operações do log

                    $actionLog = "tirou o destaque do item de ID: " . $_POST['idItem'] . " de categoria: " . $_POST['categoria'];

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
                } else {
                    echo false;
                }
            } catch (PDOException $e) {
                echo false;
            }
            break;

        case "deletaPergunta":
            try {
                $sql = $con->prepare('DELETE FROM perguntas WHERE idPergunta = :idPergunta');
                $sql->bindValue(":idPergunta", $_POST['idPergunta']);
                if ($sql->execute()) {
                    echo true;
                } else {
                    echo false;
                }
            } catch (PDOException $e) {
                echo false;
            }
            break;

        case "deletaServico":
            try {
                $sql = $con->prepare('DELETE FROM servicos WHERE idServico = :idServico');
                $sql->bindValue(":idServico", $_POST['idServico']);
                if ($sql->execute()) {
                    echo true;
                } else {
                    echo false;
                }
            } catch (PDOException $e) {
                echo false;
            }
            break;
    }
}
