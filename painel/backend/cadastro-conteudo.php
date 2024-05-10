<?php
session_start();



include_once './conexao-banco.php';
include_once './gerar-pagina.php';
include_once './atualizar-paginas-geral.php';

//Verificar se o usuário está logado
if (!isset($_SESSION['idUsuario'])) {
    header('Location: ../login.php');
    exit;
}


if (isset($_POST['origem'])) {

    switch ($_POST['origem']) {

        case "cadastraPagina":
            // $sqlCount = $con->prepare("SELECT COUNT(*) AS totalPaginas FROM paginas WHERE nomePagina = :nomePagina");
            // $sqlCount->bindValue(":nomePagina", $_POST['nomePagina']);
            // if ($sqlCount->execute()) {

            //     $totalPaginas = $sqlCount->fetch(PDO::FETCH_ASSOC)['totalPaginas'];
            // }

            // if ($totalPaginas > 0) {
            //     echo false;
            // } else {
                try {

                    $sql = $con->prepare('INSERT INTO paginas(categoriaId, nomePagina, tituloPagina, descricaoPagina, imagemPagina, legendaImagemPagina, palavrasChavesPagina) VALUES(:categoriaId, :nomePagina, :tituloPagina, :descricaoPagina, :imagemPagina, :legendaImagemPagina, :palavrasChavesPagina)');
                    $sql->bindValue(":categoriaId", $_POST['categoriaId']);
                    $sql->bindValue(":nomePagina", $_POST['nomePagina']);
                    $sql->bindValue(":tituloPagina", $_POST['tituloPagina']);
                    $sql->bindValue(":descricaoPagina", $_POST['descricaoPagina']);
                    $sql->bindValue(":imagemPagina", $_POST['imagemPagina']);
                    $sql->bindValue(":legendaImagemPagina", $_POST['legendaImagemPagina']);
                    $sql->bindValue(":palavrasChavesPagina", $_POST['palavrasChavesPagina']);

                    if ($sql->execute()) {

                        geraPagina($_POST['categoriaId'], $_POST['nomeCategoria'], $_POST['nomePagina']);

                        $sqlInfos = $con->prepare("SELECT * FROM paginas WHERE nomePagina = :nomePagina AND categoriaId = :categoriaId");
                        $sqlInfos->bindValue(":nomePagina", $_POST['nomePagina']);
                        $sqlInfos->bindValue(":categoriaId", $_POST['categoriaId']);

                        if ($sqlInfos->execute()) {
                            $conteudoPagina = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                            switch ($_POST['categoriaId']) {

                                case 3:
                                    $sql = $con->prepare('INSERT INTO business(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }

                                    $numerosConteudo = [1, 3, 4];

                                    foreach ($numerosConteudo as $numero) {
                                        $sql = $con->prepare('INSERT INTO conteudos(paginaId, numeroConteudo) VALUES(:paginaId, :numeroConteudo)');
                                        $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                        $sql->bindValue(":numeroConteudo", $numero);
                                        
                                        if ($sql->execute()) {
                                            // echo true;
                                        } else {
                                            echo false;
                                        }
                                    }

                                    $sql = $con->prepare('INSERT INTO formularios(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }
                                    break;

                                case 4:
                                    $sql = $con->prepare('INSERT INTO workshops(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }
                                    break;

                                case 6:
                                    $sql = $con->prepare('INSERT INTO mentorias(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }
                                    $sql = $con->prepare('INSERT INTO formularios(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }
                                    break;

                                case 8:
                                    $sql = $con->prepare('INSERT INTO consultorias(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }
                                    $sql = $con->prepare('INSERT INTO formularios(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }
                                    break;

                                case 9:
                                    $sql = $con->prepare('INSERT INTO eventos(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }

                                    $numerosConteudo = [1, 2];

                                    foreach ($numerosConteudo as $numero) {
                                        $sql = $con->prepare('INSERT INTO conteudos(paginaId, numeroConteudo) VALUES(:paginaId, :numeroConteudo)');
                                        $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                        $sql->bindValue(":numeroConteudo", $numero);
                                        
                                        if ($sql->execute()) {
                                            // echo true;
                                        } else {
                                            echo false;
                                        }
                                    }
                                    break;

                                case 10:
                                    $sql = $con->prepare('INSERT INTO blogs(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }

                                    $numerosConteudo = [1];

                                    foreach ($numerosConteudo as $numero) {
                                        $sql = $con->prepare('INSERT INTO conteudos(paginaId, numeroConteudo) VALUES(:paginaId, :numeroConteudo)');
                                        $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                        $sql->bindValue(":numeroConteudo", $numero);
                                        
                                        if ($sql->execute()) {
                                            // echo true;
                                        } else {
                                            echo false;
                                        }
                                    }
                                    break;

                                case 11:
                                    $sql = $con->prepare('INSERT INTO saiunamidias(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }

                                    $numerosConteudo = [1];

                                    foreach ($numerosConteudo as $numero) {
                                        $sql = $con->prepare('INSERT INTO conteudos(paginaId, numeroConteudo) VALUES(:paginaId, :numeroConteudo)');
                                        $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                        $sql->bindValue(":numeroConteudo", $numero);
                                        
                                        if ($sql->execute()) {
                                            // echo true;
                                        } else {
                                            echo false;
                                        }
                                    }
                                    break;

                                case 12:
                                    $sql = $con->prepare('INSERT INTO livros(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }

                                    $numerosConteudo = [2, 3, 4];

                                    foreach ($numerosConteudo as $numero) {
                                        $sql = $con->prepare('INSERT INTO conteudos(paginaId, numeroConteudo) VALUES(:paginaId, :numeroConteudo)');
                                        $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                        $sql->bindValue(":numeroConteudo", $numero);
                                        
                                        if ($sql->execute()) {
                                            // echo true;
                                        } else {
                                            echo false;
                                        }
                                    }
                                    break;

                                case 13:
                                    $sql = $con->prepare('INSERT INTO cursos(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }

                                    $numerosConteudo = [1, 3, 4];

                                    foreach ($numerosConteudo as $numero) {
                                        $sql = $con->prepare('INSERT INTO conteudos(paginaId, numeroConteudo) VALUES(:paginaId, :numeroConteudo)');
                                        $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                        $sql->bindValue(":numeroConteudo", $numero);
                                        
                                        if ($sql->execute()) {
                                            // echo true;
                                        } else {
                                            echo false;
                                        }
                                    }
                                    break;

                                case 20:
                                    $sql = $con->prepare('INSERT INTO categorias(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }

                                    break;

                                case 21:
                                    $sql = $con->prepare('INSERT INTO categorias(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }
                                    break;

                                case 22:
                                    $sql = $con->prepare('INSERT INTO categorias(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }
                                    break;

                                case 23:
                                    $sql = $con->prepare('INSERT INTO categorias(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }
                                    break;
                                case 24:
                                    $sql = $con->prepare('INSERT INTO palestras(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }

                                    $numerosConteudo = [1, 2];

                                    foreach ($numerosConteudo as $numero) {
                                        $sql = $con->prepare('INSERT INTO conteudos(paginaId, numeroConteudo) VALUES(:paginaId, :numeroConteudo)');
                                        $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                        $sql->bindValue(":numeroConteudo", $numero);
                                        
                                        if ($sql->execute()) {
                                            // echo true;
                                        } else {
                                            echo false;
                                        }
                                    }
                                    break;
                                case 25:
                                    $sql = $con->prepare('INSERT INTO artigos(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }

                                    $numerosConteudo = [1, 2];

                                    foreach ($numerosConteudo as $numero) {
                                        $sql = $con->prepare('INSERT INTO conteudos(paginaId, numeroConteudo) VALUES(:paginaId, :numeroConteudo)');
                                        $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                        $sql->bindValue(":numeroConteudo", $numero);
                                        
                                        if ($sql->execute()) {
                                            // echo true;
                                        } else {
                                            echo false;
                                        }
                                    }
                                    break;
                                case 26:
                                    $sql = $con->prepare('INSERT INTO categorias(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }
                                    break;
                                case 27:
                                    $sql = $con->prepare('INSERT INTO livros(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }

                                    $numerosConteudo = [2, 3];

                                    foreach ($numerosConteudo as $numero) {
                                        $sql = $con->prepare('INSERT INTO conteudos(paginaId, numeroConteudo) VALUES(:paginaId, :numeroConteudo)');
                                        $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                        $sql->bindValue(":numeroConteudo", $numero);
                                        
                                        if ($sql->execute()) {
                                            // echo true;
                                        } else {
                                            echo false;
                                        }
                                    }

                                    $sql = $con->prepare('INSERT INTO formularios(paginaId) VALUES(:paginaId)');
                                    $sql->bindValue(":paginaId", $conteudoPagina['idPagina']);
                                    if ($sql->execute()) {
                                        // echo true;
                                    } else {
                                        echo false;
                                    }
                                    break;
                            }

                            //Operações do Log
                            $actionLog = "cadastrou a página de ID: " . $conteudoPagina['idPagina'];

                            $dateLog = new DateTime();
                            $dateLog->setTimezone(new DateTimeZone('America/Sao_Paulo'));

                            $sql = $con->prepare('INSERT INTO logs(usuarioId, acaoLogs, dataHoraLogs) VALUES(:usuarioId, :acaoLogs, :dataHoraLogs)');
                            $sql->bindValue(":usuarioId", $_SESSION['idUsuario']);
                            $sql->bindValue(":acaoLogs", $actionLog);
                            $sql->bindValue(":dataHoraLogs", $dateLog->format('y/m/d H:i:s'));
                            if ($sql->execute()) {
                                // echo true;
                            } else {
                                echo false;
                            }
                        }

                        $resultado = array(
                            'data' => true,
                            'pagina' => $conteudoPagina
                        );

                        echo json_encode($resultado);
                    } else {
                        echo false;
                    }

                    //
                } catch (PDOException $e) {
                    // echo "Erro: " . $e->getMessage();
                    echo false;
                }
            // }
            break;

        case "cadastraImagem":
            $fileInfo = $_FILES["arquivoImagem"];

            //Mudar depois na produção para $uploadDir = "../../assets/uploads/";
            $uploadDir = "../../assets/uploads/";

            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = $fileInfo["name"];
            $fileTempName = $fileInfo["tmp_name"];

            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            $uniqueFileName = uniqid() . '.' . $fileExtension;

            $destination = $uploadDir . $uniqueFileName;

            if (move_uploaded_file($fileTempName, $destination)) {
                $fileUrl = $uniqueFileName;

                try {
                    $sql = $con->prepare('INSERT INTO imagens(imagem) VALUES(:imagem)');
                    $sql->bindValue(":imagem", $fileUrl);
                    if ($sql->execute()) {
                        echo true;
                    } else {
                        echo false;
                    }

                    //Operações do Log
                    $actionLog = "cadastrou a imagem " . $fileUrl;

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
            } else {
                echo false;
            }
            break;

        case "cadastraUsuarios":
            $username = $_POST['nomeUsuario'];
            $useremail = $_POST['emailUsuario'];
            $password = $_POST['senhaUsuario'];

            try {
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "SELECT * FROM usuarios WHERE nomeUsuario = :username";
                $stmt = $con->prepare($query);
                $stmt->bindParam(':username', $username);
                $stmt->execute();

                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    $error = 'O usuário já existe. Escolha um nome de usuário diferente.';
                } else {
                    // Criar o hash da senha
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    // Inserir o novo usuário no banco de dados
                    $query = "INSERT INTO usuarios (nomeUsuario, emailUsuario, senhaUsuario) VALUES (:username, :useremail, :password)";
                    $stmt = $con->prepare($query);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':useremail', $useremail);
                    $stmt->bindParam(':password', $hashedPassword);
                    $stmt->execute();

                    $success = 'Usuário cadastrado com sucesso!';
                    echo true;

                    //Operações do log

                    $sqlInfos = $con->prepare("SELECT * FROM usuarios WHERE nomeUsuario = :nomeUsuario");
                    $sqlInfos->bindValue(":nomeUsuario", $username);
                    if ($sqlInfos->execute()) {
                        $conteudoUsuarios = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                        $actionLog = "cadastrou o usuário de ID: " . $conteudoUsuarios['idUsuario'];

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
                }
            } catch (PDOException $e) {
                $error = 'Erro de conexão com o banco de dados: ' . $e->getMessage();
            }
            break;

        case "cadastraConteudo":
            try {
                $sql = $con->prepare('INSERT INTO conteudos (paginaId, numeroConteudo, tituloConteudo, imagem1Conteudo , imagem2Conteudo , imagem3Conteudo , imagem4Conteudo , legendaImagem1Conteudo , legendaImagem2Conteudo , legendaImagem3Conteudo , legendaImagem4Conteudo , textoConteudo , nomeBotao1 , linkBotao1 , targetBotao1 , nomeBotao2 , linkBotao2 , targetBotao2, linkVideoConteudo)  VALUES ( :paginaId, :numeroConteudo, :tituloConteudo, :imagem1Conteudo , :imagem2Conteudo , :imagem3Conteudo , :imagem4Conteudo , :legendaImagem1Conteudo , :legendaImagem2Conteudo , :legendaImagem3Conteudo , :legendaImagem4Conteudo , :textoConteudo , :nomeBotao1 , :linkBotao1 , :targetBotao1 , :nomeBotao2 , :linkBotao2 , :targetBotao2, :linkVideoConteudo)');
                $sql->bindValue(":paginaId", $_POST['paginaId']);
                $sql->bindValue(":numeroConteudo", $_POST['numeroConteudo']);
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
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT MAX(idConteudo) AS max_id FROM conteudos");
                if ($sqlInfos->execute()) {
                    $rowConteudos = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "cadastrou o conteúdo de ID: " . $rowConteudos['max_id'];

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

        case "cadastraVideo":
            try {
                $sql = $con->prepare('INSERT INTO videos (tituloVideo, imagemVideo, legendaImagemVideo, nomeAutorVideo, imagemAutorVideo, dataVideo, iframeVideo, categoriasId, tagsVideo, status) VALUES (:tituloVideo, :imagemVideo, :legendaImagemVideo, :nomeAutorVideo, :imagemAutorVideo, :dataVideo, :iframeVideo, :categoriasId, :tagsVideo, :status)');
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
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT MAX(idVideo) AS max_id FROM videos");
                if ($sqlInfos->execute()) {
                    $rowVideos = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "cadastrou o vídeo de ID: " . $rowVideos['max_id'];

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

        case "cadastraPodcast":
            try {
                $sql = $con->prepare('INSERT INTO podcasts (tituloPodcast, iframePodcast, imagemPodcast, legendaImagemPodcast, nomeAutorPodcast, imagemAutorPodcast, tempoPodcast, qtdEpPodcast, dataPodcast, tagsPodcast, categoriasId, status) VALUES (:tituloPodcast, :iframePodcast, :imagemPodcast, :legendaImagemPodcast, :nomeAutorPodcast, :imagemAutorPodcast, :tempoPodcast, :qtdEpPodcast, :dataPodcast, :tagsPodcast, :categoriasId, :status)');
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
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT MAX(idPodcast) AS max_id FROM podcasts");
                if ($sqlInfos->execute()) {
                    $rowPod = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "cadastrou o podcast de ID: " . $rowPod['max_id'];

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

        case "cadastraAgenda":
            try {
                $sql = $con->prepare('INSERT INTO agendas (tituloAgenda, textoAgenda, imagemAgenda, legendaImagemAgenda, dataAgenda, tipoAgenda, tagsAgenda, localAgenda, nomeBotao1, linkBotao1, targetBotao1, status) VALUES (:tituloAgenda, :textoAgenda, :imagemAgenda, :legendaImagemAgenda, :dataAgenda, :tipoAgenda, :tagsAgenda, :localAgenda, :nomeBotao1, :linkBotao1, :targetBotao1, :status)');
                $sql->bindValue(":tituloAgenda", $_POST['tituloAgenda']);
                $sql->bindValue(":textoAgenda", $_POST['textoAgenda']);
                $sql->bindValue(":imagemAgenda", $_POST['imagemAgenda']);
                $sql->bindValue(":legendaImagemAgenda", $_POST['legendaImagemAgenda']);
                $sql->bindValue(":dataAgenda", $_POST['dataAgenda']);
                $sql->bindValue(":tipoAgenda", $_POST['tipoAgenda']);
                $sql->bindValue(":tagsAgenda", $_POST['tagsAgenda']);
                $sql->bindValue(":localAgenda", $_POST['localAgenda']);
                $sql->bindValue(":nomeBotao1", $_POST['nomeBotao1']);
                $sql->bindValue(":linkBotao1", $_POST['linkBotao1']);
                $sql->bindValue(":targetBotao1", $_POST['targetBotao1']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT MAX(idAgenda) AS max_id FROM agendas");
                if ($sqlInfos->execute()) {
                    $rowAgenda = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "cadastrou a agenda de ID: " . $rowAgenda['max_id'];

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

        case "destaca":
            try {
                $sql = $con->prepare('INSERT INTO destaques(idItem, categoria) VALUES(:idItem, :categoria)');
                $sql->bindValue(":idItem", $_POST['idItem']);
                $sql->bindValue(":categoria", $_POST['categoria']);
                if ($sql->execute()) {
                    echo true;
                } else {
                    echo false;
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT MAX(idDestaque) AS max_id FROM destaques");
                if ($sqlInfos->execute()) {
                    $rowDestaque = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "destacou o item de ID: " . $_POST['idItem'] . " de categoria: " . $_POST['categoria'] . ". [ID do destaque: " . $rowDestaque['max_id'] . "]";

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
                echo false;
            }
            break;

        case "cadastraPergunta":
            try {
                $sql = $con->prepare('INSERT INTO perguntas(paginaId, tituloPergunta, textoPergunta) VALUES(:paginaId, :tituloPergunta, :textoPergunta)');
                $sql->bindValue(":paginaId", $_POST['paginaId']);
                $sql->bindValue(":tituloPergunta", $_POST['tituloPergunta']);
                $sql->bindValue(":textoPergunta", $_POST['textoPergunta']);
                if ($sql->execute()) {
                    echo true;
                } else {
                    echo false;
                }
            } catch (PDOException $e) {
                echo false;
            }
            break;
        case "cadastraServico":
            try {
                $sql = $con->prepare('INSERT INTO servicos (tituloServico, imagemServico, legendaImagemServico, linkServico, status) VALUES (:tituloServico, :imagemServico, :legendaImagemServico, :linkServico, :status)');
                $sql->bindValue(":tituloServico", $_POST['tituloServico']);
                $sql->bindValue(":imagemServico", $_POST['imagemServico']);
                $sql->bindValue(":legendaImagemServico", $_POST['legendaImagemServico']);
                $sql->bindValue(":linkServico", $_POST['linkServico']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT MAX(idServico) AS max_id FROM servicos");
                if ($sqlInfos->execute()) {
                    $rowServico = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "cadastrou a Servico de ID: " . $rowServico['max_id'];

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
        case "cadastraCliente":
            try {
                $sql = $con->prepare('INSERT INTO clientes (imagemCliente, legendaImagemCliente, linkCliente, status) VALUES (:imagemCliente, :legendaImagemCliente, :linkCliente, :status)');
                $sql->bindValue(":imagemCliente", $_POST['imagemCliente']);
                $sql->bindValue(":legendaImagemCliente", $_POST['legendaImagemCliente']);
                $sql->bindValue(":linkCliente", $_POST['linkCliente']);
                $sql->bindValue(":status", $_POST['status']);

                if ($sql->execute()) {
                    echo true;
                }

                //Operações do log

                $sqlInfos = $con->prepare("SELECT MAX(idCliente) AS max_id FROM Clientes");
                if ($sqlInfos->execute()) {
                    $rowCliente = $sqlInfos->fetch(PDO::FETCH_ASSOC);

                    $actionLog = "cadastrou a Cliente de ID: " . $rowCliente['max_id'];

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
    }
}
