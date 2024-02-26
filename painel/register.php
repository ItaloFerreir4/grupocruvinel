<?php
include_once './backend/conexao-banco.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $password = $_POST['password'];

    try {
        $conn = $con;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM usuarios WHERE nomeUsuario = :username";
        $stmt = $conn->prepare($query);
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
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':useremail', $useremail);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();

            $success = 'Usuário cadastrado com sucesso!';
        }
    } catch (PDOException $e) {
        $error = 'Erro de conexão com o banco de dados: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>

    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if (isset($success)): ?>
        <p><?php echo $success; ?></p>
    <?php endif; ?>

    <form method="POST" action="register">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required>

        <label for="useremail">Email:</label>
        <input type="text" id="useremail" name="useremail" required>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>

        <br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
