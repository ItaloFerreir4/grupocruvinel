<?php
session_start();

include_once './conexao-banco.php';

if(isset($_POST['origem'])){
    if($_POST['origem'] == 'login'){
        // Verificar se o formulário de login foi enviado
        if (isset($_POST['emailUser']) && isset($_POST['passwordUser'])) {
            $email = $_POST['emailUser'];
            $password = $_POST['passwordUser'];

            $sql = $con->prepare("SELECT * FROM usuarios WHERE emailUsuario = ?");
            $sql->bindValue(1,$email);

            if($sql->execute()){
                $user = $sql->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($password, $user['senhaUsuario'])) {                        
                    $_SESSION['username'] = $user['nomeUsuario'];
                    $_SESSION['idUsuario'] = $user['idUsuario'];
                    echo 'logado';
                } else {
                    echo 'Credenciais inválidas. Tente novamente.';
                }
            }
            else{
                echo 'Não executo';
            }
        }
    }
}