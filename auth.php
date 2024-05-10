<?php
session_start();
include_once "assets/componentes.php";
include_once "painel/backend/conexao-banco.php";

if (isset($_GET['code'])) {
    $codigoAutorizacao = $_GET['code'];
    $urlBase = BASE_URL;
    // Parâmetros da solicitação de token de acesso
    $clientId = '829841622325096';  // Substitua pelo seu ID de cliente real
    $clientSecret = '7148c4d352f32de81706c4c1dad05dc1';  // Substitua pelo seu segredo de cliente real
    $redirectUri = $urlBase.'/auth';
    $grantType = 'authorization_code';

    // URL para solicitar o token de acesso
    $tokenUrl = 'https://api.instagram.com/oauth/access_token';

    // Dados a serem enviados na solicitação POST
    $postData = array(
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'grant_type' => $grantType,
        'redirect_uri' => $redirectUri,
        'code' => $codigoAutorizacao
    );

    // Inicializar o manipulador cURL
    $ch = curl_init();

    // Configurar as opções do cURL
    curl_setopt($ch, CURLOPT_URL, $tokenUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
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
    $tokenData = json_decode($response, true);

		/* GERANDO TOKEN LONGO */
		
	// URL para solicitar o token de acesso
	$urlCurl = 'https://graph.instagram.com/access_token';

	// Dados a serem enviados na solicitação GET
	$grant_type = 'ig_exchange_token';

	// Construir a URL com os parâmetros
	$urlCurl .= "?grant_type={$grant_type}&client_secret={$clientSecret}&access_token={$tokenData['access_token']}";

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

            $command = 'crontab -l | { cat; echo "0 2 */25 * * /usr/bin/php ./refreshtoken.php"; } | crontab -';
            $output = null;
            $return_var = null;
            exec($command, $output, $return_var);

            // if ($return_var === 0) {
            //     echo "O comando foi executado com sucesso.";
            // } else {
            //     echo "Ocorreu um erro ao executar o comando.";
            // }

            header("Location: {$urlBase}/painel/home");
        } else {
            echo "Erro ao salvar token";
        }
    } catch (\Throwable $th) {
        echo $th;
    }

} else {
    echo "Código de autorização não encontrado na URL.";
}