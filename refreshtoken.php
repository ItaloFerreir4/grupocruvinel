<?php
session_start();
include_once "assets/componentes.php";
include_once "painel/backend/conexao-banco.php";

try {
    $sql = $con->prepare("SELECT * FROM instagram WHERE idInstagram = :idInstagram");
    $sql->bindValue(":idInstagram", 1);
    if ($sql->execute()) {
        $insta = $sql->fetch(PDO::FETCH_ASSOC);

        // Dados a serem enviados na solicitação GET
        $token = $insta['token'];
		$grantType = 'ig_refresh_token';
		
			/* GERANDO TOKEN LONGO */
			
		// URL para solicitar o token de acesso
		$urlCurl = 'https://graph.instagram.com/refresh_access_token';

		// Construir a URL com os parâmetros
		$urlCurl .= "?grant_type={$grant_type}&access_token={$token}";

		// Inicializar o manipulador cURL
		$ch = curl_init();

		// Configurar as opções do cURL
		curl_setopt($ch, CURLOPT_URL, $urlCurl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Executar a solicitação cURL
		$response = curl_exec($ch);

		// Verificar por erros
		if (curl_errno($ch)) {
			echo 'Erro na solicitação cURL: ' . curl_error($ch);
		}

		// Fechar a sessão cURL
		curl_close($ch);

		// Decodificar a resposta JSON
		$data = json_decode($response, true);
		
		$dataAtual = date("Y-m-d");

		try {
			$sql = $con->prepare('UPDATE instagram SET token = :token, dataGerado = :dataGerado, tempoExpira = :tempoExpira WHERE idInstagram = :idInstagram');
			$sql->bindValue(":idInstagram", 1);
			$sql->bindValue(":token", $data['access_token']);
			$sql->bindValue(":dataGerado", $dataAtual);
			$sql->bindValue(":tempoExpira", $data['expires_in']);
			if ($sql->execute()) {
				echo 'Token Atualizado';
			} else {
				echo "Erro ao salvar token";
			}
		} catch (\Throwable $th) {
			echo $th;
		}
	
    }
    else {
        echo "Erro ao pegar token";
    }
} catch (\Throwable $th) {
    echo $th;
}