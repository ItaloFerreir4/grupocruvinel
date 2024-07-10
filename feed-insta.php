<?php
session_start();
include_once "assets/componentes.php";
include_once "painel/backend/conexao-banco.php";

try {
    $sql = $con->prepare("SELECT * FROM instagram WHERE idInstagram = :idInstagram");
    $sql->bindValue(":idInstagram", 1);
    if ($sql->execute()) {
        $insta = $sql->fetch(PDO::FETCH_ASSOC);
        
        // URL para solicitar o token de acesso
        $urlCurl = 'https://graph.instagram.com/me/media';

        // Dados a serem enviados na solicitação GET
        $token = $insta['token'];
        $fields = 'id,media_type,caption,media_url,permalink,thumbnail_url';

        // Construir a URL com os parâmetros
        $urlCurl .= "?access_token={$token}&fields={$fields}";

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

        // Exibir a resposta (pode ser ajustado conforme necessário)
        // echo 'urlCurl'. $urlCurl;
        // echo 'resposta'. $tokenData;
        if($data == '' || $data == null){
            echo 'Insta não connectado';
        }
        else{
            if($data['error']){
                echo $data['error']['message'];
                if($data['error']['code'] == '190'){

                }
            }
            else{
                foreach ($data['data'] as $item) {
                    if($item['media_type'] == "IMAGE"){
                        echo <<<HTML
                            <div class="wrapper">
                                <a class="link-feed-insta" href="{$item['permalink']}" target="_blank"></a>
                                <img class="img-feed-insta" src="{$item['media_url']}">
                            </div>
                        HTML;
                    }
                }
            }
        }

    }
    else {
        echo "Erro ao pegar token";
    }
} catch (\Throwable $th) {
    echo $th;
}